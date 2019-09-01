<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
include_once 'includes/session.check_affiliates.php';
$get_data = $db->query('select * from idevaff_invoice');
$get_data = $get_data->fetch();
$aff_inv = $get_data['aff_inv'];
if (1 === $aff_inv && isset($_POST['stamp'])) {
    $temp_fields = "invoice_header,invoice_aff_info,invoice_co_info,invoice_acct_info,invoice_payment_info,\r\n    invoice_comm_date,invoice_comm_amt,invoice_comm_type,invoice_admin_note,invoice_footer,invoice_print,invoice_none,\r\n    invoice_aff_id,invoice_aff_user,signup_personal_phone,signup_standard_taxinfo,signup_personal_country,vat_amount_heading,comdetails_date,comdetails_type_1,comdetails_type_3,comdetails_type_4";

    try {
        $query = $db->query('select '.$temp_fields.' from `idevaff_language_'.$pack_table_selected.'` LIMIT 1');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: '.$ex->getFile().'<br><strong>Line:</strong> '.$ex->getLine().'<br><strong>Message:</strong> '.$ex->getMessage();
        exit();
    }
    $invoice_header = html_language_output($getlanguage['invoice_header']);
    $invoice_aff_info = html_language_output($getlanguage['invoice_aff_info']);
    $invoice_co_info = html_language_output($getlanguage['invoice_co_info']);
    $invoice_acct_info = html_language_output($getlanguage['invoice_acct_info']);
    $invoice_payment_info = html_language_output($getlanguage['invoice_payment_info']);
    $invoice_comm_date = html_language_output($getlanguage['invoice_comm_date']);
    $invoice_comm_amt = html_language_output($getlanguage['invoice_comm_amt']);
    $invoice_comm_type = html_language_output($getlanguage['invoice_comm_type']);
    $invoice_admin_note = html_language_output($getlanguage['invoice_admin_note']);
    $invoice_footer = html_language_output($getlanguage['invoice_footer']);
    $invoice_print = html_language_output($getlanguage['invoice_print']);
    $invoice_none = html_language_output($getlanguage['invoice_none']);
    $invoice_aff_id = html_language_output($getlanguage['invoice_aff_id']);
    $invoice_aff_user = html_language_output($getlanguage['invoice_aff_user']);
    $signup_personal_phone = html_language_output($getlanguage['signup_personal_phone']);
    $signup_standard_taxinfo = html_language_output($getlanguage['signup_standard_taxinfo']);
    $signup_personal_country = html_language_output($getlanguage['signup_personal_country']);
    $vat_amount_heading = html_language_output($getlanguage['vat_amount_heading']);
    $comdetails_date = html_language_output($getlanguage['comdetails_date']);
    $comdetails_type_1 = html_language_output($getlanguage['comdetails_type_1']);
    $comdetails_type_3 = html_language_output($getlanguage['comdetails_type_3']);
    $comdetails_type_4 = html_language_output($getlanguage['comdetails_type_4']);
    $smarty->assign('invoice_header', $invoice_header);
    $smarty->assign('invoice_aff_info', $invoice_aff_info);
    $smarty->assign('invoice_co_info', $invoice_co_info);
    $smarty->assign('invoice_acct_info', $invoice_acct_info);
    $smarty->assign('invoice_payment_info', $invoice_payment_info);
    $smarty->assign('invoice_comm_date', $invoice_comm_date);
    $smarty->assign('invoice_comm_amt', $invoice_comm_amt);
    $smarty->assign('invoice_comm_type', $invoice_comm_type);
    $smarty->assign('invoice_admin_note', $invoice_admin_note);
    $smarty->assign('invoice_footer', $invoice_footer);
    $smarty->assign('invoice_print', $invoice_print);
    $smarty->assign('invoice_none', $invoice_none);
    $smarty->assign('invoice_aff_id', $invoice_aff_id);
    $smarty->assign('invoice_aff_user', $invoice_aff_user);
    $smarty->assign('edit_standard_taxinfo', $signup_standard_taxinfo);
    $smarty->assign('edit_personal_phone', $signup_personal_phone);
    $smarty->assign('comdetails_date', $comdetails_date);
    $smarty->assign('signup_personal_country', $signup_personal_country);
    $smarty->assign('vat_amount_heading', $vat_amount_heading);
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
    $smarty->assign('invoice_note', $innot);
    if ($incom) {
        $smarty->assign('invoice_our_company', $incom.'<br />');
    } else {
        $smarty->assign('invoice_our_company', '');
    }

    if ($inad1) {
        $smarty->assign('invoice_our_address1', $inad1.'<br />');
    } else {
        $smarty->assign('invoice_our_address1', '');
    }

    if ($inad2) {
        $smarty->assign('invoice_our_address2', $inad2.'<br />');
    } else {
        $smarty->assign('invoice_our_address2', '');
    }

    if ($incit) {
        $smarty->assign('invoice_our_city', $incit.', ');
    } else {
        $smarty->assign('invoice_our_city', '');
    }

    if ($insta) {
        $smarty->assign('invoice_our_state', $insta.' ');
    } else {
        $smarty->assign('invoice_our_state', '');
    }

    if ($inzip) {
        $smarty->assign('invoice_our_zip', $inzip.'<br />');
    } else {
        $smarty->assign('invoice_our_zip', '');
    }

    if ($country_select) {
        $smarty->assign('invoice_our_country', $country_select.'<br />');
    } else {
        $smarty->assign('invoice_our_country', '');
    }

    $alldata = $db->query("select * from idevaff_affiliates where id = '".$_SESSION[$install_directory_name.'_idev_LoggedID']."'");
    $indv_data = $alldata->fetch();
    $payto = $indv_data['payable'];
    if ($payto) {
        $smarty->assign('invoice_affiliate_payto', $payto.'<br />');
    } else {
        $smarty->assign('invoice_affiliate_payto', '');
    }
// add comapny name to invoice start
    $ucname = $indv_data['company'];
    if ($ucname) {
        $smarty->assign('invoice_affiliate_cname', $ucname.' ');
    } else {
        $smarty->assign('invoice_affiliate_cname', '');
    }
// add comapny name to invoice end
    $ufname = $indv_data['f_name'];
    if ($ufname) {
        $smarty->assign('invoice_affiliate_fname', $ufname.' ');
    } else {
        $smarty->assign('invoice_affiliate_fname', '');
    }

    $ulname = $indv_data['l_name'];
    if ($ulname) {
        $smarty->assign('invoice_affiliate_lname', $ulname.'<br />');
    } else {
        $smarty->assign('invoice_affiliate_lname', '');
    }

    $ad1 = $indv_data['address_1'];
    if ($ad1) {
        $smarty->assign('invoice_affiliate_address1', $ad1.'<br />');
    } else {
        $smarty->assign('invoice_affiliate_address1', '');
    }

    $ad2 = $indv_data['address_2'];
    if ($ad2) {
        $smarty->assign('invoice_affiliate_address2', $ad2.'<br />');
    } else {
        $smarty->assign('invoice_affiliate_address2', '');
    }

    $c = $indv_data['city'];
    if ($c) {
        $smarty->assign('invoice_affiliate_city', $c.', ');
    } else {
        $smarty->assign('invoice_affiliate_city', '');
    }

    $s = $indv_data['state'];
    if ($s) {
        $smarty->assign('invoice_affiliate_state', $s.' ');
    } else {
        $smarty->assign('invoice_affiliate_state', '');
    }

    $z = $indv_data['zip'];
    if ($z) {
        $smarty->assign('invoice_affiliate_zip', $z.'<br />');
    } else {
        $smarty->assign('invoice_affiliate_zip', '');
    }

    $coun = $indv_data['country'];
    if ($coun) {
        $smarty->assign('invoice_affiliate_country', $coun);
    } else {
        $smarty->assign('invoice_affiliate_country', '');
    }

    $invid = $indv_data['id'];
    if ($invid) {
        $smarty->assign('invoice_affiliate_id', $invid);
    } else {
        $smarty->assign('invoice_affiliate_id', $invoice_none);
    }

    $uname = $indv_data['username'];
    if ($uname) {
        $smarty->assign('invoice_username', $uname);
    } else {
        $smarty->assign('invoice_username', $invoice_none);
    }

    $phone = $indv_data['phone'];
    if ($phone) {
        $smarty->assign('invoice_phone', $phone);
    } else {
        $smarty->assign('invoice_phone', $invoice_none);
    }

/* TODO: add payout details to invoice, check each value by custom_id column with where statement and check which custom_id is for each payout method and it's details

    $alldata2 = $db->query("select * from idevaff_form_custom_data where affid = '".$_SESSION[$install_directory_name.'_idev_LoggedID']."'");
    $indv_data2 = $alldata2->fetch();

    $payout_data = $indv_data2['custom_value'];
    if ($payout_data) {
        $smarty->assign('invoice_payout_data', $payout_data);
    } else {
        $smarty->assign('invoice_payout_data', $invoice_none);
    }
*/
    $get_tax = $db->query("SELECT AES_DECRYPT(tax_id_ssn, '".AUTH_KEY."') AS decrypted FROM idevaff_affiliates where id = '".$_SESSION[$install_directory_name.'_idev_LoggedID']."'");
    $get_tax = $get_tax->fetch();
    $utax = $get_tax['decrypted'];
    if ($utax) {
        $smarty->assign('invoice_taxinfo', $utax);
    } else {
        $smarty->assign('invoice_taxinfo', $invoice_none);
    }

    $earnings = $db->prepare('select SUM(payment) AS total from idevaff_archive where payment_rec = ?');
    $earnings->execute([$_POST['stamp']]);
    $row = $earnings->fetch();
    $pexact_forvat = $row['total'];
    $pexact = number_format($row['total'], $decimal_symbols);
    $smarty->assign('invoice_amount', $pexact);
    $check_for_vat = $db->prepare("select * from idevaff_vat where country = ? and affiliate_invoice = '1'");
    $check_for_vat->execute([$indv_data['country']]);
    if ($check_for_vat->rowCount()) {
        $get_vals = $check_for_vat->fetch();
        $vat_value = $get_vals['rate'];
        $vat_value_extended = '1'.$vat_value;
        $vat_amount = $pexact_forvat / $vat_value_extended * $vat_value;
        $check_vat_valid = $db->query("SELECT COUNT(*) FROM idevaff_affiliates where id = '".$_SESSION[$install_directory_name.'_idev_LoggedID']."' and vat_override = '1'");
        if (!$check_vat_valid->fetchColumn()) {
            $smarty->assign('vat_amount', number_format($vat_amount, $decimal_symbols));
        }
    }

    $debittotal = $db->prepare('select SUM(amount) AS totaldebs from idevaff_debit_archive where payment_record = ?');
    $debittotal->execute([$_POST['stamp']]);
    $debit_total = $debittotal->fetch();
    $pexacttotaldebs = $debit_total['totaldebs'];
    $pexacttotaldebsd = number_format($pexacttotaldebs, $decimal_symbols);
    $smarty->assign('pexacttotaldebs', $pexacttotaldebsd);
    $rev_amount = $pexact_forvat - $pexacttotaldebs;
    $rev_amount = number_format($rev_amount, $decimal_symbols);
    $smarty->assign('revised_amount', $rev_amount);
    if (0 < $pexacttotaldebs) {
        $temp_fields = 'debit_amount_label,debit_date_label,debit_reason_label,debit_paragraph,debit_invoice_amount,debit_revised_amount';

        try {
            $query = $db->query('select '.$temp_fields.' from `idevaff_language_'.$pack_table_selected.'` LIMIT 1');
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $getlanguage = $query->fetch();
            $query->closeCursor();
        } catch (Exception $ex) {
            echo '<strong>Error:</strong><br>File: '.$ex->getFile().'<br><strong>Line:</strong> '.$ex->getLine().'<br><strong>Message:</strong> '.$ex->getMessage();
            exit();
        }
        $debit_amount_label = html_language_output($getlanguage['debit_amount_label']);
        $debit_date_label = html_language_output($getlanguage['debit_date_label']);
        $debit_reason_label = html_language_output($getlanguage['debit_reason_label']);
        $debit_paragraph = html_language_output($getlanguage['debit_paragraph']);
        $debit_invoice_amount = html_language_output($getlanguage['debit_invoice_amount']);
        $debit_revised_amount = html_language_output($getlanguage['debit_revised_amount']);
        $smarty->assign('revised_numbers', 1);
        $smarty->assign('debit_amount_label', $debit_amount_label);
        $smarty->assign('debit_date_label', $debit_date_label);
        $smarty->assign('debit_reason_label', $debit_reason_label);
        $smarty->assign('debit_invoice_amount', $debit_invoice_amount);
        $smarty->assign('debit_revised_amount', $debit_revised_amount);
        $get_debits = $db->prepare('select * from idevaff_debit_archive where payment_record = ?');
        $get_debits->execute([$_POST['stamp']]);
        if ($get_debits->rowCount()) {
            $debit_results = [];
            $i = 0;
            while ($qry_debit = $get_debits->fetch()) {
                $indidate_debit = date($dateformat, $qry_debit['code']);
                $indiamt_debit = $qry_debit['amount'];
                $indiamtd_debit = number_format($indiamt_debit, $decimal_symbols);
                $debitreason = ${'debit_reason_'.$qry_debit['reason']};
                $tmp_debit = ['debit_date_table' => $indidate_debit, 'debit_amount_table' => $indiamtd_debit, 'debit_reason_table' => $debitreason];
                $debit_results[$i++] = $tmp_debit;
            }
        }

        $smarty->assign('debit_results', $debit_results);
    }

    $earnings = $db->prepare('select code, amount from idevaff_payments where record = ?');
    $earnings->execute([$_POST['stamp']]);
    $row = $earnings->fetch();
    $pdate = date($dateformat, $row['code']);
    $pexact = $row['amount'];
    $smarty->assign('invoice_date', $pdate);
    $get_payments = $db->prepare('select * from idevaff_archive where payment_rec = ? order by code asc');
    $get_payments->execute([$_POST['stamp']]);
    if ($get_payments->rowCount()) {
        $payment_results = [];
        $i = 0;
        while ($qry = $get_payments->fetch()) {
            $indidate = date($dateformat, $qry['code']);
            $indiamt = $qry['payment'];
            $sale_amount = $qry['amount'];
            $indiamtd = number_format($indiamt, $decimal_symbols);
            $stat1 = $qry['top_tier_tag'];
            $stat2 = $qry['bonus'];
            if (1 === $stat1) {
                $put = $comdetails_type_3;
                $indigeo = $invoice_none;
            } elseif ($indiamt < 0) { 
                    $put = $comdetails_type_1;
                    $indigeo = $qry['geo'];
            } else {
                if (1 === $stat2) {
                    $put = $comdetails_type_1;
                    $indigeo = $qry['geo'];
                } else {
                    $put = $comdetails_type_4;
                    $indigeo = $qry['geo'];
                }
            }
            $tmp = ['payment_individual_date' => $indidate, 'payment_individual_type' => $put, 'geo_location' => $indigeo, 'payment_individual_amount' => $indiamtd];
            $payment_results[$i++] = $tmp;
        }
    }

    $smarty->assign('invoice_number', $_POST['stamp']);
    $smarty->assign('payment_results', $payment_results);
    $smarty->display('invoice.tpl');
}

?>