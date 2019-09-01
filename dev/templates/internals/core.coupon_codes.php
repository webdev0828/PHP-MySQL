<?PHP


// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

if (isset($coupons_exist) && $data_get == 44) {
    $temp_fields = 'coupon_title,coupon_desc,coupon_head_1,coupon_head_2,coupon_head_3,coupon_sale_amt,coupon_flat_rate,
    coupon_default,cc_vanity_title,cc_vanity_field,cc_vanity_button,cc_vanity_error_missing,cc_vanity_error_exists,
    cc_vanity_error,cc_vanity_success';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $coupon_title=html_language_output($getlanguage['coupon_title']);
    $coupon_desc=html_language_output($getlanguage['coupon_desc']);
    $coupon_head_1=html_language_output($getlanguage['coupon_head_1']);
    $coupon_head_2=html_language_output($getlanguage['coupon_head_2']);
    $coupon_head_3=html_language_output($getlanguage['coupon_head_3']);

    $coupon_sale_amt=html_language_output($getlanguage['coupon_sale_amt']);
    $coupon_flat_rate=html_language_output($getlanguage['coupon_flat_rate']);
    $coupon_default=html_language_output($getlanguage['coupon_default']);

    $cc_vanity_title=html_language_output($getlanguage['cc_vanity_title']);
    $cc_vanity_field=html_language_output($getlanguage['cc_vanity_field']);
    $cc_vanity_button=html_language_output($getlanguage['cc_vanity_button']);

    $cc_vanity_error_missing=html_language_output($getlanguage['cc_vanity_error_missing']);
    $cc_vanity_error_exists=html_language_output($getlanguage['cc_vanity_error_exists']);
    $cc_vanity_error=html_language_output($getlanguage['cc_vanity_error']);
    $cc_vanity_success=html_language_output($getlanguage['cc_vanity_success']);



$smarty->assign('cc_vanity_title', $cc_vanity_title);
$smarty->assign('cc_vanity_field', $cc_vanity_field);
$smarty->assign('cc_vanity_button', $cc_vanity_button);
$smarty->assign('coupon_title', $coupon_title);
$smarty->assign('coupon_desc', $coupon_desc);
$smarty->assign('coupon_head_1', $coupon_head_1);
$smarty->assign('coupon_head_2', $coupon_head_2);
$smarty->assign('coupon_head_3', $coupon_head_3);


if ($vanity_codes == '1') {
if (file_exists('plugin_keys/vanity_codes_key.php')) {
include ("plugin_keys/vanity_codes_key.php");
if ($vanity_key == '81573') {
$smarty->assign('vanity_codes', 1);
} } }

$get_codes = $db->prepare("select coupon_code, coupon_type, coupon_amount, discount_amount from idevaff_coupons where coupon_affiliate = ? ORDER BY coupon_code DESC");
$get_codes->execute(array($linkid));
if ($get_codes->rowCount()) {
$smarty->assign('coupon_query_exists', 1);
$coupon_something = array(); 
$i=0; 
while ($r=$get_codes->fetch()) {
$coupon_code=$r['coupon_code'];
$coupon_amount=$r['coupon_amount'];
$discount_amount=$r['discount_amount'];
$coupon_type=$r['coupon_type'];

$commission_display = null;
if ($coupon_type == '1') { $commission_display = $coupon_amount . "% " . $coupon_sale_amt . "."; }
if ($coupon_type == '2') {
$display_payment = number_format($coupon_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $display_payment; }
if($cur_sym_location == 2) { $pdis = $display_payment . " " . $cur_sym; }
$commission_display = $pdis . " " . $currency;
$commission_display = $commission_display . " " . $coupon_flat_rate . "."; }
if ($coupon_type == '3') { $commission_display = $coupon_default; }

            $tmp = array( 
                'coupon_code' => $coupon_code, 
                'coupon_amount' => $commission_display, 
                'discount_amount' => $discount_amount  
            );
            $coupon_results[$i++] = $tmp; }
$smarty->assign('coupon_results', $coupon_results);
}
} else {
    $temp_fields = 'coupon_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }
    $coupon_none=html_language_output($getlanguage['coupon_none']);
    $smarty->assign('coupon_none', $coupon_none);
}

?>