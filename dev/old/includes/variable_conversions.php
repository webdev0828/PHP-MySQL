<?PHP

if (!defined('IDEV_FILE_AUTH')) { die('variable_conversions.php - Unauthorized Access'); }

// PROFILE ID
$profile = check_type('profile');

// OPTIONAL VARIABLES
$ov1 = check_type('idev_option_1');
$ov2 = check_type('idev_option_2');
$ov3 = check_type('idev_option_3');

// SALE AMOUNT VARIABLES
$avar = check_type('idev_saleamt');
if (!$avar) { $avar = check_type('idev_osc_1'); }
if (!$avar) { $avar = check_type('idev_paypal_1'); }
if (!$avar) { $avar = check_type('idev_sunshop_1'); }
if (!$avar) { $avar = check_type('idev_mamboshop_1'); }
if (!$avar) { $avar = check_type('idev_2co_1'); }
if (!$avar) { $avar = check_type('idev_mb_1'); }
if (!$avar) { $avar = check_type('idev_hsphere_1'); }
if (!$avar) { $avar = check_type('idev_ccp_1'); }
if (!$avar) { $avar = check_type('idev_yahoo_1'); }
if (!$avar) { $avar = check_type('idev_psystems_1'); }
if (!$avar) { $avar = check_type('idev_psigate_1'); }
if (!$avar) { $avar = check_type('idev_amember_1'); }
if (!$avar) { $avar = check_type('idev_zen_1'); }
if (!$avar) { $avar = check_type('idev_pinn_1'); }
if (!$avar) { $avar = check_type('idev_shopsite_1'); }
if (!$avar) { $avar = check_type('idev_xcart_1'); }
if (!$avar) { $avar = check_type('idev_geoce_1'); }
if (!$avar) { $avar = check_type('idev_geoae_1'); }
if (!$avar) { $avar = check_type('idev_awbs_1'); }
if (!$avar) { $avar = check_type('idev_sns_1'); }
if (!$avar) { $avar = check_type('idev_et_1'); }
if (!$avar) { $avar = check_type('idev_cube_1'); }
if (!$avar) { $avar = check_type('idev_digi_1'); }
if (!$avar) { $avar = check_type('idev_cartman_1'); }
if (!$avar) { $avar = check_type('idev_linklok_1'); }
if (!$avar) { $avar = check_type('idev_phpaudit_1'); }
if (!$avar) { $avar = check_type('idev_autopilot_1'); }
if (!$avar) { $avar = check_type('idev_mambocharge_1'); }
if (!$avar) { $avar = check_type('initialPrice'); }

// ORDER NUMBER VARIABLES
$idev_ordernum = check_type('idev_ordernum');
if (!$idev_ordernum) { $idev_ordernum = check_type('reference'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_osc_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_paypal_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_sunshop_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_mamboshop_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_2co_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_mb_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_hsphere_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_ccp_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_yahoo_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_psystems_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_psigate_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_amember_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_zen_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_pinn_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_shopsite_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_xcart_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_geoce_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_geoae_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_awbs_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_sns_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_et_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_cube_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_digi_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_cartman_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_linklok_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_phpaudit_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_autopilot_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('idev_mambocharge_2'); }
if (!$idev_ordernum) { $idev_ordernum = check_type('subscription_id'); }

// MODERNBILL OPTIONALS
if (isset($idev_name)) { $profile = 6; $ov1 = $idev_name; }
if (isset($idev_domain_name)) { $profile = 6; $ov2 = $idev_domain_name; }
if (isset($idev_productid)) { $profile = 6; $ov3 = $idev_productid; }

// -----------------------------------------------------------
// IF SAMCART IS USED
	if ($profile == '104') {
// -----------------------------------------------------------
	$Data = json_decode(file_get_contents('php://input'));
	
	$result['product'] = array(
		'id'  => $Data->{'product'}->{'id'}, 
		'name' => $Data->{'product'}->{'name'},
		'price'  => $Data->{'product'}->{'price'}
	);
	$result['customer'] = array(
		'first_name' => $Data->{'customer'}->{'first_name'},
		'last_name' => $Data->{'customer'}->{'last_name'},
		'email' => $Data->{'customer'}->{'email'},
		'phone_number' => $Data->{'customer'}->{'phone_number'},
		'billing_address' => $Data->{'customer'}->{'billing_address'},
		'billing_city' => $Data->{'customer'}->{'billing_city'},
		'billing_state' => $Data->{'customer'}->{'billing_state'},
		'billing_zip' => $Data->{'customer'}->{'billing_zip'},
		'billing_country' => $Data->{'customer'}->{'billing_country'}
	);
	$result['order'] = array(
		'id' => $Data->{'order'}->{'id'},
		'total' => $Data->{'order'}->{'total'},
		'shipping_address' => $Data->{'order'}->{'shipping_address'},
		'shipping_city' => $Data->{'order'}->{'shipping_city'}, 
		'shipping_state' => $Data->{'order'}->{'shipping_state'},
		'shipping_zip' => $Data->{'order'}->{'shipping_zip'},
		'shipping_country' => $Data->{'order'}->{'shipping_country'},
		'ip_address' => $Data->{'order'}->{'ip_address'},
		'stripe_id' => $Data->{'order'}->{'stripe_id'}
	);
	
	$ip_addr = $result['order']['ip_address'];
	$avar = $result['order']['total'];
	$idev_ordernum = $result['order']['id'];
	$ov1 = $result['customer']['first_name'] . " " . $result['customer']['last_name'];
	$ov2 = $result['customer']['email'];
	$ov3 = $result['product']['id'];
	
	}
	
// STRIP CHARACTERS
$avar = str_replace("$", "", $avar);
$avar = str_replace(",", "", $avar);

$avar = (double)$avar;


?>