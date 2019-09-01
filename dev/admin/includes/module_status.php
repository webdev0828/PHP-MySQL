<?PHP
if (!defined('admin_includes')) { die(); }

$mod_qr = null;
$mod_private = null;
$mod_fn = null;
$mod_seo = null;
$mod_lp = null;
$mod_van = null;
$mod_fb = null;
$mod_sm = null;
$mod_geo = null;
$mod_ssc = null;

if (file_exists('../plugin_keys/qr_license_key.php')) { $mod_qr = true; }
if (file_exists('../plugin_keys/private_license_key.php')) { $mod_private = true; }
if (file_exists('../plugin_keys/filename_license_key.php')) { $mod_fn = true; }
if (file_exists('../plugin_keys/seo_license_key.php')) { $mod_seo = true; }
if (file_exists('../plugin_keys/vanity_codes_key.php')) { $mod_van = true; }
if (file_exists('../plugin_keys/facebook_license_key.php')) { $mod_fb = true; }
if (file_exists('../plugin_keys/social_media_license_key.php')) { $mod_sm = true; }
if (file_exists('../plugin_keys/geo_targeting_key.php')) { $mod_geo = true; }
if (file_exists('../plugin_keys/sliding_scale_key.php')) { $mod_ssc = true; }

$get_packs = $db->query("select COUNT(*) from idevaff_language_packs where user_created = '0' and name != 'english'");
if ($get_packs->fetchColumn() > 1) { $mod_lp = true; }
	
?>