<?php

include_once '../API/config.php';
include_once 'includes/session.check.php';
$alldata = $db->prepare('select * from idevaff_affiliates where id = ?');
$alldata->execute([$_REQUEST['id']]);
$indv_data = $alldata->fetch();
$uname = $indv_data['username'];
$payto = $indv_data['payable'];
$ufname = $indv_data['f_name'];
$ulname = $indv_data['l_name'];
$uemail = $indv_data['email'];
$ad1 = $indv_data['address_1'];
$ad2 = $indv_data['address_2'];
$c = $indv_data['city'];
$s = $indv_data['state'];
$z = $indv_data['zip'];
$coun = $indv_data['country'];
$phone = $indv_data['phone'];
$fax = $indv_data['fax'];
$url = $indv_data['url'];
$pp = $indv_data['pp'];
$hits = $indv_data['hits_in'];
$company = $indv_data['company'];
$app = $indv_data['approved'];
$pay_method = $indv_data['pay_method'];
if (0 < $pay_method) {
    $get_paymethod = $db->prepare('select name from idevaff_payment_methods where id = ?');
    $get_paymethod->execute([$pay_method]);
    $get_paymethod_data = $get_paymethod->fetch();
    $pay_method_name = $get_paymethod_data['name'];
} else {
    $pay_method_name = 'N/A';
}

$get_country_name = $db->prepare('select country_name from idevaff_countries where country_code = ?');
$get_country_name->execute([$coun]);
$get_country_data = $get_country_name->fetch();
$coun = $get_country_data['country_name'];
$get_tax = $db->prepare("SELECT AES_DECRYPT(tax_id_ssn, '".AUTH_KEY."') AS decrypted FROM idevaff_affiliates where id = ?");
$get_tax->execute([$_REQUEST['id']]);
$get_tax = $get_tax->fetch();
$utax = $get_tax['decrypted'];
$get_data = $db->query('select * from idevaff_invoice');
$get_data = $get_data->fetch();
$incom = $get_data['company'];
$inad1 = $get_data['ad1'];
$inad2 = $get_data['ad2'];
$incit = $get_data['city'];
$insta = $get_data['state'];
$inzip = $get_data['zip'];
$country_select = $get_data['country'];
$innot = $get_data['note'];
$get_country_name = $db->prepare('select country_name from idevaff_countries where country_code = ?');
$get_country_name->execute([$country_select]);
$get_country_data = $get_country_name->fetch();
$country_select = $get_country_data['country_name'];
$earnings2 = $db->prepare("select SUM(payment) AS total from idevaff_sales where id = ? and approved = '1'");
$earnings2->execute([$_REQUEST['id']]);
$row2 = $earnings2->fetch();
$pexact = $row2['total'];
$debittotal = $db->prepare('select SUM(amount) AS totaldebs from idevaff_debit where aff_id = ?');
$debittotal->execute([$_REQUEST['id']]);
$debit_total = $debittotal->fetch();
$pexacttotaldebs = $debit_total['totaldebs'];
$pexacttotaldebsd = $pexacttotaldebs;
$amount_to_pay_grand_total = $pexact - $pexacttotaldebsd;
$check_for_vat = $db->prepare("select * from idevaff_vat where country = ? and admin_invoice = '1'");
$check_for_vat->execute([$indv_data['country']]);
if ($check_for_vat->rowCount()) {
    $get_vals = $check_for_vat->fetch();
    $vat_value = $get_vals['rate'];
    $vat_value_extended = '1'.$vat_value;
    $check_vat_valid = $db->prepare("SELECT COUNT(*) FROM idevaff_affiliates where id = ? and vat_override = '1'");
    $check_vat_valid->execute([$_REQUEST['id']]);
    if (!$check_vat_valid->fetchColumn()) {
        $vat_amount = $amount_to_pay_grand_total / $vat_value_extended * $vat_value;
    }
}

echo "\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\r\n\t\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo $char_set;
echo "\" />\r\n<title>iDevAffiliate Report - Payment Invoice</title>\r\n<link href=\"//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic\" rel=\"stylesheet\" type=\"text/css\">\r\n<link rel=\"stylesheet\" href=\"templates/style_invoice.css\" type=\"text/css\">\r\n</head>\r\n<body>\r\n<div class=\"main_container\">\r\n\t<div class=\"row\">\r\n\t\t<div class=\"row-half fleft\">\r\n\t\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t\t<thead>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<th scope=\"col\">Affiliate Information</th>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</thead>\r\n\t\t\t\t<tbody>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td>";
if ($company) {
    echo "\t\t\t\t\t\t\t";
    echo $company;
    echo "<br />\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t\t";
echo $ufname;
echo ' ';
echo $ulname;
echo "<br />\r\n\t\t\t\t\t\t\t";
echo $ad1;
echo "<br />\r\n\t\t\t\t\t\t\t";
if ($ad2) {
    echo "\t\t\t\t\t\t\t";
    echo $ad2;
    echo "<br />\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t\t";
echo $c;
echo ', ';
echo $s;
echo ' ';
echo $z;
echo "<br />\r\n\t\t\t\t\t\t\tCountry: ";
echo $coun;
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</tbody>\r\n\t\t\t</table>\r\n\t\t</div>\r\n\t\t<div class=\"row-half fright\">\r\n\t\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t\t<thead>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<th scope=\"col\">";
echo $sitename;
echo " Information</th>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</thead>\r\n\t\t\t\t<tbody>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td>";
if ($incom) {
    echo "\t\t\t\t\t\t\t";
    echo $incom;
    echo "<br />\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t\t";
echo $inad1;
echo "<br />\r\n\t\t\t\t\t\t\t";
if ($inad2) {
    echo "\t\t\t\t\t\t\t";
    echo $inad2;
    echo "<br />\r\n\t\t\t\t\t\t\t";
}

echo "\t\t\t\t\t\t\t";
echo $incit;
echo ', ';
echo $insta;
echo ' ';
echo $inzip;
echo "<br />\r\n\t\t\t\t\t\t\tCountry: ";
echo $country_select;
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</tbody>\r\n\t\t\t</table>\r\n\t\t</div>\r\n\t</div>\r\n\t<div class=\"row\">\r\n\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t<thead>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<th colspan=\"3\" scope=\"col\">Account Information</th>\r\n\t\t\t\t</tr>\r\n\t\t\t</thead>\r\n\t\t\t<tbody>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"16%\" class=\"grey\">Affiliate ID</td>\r\n\t\t\t\t\t<td width=\"34%\">";
echo html_output($_REQUEST['id']);
echo "</td>\r\n\t\t\t\t\t<td width=\"50%\" rowspan=\"5\" style=\"text-align:center;vertical-align:middle;\"><a href=\"#\" onclick=\"window.print();return false;\"><img border=\"0\" src=\"../images/print_invoice.gif\" width=\"31\" height=\"31\"></a><br />\r\n\t\t\t\t\t\t<a href=\"#\" onclick=\"window.print();return false;\">Print Invoice</a></td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"16%\" class=\"grey\">Username</td>\r\n\t\t\t\t\t<td width=\"34%\">";
echo $uname;
echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"16%\" class=\"grey\">Phone Number</td>\r\n\t\t\t\t\t<td width=\"34%\">";
echo $phone;
echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"16%\" class=\"grey\">Payment Preference</td>\r\n\t\t\t\t\t<td width=\"34%\">";
echo $pay_method_name;
echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"16%\" class=\"grey\">Tax ID, SSN or VAT</td>\r\n\t\t\t\t\t<td width=\"34%\">";
if ($utax) {
    echo $utax;
} else {
    echo 'N/A';
}

echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t</tbody>\r\n\t\t</table>\r\n\t</div>\r\n\t<div class=\"row\">\r\n\t\t";
$getcustomrows = $db->query("select id, title from idevaff_form_fields_custom where display_invoice = '1' order by sort");
if ($getcustomrows->rowCount()) {
    echo "\t\t";
    echo '<table class="table_invoice" border="0" cellpadding="0" cellspacing="0" width="100%"><thead><th colspan="2">Custom Fields</th>';
    foreach ($getcustomrows->fetchAll() as $qry) {
        $group_id = $qry['id'];
        $custom_title = $qry['title'];
        $getvars = $db->prepare('select custom_value from idevaff_form_custom_data where custom_id = ? and affid = ?');
        $getvars->execute([$group_id, $_REQUEST['id']]);
        $getvars = $getvars->fetch();
        $custom_value = $getvars['custom_value'];
        if (null === $custom_value) {
        }else{
        echo '</thead><tr><tbody>';
        echo "<td class='grey' width='40%'>".$custom_title."\n</td>";
        echo "<td width='60%'>".$custom_value."\n</td>";
        echo '</tbody></tr>';
        }

    }
    echo '</table>';
}

echo "\t</div>\r\n\t<div class=\"row\">\r\n\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t<thead>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<th colspan=\"2\" scope=\"col\">Payment Information</th>\r\n\t\t\t\t</tr>\r\n\t\t\t</thead>\r\n\t\t\t<tbody>\r\n\t\t\t<td width=\"25%\">Payment Date</td>\r\n\t\t\t\t<td width=\"75%\">";
$pdate = time();
echo date($dateformat, $pdate);
echo "</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td width=\"25%\">";
if ($pexacttotaldebs <= 0) {
    echo '<font color="#CC0000">';
}

echo 'Payment Amount';
if ($pexacttotaldebs <= 0) {
    echo '</font>';
}

echo "</td>\r\n\t\t\t\t<td width=\"75%\">";
if ($pexacttotaldebs <= 0) {
    echo '<font color="#CC0000">';
}

if (1 === $cur_sym_location) {
    echo $cur_sym;
}

echo number_format($pexact, $decimal_symbols);
if (2 === $cur_sym_location) {
    echo ' '.$cur_sym.' ';
}

echo ' '.$currency;
if ($pexacttotaldebs <= 0) {
}

echo "</td>\r\n\t\t\t</tr>\r\n";
if (0 < $pexacttotaldebs) {
    echo "\t\t\t<tr>\r\n\t\t\t\t<td width=\"25%\">Minus Debit Amount</td>\r\n\t\t\t\t<td width=\"75%\">";
    if (1 === $cur_sym_location) {
        echo $cur_sym;
    }

    echo number_format($pexacttotaldebsd, $decimal_symbols);
    if (2 === $cur_sym_location) {
        echo ' '.$cur_sym.' ';
    }

    echo ' '.$currency;
    echo "</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td width=\"25%\"><font color=\"#CC0000\">Revised Payment Amount</font></td>\r\n\t\t\t\t<td width=\"75%\"><font color=\"#CC0000\">\r\n\t\t\t\t\t";
    if (1 === $cur_sym_location) {
        echo $cur_sym;
    }

    echo number_format($amount_to_pay_grand_total, $decimal_symbols);
    if (2 === $cur_sym_location) {
        echo ' '.$cur_sym.' ';
    }

    echo ' '.$currency;
    echo "\t\t\t\t\t</font></td>\r\n\t\t\t</tr>\r\n";
}

echo "\t\t\t";
if (isset($vat_amount)) {
    echo "\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"25%\">VAT Amount</td>\r\n\t\t\t\t\t<td width=\"75%\">";
    if (1 === $cur_sym_location) {
        echo $cur_sym;
    }

    echo number_format($vat_amount, $decimal_symbols);
    if (2 === $cur_sym_location) {
        echo ' '.$cur_sym.' ';
    }

    echo ' '.$currency;
    echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t";
}

echo "\t\t\t\t</tbody>\r\n\t\t\t\r\n\t\t</table>\r\n\t</div>\r\n\t\r\n";
if (0 < $pexacttotaldebs) {
    echo "\t<div class=\"row\">\r\n\t\r\n\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t<thead>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<th width=\"25%\">Debit Date</th>\r\n\t\t\t\t\t<th width=\"25%\">Debit Amount</th>\r\n\t\t\t\t\t<th width=\"50%\">Debit Reason</th>\r\n\t\t\t\t</tr>\r\n\t\t\t</thead>\r\n\t\t\t<tbody>\r\n";
    $acct = $db->prepare('select * from idevaff_debit where aff_id = ? ORDER BY id');
    $acct->execute([$_REQUEST['id']]);
    foreach ($acct->fetchAll() as $qry) {
        $indidate_debit = date($dateformat, $qry['code']);
        $indiamt_debit = $qry['amount'];
        $indiamtd_debit = number_format($indiamt_debit, $decimal_symbols);
        $debitreason = ${'debit_reason_'.$qry['reason']};
        echo "\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"25%\">";
        echo $indidate_debit;
        echo "</td>\r\n\t\t\t\t\t<td width=\"25%\">";
        if (1 === $cur_sym_location) {
            echo $cur_sym;
        }

        echo $indiamtd_debit;
        if (2 === $cur_sym_location) {
            echo ' '.$cur_sym.' ';
        }

        echo ' '.$currency;
        echo "</td>\r\n\t\t\t\t\t<td width=\"50%\">";
        echo $debitreason;
        echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t";
    }
    echo "\t\t\t</tbody>\r\n\t\t</table>\r\n\t</div>\r\n";
}

echo "\r\n\t<div class=\"row\">\r\n\t\t<table class=\"table_invoice\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t\t\t<thead>\r\n\t\t\t\t<tr>\r\n\t\t\t\t\t<th width=\"25%\">Commission Date</th>\r\n\t\t\t\t\t<th width=\"25%\">Commission Amount</th>\r\n\t\t\t\t\t<th width=\"25%\">Order Number</th>\r\n\t\t\t\t\t<th width=\"25%\">Commission Type</th>\r\n\t\t\t\t</tr>\r\n\t\t\t</thead>\r\n\t\t\t<tbody>\r\n";
$acct = $db->prepare("select * from idevaff_sales where id = ? and approved = '1' ORDER BY record DESC");
$acct->execute([$_REQUEST['id']]);
foreach ($acct->fetchAll() as $qry) {
    $indidate = date($dateformat, $qry['code']);
    $indiamt = $qry['payment'];
    $indiamtd = number_format($indiamt, $decimal_symbols);
    $stat1 = $qry['top_tier_tag'];
    $stat2 = $qry['bonus'];
    $stat4 = $qry['override'];
    $ordnum = $qry['tracking'];
    if (1 === $stat1) {
        $put = 'Tier Commission';
    } else {
        if (1 === $stat4) {
            $put = 'Override Commission';
        } else {
            if (1 === $stat2) {
                $put = 'Bonus Commission';
            } else {
                $put = 'Standard Commission';
            }
        }
    }

    if ('' === $ordnum) {
        $ordnum = 'N/A';
    }

    echo "\t\t\t\t<tr>\r\n\t\t\t\t\t<td width=\"25%\">";
    echo $indidate;
    echo "</td>\r\n\t\t\t\t\t<td width=\"25%\">";
    if (1 === $cur_sym_location) {
        echo $cur_sym;
    }

    echo $indiamtd;
    if (2 === $cur_sym_location) {
        echo ' '.$cur_sym.' ';
    }

    echo ' '.$currency;
    echo "</td>\r\n\t\t\t\t\t<td width=\"25%\">";
    echo $ordnum;
    echo "</td>\r\n\t\t\t\t\t<td width=\"25%\">";
    echo $put;
    echo "</td>\r\n\t\t\t\t</tr>\r\n\t\t\t\t";
}
echo "\t\t\t</tbody>\r\n\t\t</table>\r\n\t</div>\r\n\t<div class=\"row\">\r\n\t\t<div class=\"row-half fleft\">\r\n\t\t\t<div class=\"administator\">\r\n\t\t\t\t<h4>Administrator Note</h4>\r\n\t\t\t\t<p>";
echo $innot;
echo "</p>\r\n\t\t\t</div>\r\n\t\t</div>\r\n\t\t<div class=\"fright\">\r\n\t\t\t<div class=\"commission\">\r\n\t\t\t\t<h4>Total Payment Amount</h4>\r\n\t\t\t\t<h1>\r\n\t\t\t\t\t";
if (1 === $cur_sym_location) {
    echo $cur_sym;
}

echo number_format($amount_to_pay_grand_total, $decimal_symbols);
if (2 === $cur_sym_location) {
    echo ' '.$cur_sym.' ';
}

echo ' '.$currency;
echo "\t\t\t\t</h1>\r\n\t\t\t</div>\r\n\t\t</div>\r\n\t</div>\r\n</div>\r\n</body>\r\n</html>";

?>