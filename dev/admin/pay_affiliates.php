<?php

include_once "../API/config.php";
include_once "includes/session.check.php";
require_once "../API/stripe/config.php";
if ($staff_pay_affiliates == "off" && !isset($_SESSION[$install_directory_name . "_idev_AdminAccount"])) {
    header("Location: staff_notice.php");
    exit;
}
if (isset($_POST["process_stripe_payment"])) {
    $earnings = $db->prepare("select SUM(payment) AS total from idevaff_sales where id = ? and approved = '1'");
    $earnings->execute(array($_REQUEST["id"]));
    $row1 = $earnings->fetch();
    $pexact = $row1["total"];
    $pexactd = $pexact;
    $debittotal = $db->prepare("select SUM(amount) AS totaldebs from idevaff_debit where aff_id = ?");
    $debittotal->execute(array($_REQUEST["id"]));
    $debit_total = $debittotal->fetch();
    $pexacttotaldebs = $debit_total["totaldebs"];
    $pexacttotaldebsd = $pexacttotaldebs;
    $amount_to_pay_grand_total = $pexact - $pexacttotaldebs;
    if (0 < $amount_to_pay_grand_total) {
        $amount = $amount_to_pay_grand_total * 100;
        $StripeData = $db->prepare("select pay_method, stripe_user_data from idevaff_affiliates where id = ?");
        $StripeData->execute(array($_REQUEST["id"]));
        $stripe_data = $StripeData->fetch();
        $stripe_user_data = unserialize(base64_decode($stripe_data["stripe_user_data"]));
        $pay_method = $stripe_data["pay_method"];
        if ($pay_method == 2 && $stripe_user_data["stripe_user_id"] != "") {
            $stripe_cus_id = $stripe_user_data["stripe_user_id"];
            try {
                Stripe\Stripe::setApiKey(STRIPE_API_SECRET);
                $transfer_obj = Stripe\Transfer::create(array("amount" => $amount, "currency" => $currency, "destination" => $stripe_cus_id));
                $transfer_obj = $transfer_obj->__toArray(true);
                $get_transfer = Stripe\Transfer::retrieve($transfer_obj["id"]);
                $transfer_obj = $get_transfer->__toArray(true);
                $sent_amount = $transfer_obj["amount"] / 100;
                $payment_details = "                                    <strong>Transaction ID:</strong> " . $transfer_obj["id"] . "<br />    \r\n                                    <strong>Payment Status:</strong> " . $transfer_obj["status"] . "<br />\r\n\t\t\t\t\t\t\t\t\t";
                $stripe_payment_success = "stripe_good";
                if (!isset($success_message)) {
                    $success_message = "";
                }
                $success_message .= "<span style=\"font-size:18px; font-weight:bold;\">Stripe Payment Successful</span><br />";
                $success_message .= "<strong>Payment Details: </strong>" . $payment_details;
                $fail_message = "<strong>IMPORTANT:</strong> Complete the payment process by clicking the <strong>Archive This Payment</strong> button in step #2, below.";
            } catch (Exception $e) {
                if (!isset($fail_message)) {
                    $fail_message = "";
                }
                $fail_message = "<p>" . $e->getMessage() . "</p>";
            }
        }
    } else {
        if (!isset($fail_message)) {
            $fail_message = "";
        }
        $fail_message = "<p>Negative Account Balance - Payment Not Available</p>";
    }
}
if (isset($_REQUEST["archive"])) {
    $st = $db->prepare("insert into idevaff_payments (id, code, amount) values (?, ?, ?)");
    $st->execute(array($_REQUEST["id"], $_REQUEST["sendcode"], $_REQUEST["amount"]));
    AffiliatePayment($_SESSION[$install_directory_name . "_idev_LoggedAdmin"] . "|" . $ip_addr . "|" . "Success: Individual - Standard Method" . "|" . $_REQUEST["id"] . "|" . $_REQUEST["amount"]);
    $event = "payment_completed";
    $data_affiliate_id = $_REQUEST["id"];
    $data_amount = number_format($_REQUEST["amount"], $decimal_symbols);
    $data_currency = $currency;
    include $path . "/API/webhooks/webhook.php";
    $lastrec = $db->query("select max(record) as latest from idevaff_payments");
    $lastres = $lastrec->fetch();
    $lastres = $lastres["latest"];
    $q1 = $db->prepare("SELECT * FROM idevaff_sales WHERE id = ? and approved = '1'");
    $q1->execute(array($_REQUEST["id"]));
    $number = $q1->rowCount();
    $count = 0;
    while ($count < $number) {
        $data = $q1->fetch();
        $st = $db->prepare("INSERT INTO idevaff_archive (id,payment,top_tier_tag,bonus,ip,code,tracking,tier_id,op1,op2,op3,amount,type,split,profile,referring_url,sub_id,payment_rec,tid1,tid2,tid3,tid4,target_url,currency,converted_amount,override,override_id,geo,tracking_method,notes,src1,src2,clickid)\r\nVALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $st->execute(array($data["id"], $data["payment"], $data["top_tier_tag"], $data["bonus"], $data["ip"], $data["code"], $data["tracking"], $data["tier_id"], $data["op1"], $data["op2"], $data["op3"], $data["amount"], $data["type"], $data["split"], $data["profile"], $data["referring_url"], $data["sub_id"], $lastres, $data["tid1"], $data["tid2"], $data["tid3"], $data["tid4"], $data["target_url"], $data["currency"], $data["converted_amount"], $data["override_id"], $data["override_id"], $data["geo"], $data["tracking_method"], $data["notes"], $data["src1"], $data["src2"], $data["clickid"]));
        $count = $count + 1;
    }
    $check_for_debits = $db->prepare("SELECT COUNT(*) FROM idevaff_debit where aff_id = ?");
    $check_for_debits->execute(array($_REQUEST["id"]));
    if ($check_for_debits->fetchColumn()) {
        $debit_data = $db->prepare("SELECT * FROM idevaff_debit where aff_id = ?");
        $debit_data->execute(array($_REQUEST["id"]));
        while ($debit_data_results = $debit_data->fetch()) {
            $st = $db->prepare("INSERT INTO idevaff_debit_archive (aff_id, amount, code, reason, payment_record) VALUES (?, ?, ?, ?, ?)");
            $st->execute(array($debit_data_results["aff_id"], $debit_data_results["amount"], $debit_data_results["code"], $debit_data_results["reason"], $lastres));
            $debit_value = "debit_reason_" . $debit_data_results["reason"];
            $getname = $db->query("select " . $debit_value . " as corvette from idevaff_language_english");
            $qry_name = $getname->fetch();
            $event = "debit_settled";
            $data_affiliate_id = $debit_data_results["aff_id"];
            $data_amount = number_format($debit_data_results["amount"], $decimal_symbols);
            $data_reason = $qry_name["corvette"];
            $data_timestamp = $debit_data_results["code"];
            include $path . "/API/webhooks/webhook.php";
        }
        $st = $db->prepare("delete from idevaff_debit where aff_id = ?");
        $st->execute(array($_REQUEST["id"]));
    }
    $st = $db->prepare("delete from idevaff_sales where id = ? and approved = '1'");
    $st->execute(array($_REQUEST["id"]));
    if ($notify == 1) {
        $id = $_REQUEST["id"];
        include $path . "/templates/email/affiliate.payment.php";
    }
    header("Location: pay_list.php?payment_complete=true");
}
$alldata = $db->prepare("select * from idevaff_affiliates where id = ?");
$alldata->execute(array($_REQUEST["id"]));
$indv_data = $alldata->fetch();
$uname = $indv_data["username"];
$upass = $indv_data["password"];
$payto = $indv_data["payable"];
$company = $indv_data["company"];
$ufname = $indv_data["f_name"];
$ulname = $indv_data["l_name"];
$uemail = $indv_data["email"];
$ad1 = $indv_data["address_1"];
$ad2 = $indv_data["address_2"];
$c = $indv_data["city"];
$s = $indv_data["state"];
$z = $indv_data["zip"];
$coun = $indv_data["country"];
$phone = $indv_data["phone"];
$fax = $indv_data["fax"];
$url = $indv_data["url"];
$pp = $indv_data["pp"];
$paypal = $indv_data["paypal"];
$stripe_user_data = $indv_data["stripe_user_data"];
$hits = $indv_data["hits_in"];
$get_country_name = $db->prepare("select country_name from idevaff_countries where country_code = ?");
$get_country_name->execute(array($coun));
$get_country_data = $get_country_name->fetch();
$coun = $get_country_data["country_name"];
$get_tax = $db->prepare("SELECT AES_DECRYPT(tax_id_ssn, '" . AUTH_KEY . "') AS decrypted FROM idevaff_affiliates where id = ?");
$get_tax->execute(array($_REQUEST["id"]));
$get_tax = $get_tax->fetch();
$utax = $get_tax["decrypted"];
$sales = $db->prepare("select record from idevaff_sales where approved = '1' and top_tier_tag = '0' and id = ?");
$sales->execute(array($_REQUEST["id"]));
$sales = $sales->rowCount();
$tsales = $db->prepare("select record from idevaff_sales where approved = '1' and top_tier_tag = '1' and id = ?");
$tsales->execute(array($_REQUEST["id"]));
$tsales = $tsales->rowCount();
$osales = $db->prepare("select record from idevaff_sales where approved = '1' and override = '1' and id = ?");
$osales->execute(array($_REQUEST["id"]));
$osales = $osales->rowCount();
$earnings2 = $db->prepare("select SUM(payment) AS total from idevaff_sales where id = ? and approved = '1'");
$earnings2->execute(array($_REQUEST["id"]));
$row2 = $earnings2->fetch();
$pexact = $row2["total"];
$pexactd = $pexact;
$debittotal = $db->prepare("select SUM(amount) AS totaldebs from idevaff_debit where aff_id = ?");
$debittotal->execute(array($_REQUEST["id"]));
$debit_total = $debittotal->fetch();
$pexacttotaldebs = $debit_total["totaldebs"];
$pexacttotaldebsd = $pexacttotaldebs;
$amount_to_pay_grand_total = $pexact - $pexacttotaldebs;
if (!$payto) {
    $payto = (string) $ufname . " " . $ulname;
}
$leftSubActiveMenu = "commissions";
include "templates/header.php";
echo "\r\n<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Pay Affiliates</li>\r\n<li class=\"current\"> <a href=\"pay_affiliates.php?id=";
echo html_output($_REQUEST["id"]);
echo "\">Affiliate Payment</a></li>\r\n</ul>\r\n";
include "templates/crumb_right.php";
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Affiliate Payment</h3><span>Individual Payment: Standard Method</span></div>\r\n";
include "templates/stats.php";
echo "</div>\r\n\r\n";
include "includes/notifications.php";
echo "\r\n";
$check_for_data = $db->prepare("SELECT COUNT(*) FROM idevaff_debit where aff_id = ?");
$check_for_data->execute(array($_REQUEST["id"]));
echo "\r\n\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Payment</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Commissions In This Payment</a></li>\r\n";
if ($check_for_data->fetchColumn()) {
    echo "<li ";
    makeActiveTab(25);
    echo "><a href=\"#tab_1_25\" data-toggle=\"tab\">Debits In This Payment</a></li>";
}
echo "<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\">Custom Fields</a></li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, "no");
echo "\" id=\"tab_1_1\">\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"";
if ($amount_to_pay_grand_total <= 0) {
    echo " style=\"background:#CC0000; color:#FFFFFF; font-weight:bold;\"";
}
echo ">\r\n<span class=\"pull-left\">\r\n";
if (0 < $amount_to_pay_grand_total) {
    echo "<a href=\"invoice.php?id=";
    echo html_output($_REQUEST["id"]);
    echo "\" target=\"_blank\"><button class=\"btn btn-danger btn-sm\">Print Invoice</button></a> \r\n<a href=\"invoice_pdf.php?id=";
    echo html_output($_REQUEST["id"]);
    echo "\" target=\"_blank\"><button class=\"btn btn-danger btn-sm\">PDF Invoice</button></a>\r\n";
} else {
    echo "Negative Account Balance - Payment Not Available\r\n";
}
echo "</span>\r\n";
if (0 < $amount_to_pay_grand_total) {
    echo "<span class=\"pull-right\">\r\n<a href=\"setup.php?action=1&tab=3\" class=\"btn btn-sm btn-default\">Adjust Invoice Settings</a>\r\n</span>\r\n";
}
echo "</div>\r\n<div class=\"widget-content\">\r\n<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n<tr>\r\n<td>Affiliate ID</td>\r\n<td>";
echo html_output($_REQUEST["id"]);
echo "</td>\r\n<td>Company</td>\r\n<td>";
if ($company) {
    echo $company;
} else {
    echo "N/A";
}
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Username</td>\r\n<td><a href=\"account_details.php?id=";
echo html_output($_REQUEST["id"]);
echo "\">";
echo $uname;
echo "</a></td>\r\n<td>Commissions</td>\r\n<td>";
echo number_format($sales, 0);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Full Name</td>\r\n<td>";
echo $ufname;
echo " ";
echo $ulname;
echo "</td>\r\n<td>Tier Commissions</td>\r\n<td>";
echo number_format($tsales, 0);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Phone Number</td>\r\n<td>";
echo $phone;
echo "</td>\r\n<td>Override Commissions</td>\r\n<td>";
echo number_format($osales, 0);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Fax Number</td>\r\n<td>";
echo $fax;
echo "</td>\r\n<td>Payment Amount</td>\r\n<td><font color=\"green\"><b>";
if ($cur_sym_location == 1) {
    echo $cur_sym;
}
echo number_format($pexactd, $decimal_symbols);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</b></font></td>\r\n</tr>\r\n<tr>\r\n<td>Tax ID, SSN or VAT</td>\r\n<td>";
echo $utax;
echo "</td>\r\n<td>Total Debits</td>\r\n<td>";
if (0 < $pexacttotaldebs) {
    echo "<font color=\"#CC0000\">";
}
if ($cur_sym_location == 1) {
    echo $cur_sym;
}
echo number_format($pexacttotaldebsd, $decimal_symbols);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
if (0 < $pexacttotaldebs) {
    echo "</font>";
}
echo "</td>\r\n</tr>\r\n\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n";
$alldata_pay = $db->prepare("select pay_method from idevaff_affiliates where id = ?");
$alldata_pay->execute(array($_REQUEST["id"]));
$indv_data_pay = $alldata_pay->fetch();
$getpayid = $indv_data_pay["pay_method"];
$getpayname = $db->prepare("select name from idevaff_payment_methods where id = ?");
$getpayname->execute(array($getpayid));
$getpayname_result = $getpayname->fetch();
$getpayname_result = $getpayname_result["name"];
echo "\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> <font color=\"#CC0000\">Step 1:</font> Complete The Payment - <font color=\"#000000\">";
echo $getpayname_result;
echo "</font> [<a href=\"account_details.php?id=";
echo html_output($_REQUEST["id"]);
echo "&tab=3\">edit</a>]</h4></div>\r\n<div class=\"widget-content\">\r\n\r\n";
if ($getpayid != "0") {
    if ($getpayid == "1") {
        if ($paypal != "") {
            echo "\r\n";
            if (0 < $pexacttotaldebs) {
                echo "<!--<div class=\"alert alert-danger\"><h4>Important Notice!</h4>This account has a debit on it. ";
                if ($cur_sym_location == 1) {
                    echo $cur_sym;
                }
                echo number_format($pexacttotaldebsd, $decimal_symbols);
                if ($cur_sym_location == 2) {
                    echo " " . $cur_sym . " ";
                }
                echo " " . $currency;
                echo " will be deducted from this payment.</div>-->\r\n";
            }
            echo "\r\n";
            if (0 < $amount_to_pay_grand_total) {
                echo "<div class=\"alert alert-info\">After sending payment to your affiliate, click the <strong>Archive This Payment</strong> button in step #2, below.</div>\r\n";
            }
            echo "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_blank\">\r\n<input name=\"csrf_token\" value=\"";
            echo $_SESSION["csrf_token"];
            echo "\" type=\"hidden\" />\r\n<input type=\"hidden\" name=\"currency_code\" value=\"";
            echo $currency;
            echo "\">\r\n<input type=\"hidden\" name=\"no_note\" value=\"1\">\r\n<input type=\"hidden\" name=\"amount\" value=\"";
            echo number_format($amount_to_pay_grand_total, $decimal_symbols, ".", "");
            echo "\">\r\n<input type=\"hidden\" name=\"item_number\" value=\"Affiliate_Payment_";
            echo $cdate;
            echo "\">\r\n<input type=\"hidden\" name=\"item_name\" value=\"";
            echo $sitename;
            echo " Affiliate Payment\">\r\n<input type=\"hidden\" name=\"business\" value=\"";
            echo $paypal;
            echo "\">\r\n<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">\r\n<table class=\"table table-bordered\">\r\n<tbody>\r\n<tr>\r\n<td width=\"25%\">Payment Amount</td>\r\n<td width=\"75%\"><font color=\"green\">";
            if ($cur_sym_location == 1) {
                echo $cur_sym;
            }
            echo number_format($pexactd, $decimal_symbols);
            if ($cur_sym_location == 2) {
                echo " " . $cur_sym . " ";
            }
            echo " " . $currency;
            echo "</font></td>\r\n</tr>\r\n";
            if (0 < $pexacttotaldebs) {
                echo "<tr>\r\n<td width=\"25%\">Minus Debit Amount</td>\r\n<td width=\"75%\">";
                if ($cur_sym_location == 1) {
                    echo $cur_sym;
                }
                echo number_format($pexacttotaldebsd, $decimal_symbols);
                if ($cur_sym_location == 2) {
                    echo " " . $cur_sym . " ";
                }
                echo " " . $currency;
                echo "</td>\r\n</tr>\r\n<tr>\r\n<td><font color=\"#CC0000\"><b>Total Amount To Pay</b></font></td>\r\n<td><font color=\"#CC0000\"><b>";
                if ($cur_sym_location == 1) {
                    echo $cur_sym;
                }
                echo number_format($amount_to_pay_grand_total, $decimal_symbols);
                if ($cur_sym_location == 2) {
                    echo " " . $cur_sym . " ";
                }
                echo " " . $currency;
                echo "</b></font></td>\r\n</tr>\r\n";
            }
            echo "<tr>\r\n<td width=\"25%\">Affiliate's ";
            echo $getpayname_result;
            echo " Account</td>\r\n<td width=\"75%\">";
            echo $paypal;
            echo "</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"2\" colspan=\"2\">\r\n";
            if (0 < $amount_to_pay_grand_total) {
                echo "<button class=\"btn btn-primary btn-lg\">Make ";
                echo $getpayname_result;
                echo " Payment</button>\r\n";
            } else {
                echo "<button class=\"btn btn-danger btn-lg\" disabled>Negative Account Balance - Payment Not Available</button>\r\n";
            }
            echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form>\r\n";
        } else {
            $nopaymentmethod = true;
            echo "<div class=\"alert alert-danger\"><span style=\"font-size:26px;\">ERROR - PAYMENT CANNOT BE COMPLETED!</span><br />This affiliate is set to receive a ";
            echo $getpayname_result;
            echo " payment but does not have a ";
            echo $getpayname_result;
            echo " account added to their affiliate account. Please add a ";
            echo $getpayname_result;
            echo " account for this affiliate before making payment.<br /><br /><a class=\"btn btn-danger\" href=\"account_details.php?id=";
            echo html_output($_REQUEST["id"]);
            echo "&tab=3\">Add ";
            echo $getpayname_result;
            echo " Account Now</a></div>\r\n\r\n";
        }
    } else {
        if ($getpayid == "2") {
            $stripe_user_data = unserialize(base64_decode($indv_data["stripe_user_data"]));
            if (is_array($stripe_user_data) && !empty($stripe_user_data) && $stripe_user_data["access_token"] != "") {
                if (isset($stripe_payment_success) && $stripe_payment_success == "stripe_good") {
                    echo "<strong>Stripe payment successful.</strong> Click the <strong>Archive This Payment</strong> button in step #2, below.\r\n\r\n";
                } else {
                    echo " \r\n\r\n<div class=\"alert alert-info\">After sending payment to your affiliate, click the <strong>Archive This Payment</strong> button in step #2, below.</div>\r\n<div class=\"well\">\r\n    ";
                    Stripe\Stripe::setApiKey(STRIPE_API_SECRET);
                    $stripe_balance = Stripe\Balance::retrieve();
                    $stripe_balance = $stripe_balance->__toArray(true);
                    if ($stripe_balance["livemode"]) {
                        $stripe_balance["livemode"] = "Enabled";
                    } else {
                        $stripe_balance["livemode"] = "Disabled";
                    }
                    $stripe_balance_total = $stripe_balance["available"][1]["amount"] / 100;
                    echo "    <span style=\"font-weight:bold; font-size:18px;\">Stripe Account Details</span><br />\r\n    <strong>Live Mode: </strong>    ";
                    echo $stripe_balance["livemode"];
                    echo " <br>\r\n    <!--<strong>Pending Balance: </strong> ";
                    echo $stripe_balance["pending"][0]["amount"] / 100 . " " . strtoupper($stripe_balance["pending"][0]["currency"]);
                    echo " <br>-->\r\n    <strong>Available Balance: </strong>  ";
                    echo $stripe_balance_total;
                    if (0 < $stripe_balance_total) {
                        echo " " . strtoupper($stripe_balance["available"][1]["currency"]);
                    }
                    echo "</div>\r\n\r\n\r\n<form action=\"pay_affiliates.php\" method=\"post\">\r\n<input name=\"csrf_token\" value=\"";
                    echo $_SESSION["csrf_token"];
                    echo "\" type=\"hidden\" />\r\n    <input type=\"hidden\" name=\"process_stripe_payment\" value=\"1\" />    \r\n<input type=\"hidden\" name=\"id\" value=\"";
                    echo html_output($_REQUEST["id"]);
                    echo "\">\r\n\r\n\r\n<table class=\"table table-bordered\">\r\n<tbody>\r\n<tr>\r\n<td width=\"25%\">Payment Amount</td>\r\n<td width=\"75%\"><font color=\"green\">";
                    if ($cur_sym_location == 1) {
                        echo $cur_sym;
                    }
                    echo number_format($pexactd, $decimal_symbols);
                    if ($cur_sym_location == 2) {
                        echo " " . $cur_sym . " ";
                    }
                    echo " " . $currency;
                    echo "</font></td>\r\n</tr>\r\n";
                    if (0 < $pexacttotaldebs) {
                        echo "<tr>\r\n<td width=\"25%\">Minus Debit Amount</td>\r\n<td width=\"75%\">";
                        if ($cur_sym_location == 1) {
                            echo $cur_sym;
                        }
                        echo number_format($pexacttotaldebsd, $decimal_symbols);
                        if ($cur_sym_location == 2) {
                            echo " " . $cur_sym . " ";
                        }
                        echo " " . $currency;
                        echo "</td>\r\n</tr>\r\n<tr>\r\n<td><font color=\"#CC0000\"><b>Total Amount To Pay</b></font></td>\r\n<td><font color=\"#CC0000\"><b>";
                        if ($cur_sym_location == 1) {
                            echo $cur_sym;
                        }
                        echo number_format($amount_to_pay_grand_total, $decimal_symbols);
                        if ($cur_sym_location == 2) {
                            echo " " . $cur_sym . " ";
                        }
                        echo " " . $currency;
                        echo "</b></font></td>\r\n</tr>\r\n";
                    }
                    echo "<tr>\r\n<td width=\"25%\">Affiliate's ";
                    echo $getpayname_result;
                    echo " Account</td>\r\n<td width=\"75%\">";
                    echo $stripe_user_data["stripe_user_id"];
                    echo "</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"2\" colspan=\"2\">\r\n";
                    if (0 < $amount_to_pay_grand_total) {
                        echo "<button class=\"btn btn-primary btn-lg\">Make ";
                        echo $getpayname_result;
                        echo " Payment</button>\r\n";
                    } else {
                        echo "<button class=\"btn btn-danger btn-lg\" disabled>Negative Account Balance - Payment Not Available</button>\r\n";
                    }
                    echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form>\r\n<!--<h2>Negative Account Balance - Payment Not Available</h2>-->\r\n\r\n";
                }
            } else {
                $nopaymentmethod = true;
                echo "<div class=\"alert alert-danger\"><span style=\"font-size:26px;\">ERROR - PAYMENT CANNOT BE COMPLETED!</span><br />This affiliate is set to receive a ";
                echo $getpayname_result;
                echo " payment but does not have a valid ";
                echo $getpayname_result;
                echo " account added to their affiliate account. Please add a ";
                echo $getpayname_result;
                echo " account for this affiliate before making payment.<br /><br /><a class=\"btn btn-danger\" href=\"account_details.php?id=";
                echo html_output($_REQUEST["id"]);
                echo "&tab=3\">Add ";
                echo $getpayname_result;
                echo " Account Now</a></div>\r\n\r\n";
            }
        } else {
            if ($getpayid == "4") {
                echo "\r\n";
                if (0 < $amount_to_pay_grand_total) {
                    echo "<div class=\"alert alert-info\">After sending payment to your affiliate, click the <strong>Archive This Payment</strong> button in step #2, below.</div>\r\n";
                }
                echo "\r\n<table class=\"table table-bordered\">\r\n<tbody>\r\n<tr>\r\n<td width=\"25%\">Payment Amount</td>\r\n<td width=\"75%\"><font color=\"green\">";
                if ($cur_sym_location == 1) {
                    echo $cur_sym;
                }
                echo number_format($pexactd, $decimal_symbols);
                if ($cur_sym_location == 2) {
                    echo " " . $cur_sym . " ";
                }
                echo " " . $currency;
                echo "</font></td>\r\n</tr>\r\n";
                if (0 < $pexacttotaldebs) {
                    echo "<tr>\r\n<td width=\"25%\">Minus Debit Amount</td>\r\n<td width=\"75%\">";
                    if ($cur_sym_location == 1) {
                        echo $cur_sym;
                    }
                    echo number_format($pexacttotaldebsd, $decimal_symbols);
                    if ($cur_sym_location == 2) {
                        echo " " . $cur_sym . " ";
                    }
                    echo " " . $currency;
                    echo "</td>\r\n</tr>\r\n<tr>\r\n<td><font color=\"#CC0000\"><b>Total Amount To Pay</b></font></td>\r\n<td><font color=\"#CC0000\"><b>";
                    if ($cur_sym_location == 1) {
                        echo $cur_sym;
                    }
                    echo number_format($amount_to_pay_grand_total, $decimal_symbols);
                    if ($cur_sym_location == 2) {
                        echo " " . $cur_sym . " ";
                    }
                    echo " " . $currency;
                    echo "</b></font></td>\r\n</tr>\r\n";
                }
                echo "</tbody>\r\n</table>\r\n\r\n<table class=\"table table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n<tr>\r\n<td>Payable To: ";
                echo $payto;
                echo "</td>\r\n</tr>\r\n<tr>\r\n<td>";
                echo $ad1;
                echo "</td>\r\n</tr>\r\n<tr>\r\n<td>";
                if ($ad2) {
                    echo $ad2;
                } else {
                    echo $c;
                    echo ", ";
                    echo $s;
                    echo " ";
                    echo $z;
                    echo " - ";
                    echo $coun;
                }
                echo "</td>\r\n</tr>\r\n";
                if ($ad2) {
                    echo "<tr><td>";
                    echo $c;
                    echo ", ";
                    echo $s;
                    echo " ";
                    echo $z;
                    echo " - ";
                    echo $coun;
                    echo "</td></tr>";
                }
                echo "</tbody>\r\n</table>\r\n\r\n";
            } else {
                if ($getpayid == "3" || "4" < $getpayid) {
                    echo "\r\n";
                    if (0 < $amount_to_pay_grand_total) {
                        echo "<div class=\"alert alert-info\">After completing payment, or other compensation for your affiliate, click the <strong>Archive This Payment</strong> button in step #2, below.</div>\r\n";
                    }
                    echo "\r\n<table class=\"table table-bordered\">\r\n<tbody>\r\n<tr>\r\n<td width=\"25%\">Payment Amount</td>\r\n<td width=\"75%\"><font color=\"green\">";
                    if ($cur_sym_location == 1) {
                        echo $cur_sym;
                    }
                    echo number_format($pexactd, $decimal_symbols);
                    if ($cur_sym_location == 2) {
                        echo " " . $cur_sym . " ";
                    }
                    echo " " . $currency;
                    echo "</font></td>\r\n</tr>\r\n";
                    if (0 < $pexacttotaldebs) {
                        echo "<tr>\r\n<td width=\"25%\">Minus Debit Amount</td>\r\n<td width=\"75%\">";
                        if ($cur_sym_location == 1) {
                            echo $cur_sym;
                        }
                        echo number_format($pexacttotaldebsd, $decimal_symbols);
                        if ($cur_sym_location == 2) {
                            echo " " . $cur_sym . " ";
                        }
                        echo " " . $currency;
                        echo "</td>\r\n</tr>\r\n<tr>\r\n<td><font color=\"#CC0000\"><b>Total Amount To Pay</b></font></td>\r\n<td><font color=\"#CC0000\"><b>";
                        if ($cur_sym_location == 1) {
                            echo $cur_sym;
                        }
                        echo number_format($amount_to_pay_grand_total, $decimal_symbols);
                        if ($cur_sym_location == 2) {
                            echo " " . $cur_sym . " ";
                        }
                        echo " " . $currency;
                        echo "</b></font></td>\r\n</tr>\r\n";
                    }
                    echo "</tbody>\r\n</table>\r\n\r\n";
                }
            }
        }
    }
} else {
    $nopaymentmethod = true;
    echo "<div class=\"alert alert-danger\"><span style=\"font-size:26px;\">ERROR - PAYMENT CANNOT BE COMPLETED!</span><br />This affiliate does not have a payment method selected. Please add a payment method for this account.<br /><br /><a class=\"btn btn-danger\" href=\"account_details.php?id=";
    echo html_output($_REQUEST["id"]);
    echo "&tab=3\">Add Payment Method Now</a></div>\r\n";
}
echo "\r\n</div>\r\n</div>\r\n</div>\r\n\r\n";
if (!isset($nopaymentmethod)) {
    echo "\r\n";
    if (0 < $amount_to_pay_grand_total) {
        echo "<div class=\"col-md-12\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> <font color=\"#CC0000\">Step 2:</font> Archive The Payment</h4></div>\r\n<div class=\"widget-content\">\r\n<div class=\"alert alert-danger\">After you've sent the payment to the affiliate in step #1 (above), click the button below to archive the payment. This moves all commissions from this payment to the archive with a <strong>paid</strong> status.</div>\r\n<form class=\"stdform stdform2\" method=\"post\" action=\"pay_affiliates.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION["csrf_token"];
        echo "\" type=\"hidden\" />\r\n<input type=\"hidden\" name=\"archive\" value=\"1\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
        echo html_output($_REQUEST["id"]);
        echo "\">\r\n<input type=\"hidden\" name=\"amount\" value=\"";
        echo number_format($amount_to_pay_grand_total, $decimal_symbols, ".", "");
        echo "\">\r\n<input type=\"hidden\" name=\"sendcode\" value=\"";
        echo time();
        echo "\">\r\n<button class=\"btn btn-primary btn-lg\">Archive This Payment</button>\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n";
    }
    echo "\r\n";
}
echo "\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, "no");
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Commissions In This Payment</h4></div>\r\n<div class=\"widget-content\">\r\n<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<thead>\r\n<th>Commission Date</th>\r\n<th>Commission Type</th>\r\n<th>Order Number</th>\r\n<th>Commission Amount</th>\r\n</thead>\r\n<tbody>\r\n";
$acct = $db->prepare("select * from idevaff_sales where id = ? and approved = '1' and type != '3' ORDER BY record DESC");
$acct->execute(array($_REQUEST["id"]));
while ($qry = $acct->fetch()) {
    $indidate = date($dateformat, $qry["code"]);
    $indiamt = $qry["payment"];
    $indiamtd = number_format($indiamt, $decimal_symbols);
    $stat1 = $qry["top_tier_tag"];
    $stat2 = $qry["bonus"];
    $stat4 = $qry["override"];
    $ordnum = $qry["tracking"];
    if (!$ordnum) {
        $ordnum = "N/A";
    }
    if ($stat1 == 1) {
        $put = "<font color=\"#CC0000\">Tier Commission</font>";
    } else {
        if ($stat4 == 1) {
            $put = "<b>Override Commission</b>";
        } else {
            if ($stat2 == 1) {
                $put = "<b>Bonus Commission</b>";
            } else {
                $put = "Standard Commission";
            }
        }
    }
    echo "<tr>\r\n<td>";
    echo $indidate;
    echo "</td>\r\n<td>";
    echo $put;
    echo "</td>\r\n<td>";
    echo $ordnum;
    echo "</td>\r\n<td>";
    if ($cur_sym_location == 1) {
        echo $cur_sym;
    }
    echo $indiamtd;
    if ($cur_sym_location == 2) {
        echo " " . $cur_sym . " ";
    }
    echo " " . $currency;
    echo "</td>\r\n</tr>\r\n";
}
echo "<tr>\r\n<td style=\"color:#CC0000;\">PPC Commissions Do Not Appear In This List</td>\r\n<td></td>\r\n<td style=\"color:#CC0000; text-align:right;\">Total Commissions</td>\r\n<td style=\"color:#CC0000; font-weight:bold;\">";
if ($cur_sym_location == 1) {
    echo $cur_sym;
}
echo number_format($pexact, $decimal_symbols);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(25, "no");
echo "\" id=\"tab_1_25\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Debits In This Payment</h4></div>\r\n<div class=\"widget-content\">\r\n<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<thead>\r\n<th>Debit Date</th>\r\n<th>Debit Reason</th>\r\n<th>Debit Amount</th>\r\n</thead>\r\n<tbody>\r\n";
$acctdeb = $db->prepare("select * from idevaff_debit where aff_id = ? ORDER BY id");
$acctdeb->execute(array($_REQUEST["id"]));
while ($qry1 = $acctdeb->fetch()) {
    $debitdate = date($dateformat, $qry1["code"]);
    $debitamt = $qry1["amount"];
    $debitamtd = number_format($debitamt, $decimal_symbols);
    $debitreason = ${"debit_reason_" . $qry1["reason"]};
    echo "<tr>\r\n<td>";
    echo $debitdate;
    echo "</td>\r\n<td>";
    echo $debitreason;
    echo "</td>\r\n<td>";
    if ($cur_sym_location == 1) {
        echo $cur_sym;
    }
    echo $debitamtd;
    if ($cur_sym_location == 2) {
        echo " " . $cur_sym . " ";
    }
    echo " " . $currency;
    echo "</td>\r\n</tr>\r\n";
}
echo "<tr>\r\n<td style=\"color:#CC0000; text-align:right;\" colspan=\"2\">Total Debits</td>\r\n<td style=\"color:#CC0000; font-weight:bold;\">";
if ($cur_sym_location == 1) {
    echo $cur_sym;
}
echo number_format($pexacttotaldebsd, $decimal_symbols);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, "no");
echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Custom Fields</h4></div>\r\n<div class=\"widget-content\">\r\n";
$getcustomrows = $db->query("select id, title from idevaff_form_fields_custom where display_payment = '1' order by sort");
if ($getcustomrows->rowCount()) {
    while ($qry = $getcustomrows->fetch()) {
        $group_id = $qry["id"];
        $custom_title = $qry["title"];
        $getvars = $db->prepare("select custom_value from idevaff_form_custom_data where custom_id = ? and affid = ?");
        $getvars->execute(array($group_id, $_REQUEST["id"]));
        $getvars = $getvars->fetch();
        $custom_value = $getvars["custom_value"];
        if ($custom_value == NULL) {
            $custom_value = "N/A";
        }
        echo "<h4>";
        echo $custom_title;
        echo "</h4>\r\n";
        echo $custom_value;
        echo "<br /><br />\r\n\r\n";
    }
} else {
    echo "No custom field answers have been set to display on the payment page.\r\n";
}
echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n\r\n\r\n</div>\r\n</div>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n";
include "templates/footer.php";

?>