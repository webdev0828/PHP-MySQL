<?PHP

$tabnum = 0;  

$db->query("CREATE TABLE IF NOT EXISTS idevaff_admin (
  record tinyint UNSIGNED NOT NULL auto_increment,
  adminid varchar(512) character set utf8 NULL DEFAULT NULL,
  adminpass varchar(512) character set utf8 NULL DEFAULT NULL,
  super tinyint UNSIGNED NOT NULL default '0',
  email varchar(255) character set utf8 NULL DEFAULT NULL,
  code bigint UNSIGNED NOT NULL default '0',
  user_key varchar(255) character set utf8 NULL DEFAULT NULL,
  api_key varchar(64) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_admin_lockout (
  id int UNSIGNED NOT NULL auto_increment,
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  attempts tinyint UNSIGNED NOT NULL DEFAULT '0',
  code bigint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_ads (
  id int UNSIGNED NOT NULL auto_increment,
  grp int UNSIGNED NOT NULL default '0',
  title varchar(64) character set utf8 NULL DEFAULT NULL,
  text text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_ads_default (
  ad_target varchar(10) character set utf8 NULL DEFAULT NULL,
  BoxWidth varchar(10) character set utf8 NULL DEFAULT NULL,
  OutlineColor varchar(10) character set utf8 NULL DEFAULT NULL,
  TitleTextColor varchar(10) character set utf8 NULL DEFAULT NULL,
  TitleTextBackgroundColor varchar(10) character set utf8 NULL DEFAULT NULL,
  LinkColor varchar(10) character set utf8 NULL DEFAULT NULL,
  TextColor varchar(10) character set utf8 NULL DEFAULT NULL,
  TextBackgroundColor varchar(10) character set utf8 NULL DEFAULT NULL,
  title varchar(64) character set utf8 NULL DEFAULT NULL,
  content text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_affiliates (
  id int UNSIGNED NOT NULL auto_increment,
  fb_user_id varchar(255) character set utf8 NULL DEFAULT NULL,
  username varchar(512) character set utf8 NULL DEFAULT NULL,
  password varchar(512) character set utf8 NULL DEFAULT NULL,
  approved tinyint UNSIGNED NOT NULL default '0',
  suspended tinyint UNSIGNED NOT NULL default '0',
  payable varchar(64) character set utf8 NULL DEFAULT NULL,
  tax_id_ssn blob NULL,
  company varchar(128) character set utf8 NULL DEFAULT NULL,
  f_name varchar(64) character set utf8 NULL DEFAULT NULL,
  l_name varchar(64) character set utf8 NULL DEFAULT NULL,
  email varchar(64) character set utf8 NULL DEFAULT NULL,
  address_1 varchar(64) character set utf8 NULL DEFAULT NULL,
  address_2 varchar(64) character set utf8 NULL DEFAULT NULL,
  city varchar(64) character set utf8 NULL DEFAULT NULL,
  state varchar(40) character set utf8 NULL DEFAULT NULL,
  zip varchar(20) character set utf8 NULL DEFAULT NULL,
  country varchar(64) character set utf8 NULL DEFAULT NULL,
  phone varchar(40) character set utf8 NULL DEFAULT NULL,
  fax varchar(40) character set utf8 NULL DEFAULT NULL,
  url varchar(128) character set utf8 NULL DEFAULT NULL,
  pp tinyint UNSIGNED NOT NULL default '0',
  paypal varchar(64) character set utf8 NULL DEFAULT NULL,
  hits_in int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  type tinyint UNSIGNED NOT NULL default '0',
  level tinyint UNSIGNED NOT NULL default '0',
  a1 tinyint UNSIGNED NOT NULL default '1',
  a2 tinyint UNSIGNED NOT NULL default '1',
  a3 tinyint UNSIGNED NOT NULL default '1',
  alert tinyint UNSIGNED NOT NULL default '0',
  installed tinyint UNSIGNED NOT NULL default '0',
  signup_date bigint UNSIGNED NOT NULL default '0',
  email_override varchar(64) character set utf8 NULL DEFAULT NULL,
  tc_status tinyint UNSIGNED NOT NULL default '0',
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  picture varchar(255) character set utf8 NULL DEFAULT NULL,
  stripe_user_data mediumtext NULL,
  pay_method tinyint UNSIGNED NOT NULL default '0',
  user_key varchar(255) character set utf8 NULL DEFAULT NULL,
  vat_override tinyint UNSIGNED NOT NULL default '0',
  expire int UNSIGNED NOT NULL default '0',
  expire_type tinyint UNSIGNED NOT NULL default '0',
  expire_stamp bigint UNSIGNED NOT NULL default '0',
  indi_incoming varchar(512) character set utf8 NULL DEFAULT NULL,
  last_logged int UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_announcements (
  number int UNSIGNED NOT NULL AUTO_INCREMENT,
  grp int UNSIGNED NOT NULL default '0',
  announcement_name varchar(255) character set utf8 NULL DEFAULT NULL,
  facebook_message text NULL,
  twitter_message varchar(140) character set utf8 NULL DEFAULT NULL,
  facebook_picture varchar(255) character set utf8 NULL DEFAULT NULL,
  sort int NOT NULL default '0',
  local tinyint UNSIGNED NOT NULL default '0',
  pinterest_message varchar(255) character set utf8 NULL DEFAULT NULL,
  pinterest_picture varchar(255) character set utf8 NULL DEFAULT NULL,
  pinterest_local int UNSIGNED NOT NULL default '0',
  PRIMARY KEY (number)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_archive (
  record int UNSIGNED NOT NULL auto_increment,
  id int UNSIGNED NOT NULL default '0',
  payment decimal(10,2) NOT NULL default '0.00',
  tier int UNSIGNED NOT NULL default '0',
  top_tier_tag tinyint UNSIGNED NOT NULL default '0',
  bonus tinyint UNSIGNED NOT NULL default '0',
  stamp bigint UNSIGNED NOT NULL default '0',
  tier_id int UNSIGNED NOT NULL default '0',
  tracking varchar(64) character set utf8 NULL DEFAULT NULL,
  op1 varchar(64) character set utf8 NULL DEFAULT NULL,
  op2 varchar(64) character set utf8 NULL DEFAULT NULL,
  op3 varchar(64) character set utf8 NULL DEFAULT NULL,
  amount decimal(10,2) NOT NULL default '0.00',
  type tinyint UNSIGNED NOT NULL default '0',
  split varchar(128) character set utf8 NULL DEFAULT NULL,
  profile int UNSIGNED NOT NULL default '0',
  tid1 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid2 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid3 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid4 varchar(255) character set utf8 NULL DEFAULT NULL,
  target_url varchar(255) character set utf8 NULL DEFAULT NULL,
  sub_id varchar(64) character set utf8 NULL DEFAULT NULL,
  payment_rec varchar(255) character set utf8 NULL DEFAULT NULL,
  referring_url varchar(255) character set utf8 NULL DEFAULT NULL,
  currency varchar(3) character set utf8 NULL DEFAULT NULL,
  converted_amount decimal(20,2) NOT NULL default '0.00',
  override tinyint UNSIGNED NOT NULL default '0',
  override_id int UNSIGNED NOT NULL default '0',
  code bigint UNSIGNED NOT NULL default '0',
  geo varchar(2) character set utf8 NULL DEFAULT NULL,
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  tracking_method varchar(255) character set utf8 NULL DEFAULT NULL,
  notes mediumtext NULL,
  KEY record (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_banned_email (
  id int UNSIGNED NOT NULL auto_increment,
  email_address varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_banned_ip (
  id int UNSIGNED NOT NULL auto_increment,
  ip_address varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_banners (
  number int UNSIGNED NOT NULL auto_increment,
  grp int UNSIGNED NOT NULL default '0',
  size1 int UNSIGNED NOT NULL default '0',
  size2 int UNSIGNED NOT NULL default '0',
  image varchar(255) character set utf8 NULL DEFAULT NULL,
  description text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  alt_tag varchar(255) character set utf8 NULL DEFAULT NULL,
  sort int NOT NULL default '0',
  local tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (number)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_canspam (
  display tinyint UNSIGNED NOT NULL default '0',
  forced tinyint UNSIGNED NOT NULL default '0',
  canspam text NULL,
  KEY display (display)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_carts (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(128) character set utf8 NULL DEFAULT NULL,
  cat int UNSIGNED NOT NULL default '0',
  module_location varchar(64) character set utf8 NULL DEFAULT NULL,
  protection_eligible tinyint UNSIGNED NOT NULL default '0',
  coupon_code_eligible tinyint UNSIGNED NOT NULL default '0',
  per_product_eligible tinyint UNSIGNED NOT NULL default '0',
  profile_protection_eligible tinyint UNSIGNED NOT NULL default '0',
  recurring_supported tinyint UNSIGNED NOT NULL default '0',
  alternate_commission tinyint UNSIGNED NOT NULL default '0',
  version decimal(5,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_carts_data (
table_id int UNSIGNED NOT NULL DEFAULT '1',
KEY display (table_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_commission_override (
  t_id int UNSIGNED NOT NULL auto_increment,
  id int UNSIGNED NOT NULL default '0',
  slave int UNSIGNED NOT NULL default '0',
  commission_amount decimal(10,2) NOT NULL default '0.00',
  commission_type tinyint UNSIGNED NOT NULL default '0',
  tag tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (t_id),
  UNIQUE KEY id (id,slave)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_config (
  sitename varchar(128) character set utf8 NULL DEFAULT NULL,
  siteurl varchar(255) character set utf8 NULL DEFAULT NULL,
  base_url varchar(255) character set utf8 NULL DEFAULT NULL,
  default_destination varchar(255) character set utf8 NULL DEFAULT NULL,
  cookie_url varchar(128) character set utf8 NULL DEFAULT NULL,
  main_logo varchar(255) character set utf8 NULL DEFAULT NULL,
  account_approval tinyint UNSIGNED NOT NULL default '0',
  sale_approval_1 tinyint UNSIGNED NOT NULL default '0',
  sale_approval_2 tinyint UNSIGNED NOT NULL default '0',
  sale_approval_3 tinyint UNSIGNED NOT NULL default '0',
  welcome_email tinyint UNSIGNED NOT NULL default '0',
  balance decimal(10,2) NOT NULL default '0.00',
  startnumber int UNSIGNED NOT NULL default '0',
  initialbalance decimal(10,2) NOT NULL default '0.00',
  paytype tinyint UNSIGNED NOT NULL default '0',
  ap_1 tinyint UNSIGNED NOT NULL default '0',
  ap_2 tinyint UNSIGNED NOT NULL default '0',
  ap_3 tinyint UNSIGNED NOT NULL default '0',
  def_pay tinyint UNSIGNED NOT NULL default '0',
  mailadmin tinyint UNSIGNED NOT NULL default '0',
  currency varchar(10) character set utf8 NULL DEFAULT NULL,
  cur_sym varchar(10) character set utf8 NULL DEFAULT NULL,
  notify tinyint UNSIGNED NOT NULL default '0',
  paypal tinyint UNSIGNED NOT NULL default '0',
  stripe_api_secret blob NULL,
  stripe_client_id blob NULL,  
  browse tinyint UNSIGNED NOT NULL default '0',
  sale_notify tinyint UNSIGNED NOT NULL default '0',
  sale_notify_ppc tinyint UNSIGNED NOT NULL default '0',
  sale_notify_affiliate tinyint UNSIGNED NOT NULL default '0',
  sale_notify_affiliate_ppc tinyint UNSIGNED NOT NULL default '0',
  payday varchar(5) character set utf8 NULL DEFAULT NULL,
  delay_minutes int UNSIGNED NOT NULL default '0',
  max_size int UNSIGNED NOT NULL default '0',
  aff_lock tinyint UNSIGNED NOT NULL default '0',
  expire int UNSIGNED NOT NULL default '0',
  expire_type tinyint UNSIGNED NOT NULL default '0',
  expire_stamp bigint UNSIGNED NOT NULL default '0',
  sessions tinyint UNSIGNED NOT NULL default '0',
  offline tinyint UNSIGNED NOT NULL default '0',
  offline_loc varchar(128) character set utf8 NULL DEFAULT NULL,
  offline_send varchar(128) character set utf8 NULL DEFAULT NULL,
  offline_tag varchar(64) character set utf8 NULL DEFAULT NULL,
  rew_notify tinyint UNSIGNED NOT NULL default '0',
  rew_admin_notify tinyint UNSIGNED NOT NULL default '0',
  links tinyint UNSIGNED NOT NULL default '0',
  mod_later tinyint UNSIGNED NOT NULL default '0',
  faq tinyint UNSIGNED NOT NULL default '0',
  idev_affiliate varchar(10) character set utf8 NULL DEFAULT NULL,
  link_style tinyint UNSIGNED NOT NULL default '0',
  mark_track tinyint UNSIGNED NOT NULL default '0',
  version varchar(20) character set utf8 NULL DEFAULT NULL,
  license varchar(64) character set utf8 NULL DEFAULT NULL,
  license_method enum('phpaudit_exec_socket','phpaudit_exec_curl','file_get_contents') character set utf8 NOT NULL default 'phpaudit_exec_socket',
  license_local_key blob NOT NULL,
  show_idev tinyint UNSIGNED NOT NULL default '0',
  com_show tinyint UNSIGNED NOT NULL default '0',
  com_show_add tinyint UNSIGNED NOT NULL default '0',
  panel_width int UNSIGNED NOT NULL default '0',
  page_style char(1) character set utf8 NULL DEFAULT NULL,
  panel_align varchar(6) character set utf8 NULL DEFAULT NULL,
  tlinks tinyint UNSIGNED NOT NULL default '0',
  use_keywords tinyint UNSIGNED NOT NULL default '0',
  pend_show tinyint UNSIGNED NOT NULL default '0',
  filename varchar(128) character set utf8 NULL DEFAULT NULL,
  lead_approval tinyint UNSIGNED NOT NULL default '0',
  secret int UNSIGNED NOT NULL default '0',
  second_contact tinyint UNSIGNED NOT NULL default '0',
  pass_var varchar(32) character set utf8 NULL DEFAULT NULL,
  use_security tinyint UNSIGNED NOT NULL default '0',
  ip_setting varchar(64) character set utf8 NULL DEFAULT NULL,
  admin_notify_logo tinyint UNSIGNED NOT NULL default '0',
  affiliate_notify_logo tinyint UNSIGNED NOT NULL default '0',
  sub_enable tinyint UNSIGNED NOT NULL default '0',
  affiliate_notify_unapproved tinyint UNSIGNED NOT NULL default '0',
  bk_image varchar(255) character set utf8 NULL DEFAULT NULL,
  lightbox_link_text text NULL,
  account_notify_affiliate_approved tinyint UNSIGNED NOT NULL default '0',
  fraud_type tinyint UNSIGNED NOT NULL default '0',
  allow_alternate tinyint UNSIGNED NOT NULL default '0',
  duplicate_notify tinyint UNSIGNED NOT NULL default '0',
  faq_location tinyint UNSIGNED NOT NULL default '0',
  maint_mode tinyint UNSIGNED NOT NULL default '0',
  marketing_delivery tinyint UNSIGNED NOT NULL default '0',
  commission_blocking tinyint UNSIGNED NOT NULL default '0',
  cur_sym_location tinyint UNSIGNED NOT NULL default '0',
  decimal_symbols tinyint UNSIGNED NOT NULL default '0',
  char_set varchar(24) character set utf8 NULL DEFAULT NULL,
  emails_allowed int UNSIGNED NOT NULL default '0',
  auto_add_ban tinyint UNSIGNED NOT NULL default '0',
  auto_add_suspension tinyint UNSIGNED NOT NULL default '0',
  user_min int UNSIGNED NOT NULL default '0',
  pass_min int UNSIGNED NOT NULL default '0',
  bonus_commission tinyint UNSIGNED NOT NULL default '0',
  tier_numbers tinyint UNSIGNED NOT NULL default '0',
  staff varchar(64) character set utf8 NULL DEFAULT NULL,
  redirect_method int UNSIGNED NOT NULL default '0',
  standard_link_structure tinyint UNSIGNED NOT NULL default '0',
  seo_link_structure tinyint UNSIGNED NOT NULL default '0',
  non_commissioned tinyint UNSIGNED NOT NULL default '0',
  seo_url varchar(255) character set utf8 NULL DEFAULT NULL,
  seo_link_extension tinyint UNSIGNED NOT NULL default '0',
  use_cookies tinyint UNSIGNED NOT NULL default '0',
  network tinyint UNSIGNED NOT NULL default '0',
  signup_api tinyint UNSIGNED NOT NULL default '0',
  coupon_priority tinyint UNSIGNED NOT NULL default '0',
  qsg tinyint UNSIGNED NOT NULL default '0',
  testimonials tinyint UNSIGNED NOT NULL default '0',
  testimonials_link tinyint UNSIGNED NOT NULL default '0',
  testimonials_security tinyint UNSIGNED NOT NULL default '0',
  admin_notify_testimonial tinyint UNSIGNED NOT NULL default '0',
  affiliate_approved_testimonial tinyint UNSIGNED NOT NULL default '0',
  link_type varchar(20) character set utf8 NULL DEFAULT NULL,
  main_chart int UNSIGNED NOT NULL default '0',
  main_chart_display tinyint UNSIGNED NOT NULL default '0',
  archive_comm tinyint UNSIGNED NOT NULL default '0',
  max_comm_amt decimal(20,2) NOT NULL default '0.00',
  max_comm_email tinyint UNSIGNED NOT NULL default '0',
  max_comm_use tinyint UNSIGNED NOT NULL default '0',
  private tinyint UNSIGNED NOT NULL default '0',
  email_tier_referral tinyint UNSIGNED NOT NULL default '0',
  theme varchar(255) character set utf8 NULL DEFAULT NULL,
  qr_codes tinyint UNSIGNED NOT NULL default '0',
  install_date bigint UNSIGNED NOT NULL default '0',
  logo_uploaded tinyint UNSIGNED NOT NULL default '0',
  qsg_box tinyint UNSIGNED NOT NULL default '0',
  message_check varchar(30) character set utf8 NULL DEFAULT NULL,
  pic_upload tinyint UNSIGNED NOT NULL default '0',
  vanity_codes tinyint UNSIGNED NOT NULL default '0',
  vanity_notify tinyint UNSIGNED NOT NULL default '0',
  aff_lib tinyint UNSIGNED NOT NULL default '0',
  toggle_bonus_display tinyint UNSIGNED NOT NULL default '0',
  suspended_location varchar(255) character set utf8 NULL DEFAULT NULL,
  login_count int UNSIGNED NOT NULL default '0',
  admin_theme tinyint UNSIGNED NOT NULL default '0',
  timezone varchar(100) character set utf8 NULL DEFAULT NULL,
  contact_form tinyint UNSIGNED NOT NULL default '0',
  contact_link tinyint UNSIGNED NOT NULL default '0',
  admin_notify_api_recurring tinyint UNSIGNED NOT NULL DEFAULT '0',
  admin_notify_api_delayed tinyint UNSIGNED NOT NULL DEFAULT '0',
  sale_generated_notify_affiliate tinyint UNSIGNED NOT NULL default '0',
  affiliate_notify_declined tinyint UNSIGNED NOT NULL default '0',
  seal tinyint UNSIGNED NOT NULL default '0',
  email_links_active tinyint UNSIGNED NOT NULL default '0',
  deb_show tinyint UNSIGNED NOT NULL default '0',
  protection_profile tinyint UNSIGNED NOT NULL default '0',
  protection_secret_key tinyint UNSIGNED NOT NULL default '0',
  tier_link_url varchar(255) character set utf8 NULL DEFAULT NULL,
  upgrade_notify tinyint UNSIGNED NOT NULL default '0',
  webhook_url varchar(512) character set utf8 NULL DEFAULT NULL,
  background_image varchar(255) character set utf8 NULL DEFAULT NULL,
  background_image_uploaded tinyint UNSIGNED NOT NULL default '0',
  chars_allowed varchar(24) character set utf8 NULL DEFAULT NULL,
  pass_geo tinyint UNSIGNED NOT NULL default '0',
  show_map tinyint UNSIGNED NOT NULL default '0',
  force_ssl tinyint UNSIGNED NOT NULL default '0',
  recruitment_bonus decimal(20,2) NOT NULL default '0',
  sliding tinyint UNSIGNED NOT NULL default '0',
  idev_date_format tinyint UNSIGNED NOT NULL default '0', 
  time_seconds tinyint UNSIGNED NOT NULL default '0',
  idev_time_format tinyint UNSIGNED NOT NULL default '0',
  gdpr_hide_ip tinyint UNSIGNED NOT NULL default '0',
  UNIQUE KEY sitename (sitename)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_countries (
  id int UNSIGNED NOT NULL auto_increment,
  country_code text NULL,
  country_name text NULL,
  def tinyint UNSIGNED NOT NULL default '0',
  status int UNSIGNED NOT NULL default '1',
  PRIMARY KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_coupons (
  id int UNSIGNED NOT NULL auto_increment,
  coupon_code varchar(128) character set utf8 NULL DEFAULT NULL,
  coupon_affiliate int UNSIGNED NOT NULL default '0',
  coupon_amount decimal(20,2) NOT NULL default '0.00',
  coupon_type tinyint UNSIGNED NOT NULL default '0',
  discount_amount text NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_coupons_pending (
  id int UNSIGNED NOT NULL auto_increment,
  affiliate int UNSIGNED NOT NULL default '0',
  coupon_code varchar(255) character set utf8 NULL DEFAULT NULL,
  stamp bigint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_cp_settings (
  cp_theme varchar(255) character set utf8 NULL DEFAULT NULL,
  background varchar(10) character set utf8 NULL DEFAULT NULL,
  header_background varchar(10) character set utf8 NULL DEFAULT NULL,
  heading_text varchar(10) character set utf8 NULL DEFAULT NULL,
  top_menu_background varchar(10) character set utf8 NULL DEFAULT NULL,
  heading_back varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_1 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_2 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_3 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_4 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_5 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_6 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_1 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_2 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_3 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_4 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_5 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_6 varchar(10) character set utf8 NULL DEFAULT NULL,
  box_tt_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_tt_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_ce_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_ce_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_te_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_te_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_uv_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_uv_text varchar(10) character set utf8 NULL DEFAULT NULL,
  bar_comms_last_6 tinyint UNSIGNED NOT NULL default '0',
  pie_top_5_month tinyint UNSIGNED NOT NULL default '0',
  cp_page_width tinyint UNSIGNED NOT NULL default '0',
  cp_menu_location tinyint UNSIGNED NOT NULL default '0',
  cp_fixed_navbar tinyint UNSIGNED NOT NULL default '0',
  cp_fixed_left_menu tinyint UNSIGNED NOT NULL default '0',
  top_menu_text varchar(10) character set utf8 NULL DEFAULT NULL,
  cp_main_menu_color varchar(10) character set utf8 NULL DEFAULT NULL,
  cp_main_menu_text varchar(10) character set utf8 NULL DEFAULT NULL,
  logo_footer tinyint UNSIGNED NOT NULL default '0',
  details_show tinyint UNSIGNED NOT NULL default '0',
  details_show_type tinyint UNSIGNED NOT NULL default '0',
  details_show_signup tinyint UNSIGNED NOT NULL default '0',
  details_show_requirements tinyint UNSIGNED NOT NULL default '0',
  details_show_duration tinyint UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_currency (
  id int UNSIGNED NOT NULL auto_increment,
  currency_code varchar(6) character set utf8 NULL DEFAULT NULL,
  currency_symbol varchar(10) character set utf8 NULL DEFAULT NULL,
  currency_rate decimal(10,8) NOT NULL default '0.00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_custom_links (
  id int UNSIGNED NOT NULL auto_increment,
  aff_id int UNSIGNED NOT NULL default '0',
  url varchar(255) character set utf8 NULL DEFAULT NULL,
  display tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_custom_vars (
  custom_var_1 varchar(255) character set utf8 NULL DEFAULT NULL,
  custom_var_2 varchar(255) character set utf8 NULL DEFAULT NULL,
  custom_var_3 varchar(255) character set utf8 NULL DEFAULT NULL,
  custom_var_4 varchar(255) character set utf8 NULL DEFAULT NULL,
  custom_var_5 varchar(255) character set utf8 NULL DEFAULT NULL,
  google_utm_source_value varchar(255) character set utf8 NULL DEFAULT NULL,
  google_utm_medium_value varchar(255) character set utf8 NULL DEFAULT NULL,
  google_utm_campaign_value varchar(255) character set utf8 NULL DEFAULT NULL,
  geo varchar(255) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_debit (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  aff_id int UNSIGNED NOT NULL default '0',
  amount decimal(20,2) NOT NULL default '0.00',
  code bigint UNSIGNED NOT NULL default '0',
  reason tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_debit_archive (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  aff_id int UNSIGNED NOT NULL default '0',
  amount decimal(20,2) NOT NULL default '0.00',
  code bigint UNSIGNED NOT NULL default '0',
  reason tinyint UNSIGNED NOT NULL default '0',
  payment_record int UNSIGNED NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_delayed (
  enabled tinyint UNSIGNED NOT NULL default '0',
  days int UNSIGNED NOT NULL default '0',
  action tinyint UNSIGNED NOT NULL default '0',
  KEY enabled (enabled)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

// idevaff_deleted_accounts is at bottom

// idevaff_deleted_sales is at bottom

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_attachments (
  template_id int UNSIGNED NOT NULL default '0',
  filename varchar(255) character set utf8 NULL DEFAULT NULL,
  size int UNSIGNED NOT NULL default '0',
  enabled tinyint UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_english (
  approved_subject text NULL,
  approved_body text NULL,
  declined_subject text NULL,
  declined_body text NULL,
  welcome_subject text NULL,
  welcome_body text NULL,
  admin_acct_subject text NULL,
  admin_acct_body text NULL,
  admin_sale_subject text NULL,
  admin_sale_body text NULL,
  comm_subject text NULL,
  comm_body text NULL,
  new_app_subject text NULL,
  new_app_body text NULL,
  admin_rec_subject text NULL,
  admin_rec_body text NULL,
  admin_rew_subject text NULL,
  admin_rew_body text NULL,
  rew_subject text NULL,
  rew_body text NULL,
  admin_fail_subject text NULL,
  admin_fail_body text NULL,
  login_subject text NULL,
  login_body text NULL,
  admin_notify_logo_sub text NULL,
  admin_notify_logo_body text NULL,
  aff_img_app_sub text NULL,
  aff_img_app_body text NULL,
  aff_img_dec_sub text NULL,
  aff_img_dec_body text NULL,
  aff_unapprove_sub text NULL,
  aff_unapprove_body text NULL,
  aff_approve_testi_sub text NULL,
  aff_approve_testi_body text NULL,
  admin_new_testi_sub text NULL,
  admin_new_testi_body text NULL,
  admin_max_comm_exceeded_sub text NULL,
  admin_max_comm_exceeded_body text NULL,
  aff_new_tier_sub text NULL,
  aff_new_tier_body text NULL,
  aff_new_cc_sub  text NULL,
  aff_new_cc_body text NULL,
  admin_vanity_sub text NULL,
  admin_vanity_body text NULL,
  aff_comm_declined_sub text NULL,
  aff_comm_declined_body text NULL,
  aff_comm_gen_sub text NULL,
  aff_comm_gen_body text NULL,
  new_debit_subject text NULL,
  new_debit_body text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
$tabnum = $tabnum + 1;

// WRITE DATA HERE BECAUSE WE'RE USING
// IT AS A TEMPLATE COPY FOR OTHER LANGUAGES
$checkdata = $db->query("select * from idevaff_email_english");
$checkdata = $checkdata->rowCount(); if (!$checkdata) {
$db->query("INSERT INTO idevaff_email_english (approved_subject, approved_body, declined_subject, declined_body, welcome_subject, welcome_body, admin_acct_subject, admin_acct_body, admin_sale_subject, admin_sale_body, comm_subject, comm_body, new_app_subject, new_app_body, admin_rec_subject, admin_rec_body, admin_rew_subject, admin_rew_body, rew_subject, rew_body, admin_fail_subject, admin_fail_body, login_subject, login_body, admin_notify_logo_sub, admin_notify_logo_body, aff_img_app_sub, aff_img_app_body, aff_img_dec_sub, aff_img_dec_body, aff_unapprove_sub, aff_unapprove_body, aff_approve_testi_sub, aff_approve_testi_body, admin_new_testi_sub, admin_new_testi_body, admin_max_comm_exceeded_sub, admin_max_comm_exceeded_body, aff_new_tier_sub, aff_new_tier_body, aff_new_cc_sub, aff_new_cc_body, admin_vanity_sub, admin_vanity_body, aff_comm_declined_sub, aff_comm_declined_body, aff_comm_gen_sub, aff_comm_gen_body, new_debit_subject, new_debit_body) VALUES
('Our Affiliate Program Affiliate Approval', 'Dear {first_name},\r\n\r\nWe have approved your account!  You can now login and get your banner linking code, check stats, etc.', 'Our Affiliate Program Affiliate Decline Notice', 'Dear {first_name},\r\n\r\nWe are sorry to inform you that we have decided not to approve your affiliate account at this time.  If you would like more information, please respond to this email and we would be happy to explain our decision in more detail.', 'Welcome To The Your Site Name Affiliate Program!', 'Dear {first_name},\r\n\r\nWelcome to the Your Site Name affiliate program.  Once we have approved your account, you can login and retrieve your banner linking code, check your sales and traffic stats and much more.', 'New Affiliate Account on Our Affiliate Program', 'Dear Admin,\r\n\r\nYou have a new affiliate.  If you chose to approve new accounts, you will need to login to your admin center and either approve or decline this account.\r\n\r\nAffiliate ID: {id}', 'New Commission on Our Affiliate Program', 'Dear Admin,\r\n\r\nYou have a new affiliate commission on Our Affiliate Program.  If you chose to approve commissions, you will need to login to your admin center and either approve or decline this commission.', 'Payment Notification - Our Affiliate Program Affiliate Program', 'Dear {first_name},\r\n\r\nWe have sent your commission payment for this month.  Be sure to login and check your financial history as well as other important stats.  We hope to continue building a strong partnership with you!', 'New Commission Notification - Our Affiliate Program Affiliate Program', 'Dear {first_name},\r\n\r\nCongratulations!  You have generated a commission on the Our Affiliate Program affiliate program.  Be sure to login to your account to check your accounting history and current stats.', 'New Recurring Commission on Our Affiliate Program', 'Dear Admin,\r\n\r\niDevAffiliate has automatically generated a new sale from your list of recurring sales.  Please login to approve this recurring sale and manage your affiliates.', 'Your Site Name Performance Reward Issued', 'Dear Admin,\r\n\r\niDevAffiliate has issued a performance reward and has automatically increased the payout level of an affiliate.', 'Performance Reward Issued', 'Dear {first_name},\r\n\r\nOur affiliate system has issued you a performance reward and has automatically increased your payout level!\r\n\r\nPlease login to check your new commission status.', 'Commission Failure on Whatever', 'Dear Admin,\r\n\r\niDevAffiliate tried processing a commission and failed.  You will only receive this message if you chose not to approve commissions in the admin center.  This commission was not written to the database due to one of the following reasons.\r\n\r\nA.) iDevAffiliate didn''t receive the sale amount.\r\nB.) The commission amount was to low to calculate.\r\nC.) Your cart integration is not setup properly.\r\n\r\nCheck your Cart Integration, Processing Code Placement or make sure the sale amount was large enough to perform a percentage calculation on.', 'Our Affiliate Program Login Details', 'Dear {first_name},\r\n\r\nYour requested login information is below.\r\n\r\nUsername: {username}\r\nPassword: {password}\r\n\r\nLogin Here:\r\n{login_page}', 'New Image Upload on Whatever', 'Dear Admin,\r\n\r\nAn image/logo has been uploaded by an affiliate and it requires your approval.  Please login your iDevAffiliate admin center to approve or decline this image.', 'Whatever Affiliate Program Image Upload Approval', 'Dear {username},\r\n\r\nWe are pleased to inform you that we have approved your recent image/logo upload.  Your logo will now be used on our website and your affiliates will see it when you deliver them through your affiliate link.', 'Whatever Affiliate Program Image Upload Declined', 'Dear {username},\r\n\r\nWe are sorry to inform you that we have been unable to approve your recent image/logo upload.  If you have any questions, please feel free to contact us.', 'Whatever Commission Removed', 'Dear {username},\r\n\r\nWe''re sorry to inform you that we''ve had to remove a previously approved commission from your account.  This is due to one of the following reasons.\r\n\r\n- The customer requested a refund.\r\n- The sale turned out to be fraudulent.\r\n- The customer''s credit card was declined.\r\n\r\nWe appreciate your understanding in this matter.\r\n\r\n--------', 'Your Site Name Testimonial Approved', 'Dear {username},\r\n\r\nThank you for submitting your testimonial for our affiliate program.  We are happy to let you know we have approved it and it is currently on our website.\r\n\r\nTestimonials Page:\r\n{aff_testimonials}', 'New Testimonial on Your Site Affiliate Program', 'Dear Admin,\r\n\r\nYou have a new testimonial pending approval.  Please login to your iDevAffiliate admin center to manage this new testimonial.', 'Rejected Commission on Your Site Affiliate Program', 'Dear Admin,\n\nA new commission was rejected.  The commission that attempted to come in exceeded your maximum allowable commission amount.  The maximum commission amount allowed is adjustable in your iDevAffiliate admin center on the General Settings (menu at top) then Fraud Control page.\n\nIs this a valid commission?\nConsider raising the limit on your maximum commission amount allowed or disable this feature.  You will probably want to create this commission manually now for the affiliate by clicking the Create link on the left menu of your admin center in the Commissions section.\n\nIs this an invalid commission?\nYou will probably want to investigate the sale.  The details for the sale and commission are below.  This commission did not get put into the system so there is nothing to do where iDevAffiliate is concerned.\n\nRejected Commission Details', 'You Have A New Tier Account Signup!', 'Dear {username},\n\nA new account has signed up in your tier.  You will now be earning a tier commission each time this new account earns a commission!', 'Your Site Name Coupon Code Assigned', 'Dear {first_name},\r\n\r\nWe have created a new coupon code for you to use in your marketing efforts.  Please login to your affiliate account for details on how much this coupon code is valid for and your commission rate each time it''s used.\r\n\r\nCoupon Code: {coupon_code}\r\n\r\n{login_page}', 'New Vanity Coupon Code Rquest on Our Affiliate Program', 'Dear Admin,\r\n\r\nYou have a new vanity code request.  Please login to your admin center to setup or decline this coupon code.\r\n\r\nAffiliate ID: {id}\r\nCoupon Code Requested: {coupon_code}','Commission Declined - {company_name} Affiliate Program','Dear {username},\r\n\r\nWe are sorry to inform you that we have had to decline a commission assigned to you. This commission was declined due to the issue of a customer refund, charge back or fraud. For further information about this commission being declined, please reply to this email message.\r\n\r\nWe appreciate your understanding in this matter.','New Commission Created / Pending Approval - {company_name} Affiliate Program','Dear {first_name},\r\n\r\nWe are pleased to let you know you have generated a commission in our affiliate program. This commission is pending approval. We will let you know when it has been approved. Thank you for your continued participation in our affiliate program.','New Debit Added - {company_name} Affiliate Program','Dear {first_name},\r\n\r\nWe have added a new debit to your account. This debit will be subtracted from your next payment. Please do not hesitate to contact us for further information. The reason for this debit can be found below.')");
}

// Other languages inserted below from above table.


$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_language_packs (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(20) character set utf8 NULL DEFAULT NULL,
  status tinyint UNSIGNED NOT NULL default '0',
  def tinyint UNSIGNED NOT NULL default '0',
  table_name varchar(64) character set utf8 NULL DEFAULT NULL,
  user_created tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_settings (
  address varchar(128) character set utf8 NULL DEFAULT NULL,
  alternate_email_address varchar(128) character set utf8 NULL DEFAULT NULL,
  from_name varchar(64) character set utf8 NULL DEFAULT NULL,
  signature text NULL,
  transport tinyint UNSIGNED NOT NULL default '0',
  smtp_port int UNSIGNED NOT NULL default '0',
  smtp_host varchar(64) character set utf8 NULL DEFAULT NULL,
  smtp_auth varchar(10) character set utf8 NULL DEFAULT NULL,
  smtp_user varchar(64) character set utf8 NULL DEFAULT NULL,
  smtp_pass blob NULL,
  smtp_char_set varchar(25) character set utf8 NULL DEFAULT NULL,
  smtp_security varchar(25) character set utf8 NULL DEFAULT NULL,
  delivery_type tinyint UNSIGNED NOT NULL default '0',
  cc_email_address varchar(128) character set utf8 NULL DEFAULT NULL,
  api_email_address varchar(128) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_templates (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(128) character set utf8 NULL DEFAULT NULL,
  grp int UNSIGNED NOT NULL default '0',
  content longtext NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_facebook (
  enabled tinyint UNSIGNED NOT NULL default '0',
  id varchar(64) character set utf8 NULL DEFAULT NULL,
  secret varchar(64) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_faq (
  id int UNSIGNED NOT NULL auto_increment,
  question text NULL,
  answer text NULL,
  sort int NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_form_custom_data (
  id int UNSIGNED NOT NULL auto_increment,
  affid int UNSIGNED NOT NULL default '0',
  custom_id int UNSIGNED NOT NULL default '0',
  custom_value varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_form_fields (
  id int UNSIGNED NOT NULL auto_increment,
  used tinyint UNSIGNED NOT NULL default '0',
  req tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_form_fields_custom (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(64) character set utf8 NULL DEFAULT NULL,
  title varchar(128) character set utf8 NULL DEFAULT NULL,
  def_value varchar(128) character set utf8 NULL DEFAULT NULL,
  req tinyint UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  display_payment tinyint UNSIGNED NOT NULL default '0',
  display_invoice tinyint UNSIGNED NOT NULL default '0',
  display_record tinyint UNSIGNED NOT NULL default '0',
  edit tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_general_sales (
  id int UNSIGNED NOT NULL auto_increment,
  time_stamp bigint UNSIGNED NOT NULL default '0',
  order_number varchar(64) character set utf8 NULL DEFAULT NULL,
  sale_amount decimal(10,2) NOT NULL default '0.00',
  customer_ip varchar(64) character set utf8 NULL DEFAULT NULL,
  currency varchar(3) character set utf8 NULL DEFAULT NULL,
  converted_amount decimal(10,2) NOT NULL default '0.00',
  geo varchar(2) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_groups (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(128) character set utf8 NULL DEFAULT NULL,
  contains int UNSIGNED NOT NULL default '0',
  ads int UNSIGNED NOT NULL default '0',
  links int UNSIGNED NOT NULL default '0',
  hads int UNSIGNED NOT NULL default '0',
  location varchar(255) character set utf8 NULL DEFAULT NULL,
  etemps int UNSIGNED NOT NULL default '0',
  peels int UNSIGNED NOT NULL default '0',
  lightboxes int UNSIGNED NOT NULL default '0',
  qr_enabled tinyint UNSIGNED NOT NULL default '0',
  vids int UNSIGNED NOT NULL default '0',
  announcements int UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_groups_exclude (
  id int UNSIGNED NOT NULL default '0',
  affiliate_id int UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_htmlads (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(128) character set utf8 NULL DEFAULT NULL,
  grp int UNSIGNED NOT NULL default '0',
  html_code text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_integration (
  type int UNSIGNED NOT NULL default '0',
  auto tinyint UNSIGNED NOT NULL default '0',
  manual tinyint UNSIGNED NOT NULL default '0',
  idev_vartotal varchar(64) character set utf8 NULL DEFAULT NULL,
  idev_order varchar(64) character set utf8 NULL DEFAULT NULL,
  idev_var1 varchar(64) character set utf8 NULL DEFAULT NULL,
  cart_var1 varchar(64) character set utf8 NULL DEFAULT NULL,
  use_var1 tinyint UNSIGNED NOT NULL default '0',
  tag_var1 varchar(64) character set utf8 NULL DEFAULT NULL,
  idev_var2 varchar(64) character set utf8 NULL DEFAULT NULL,
  cart_var2 varchar(64) character set utf8 NULL DEFAULT NULL,
  use_var2 tinyint UNSIGNED NOT NULL default '0',
  tag_var2 varchar(64) character set utf8 NULL DEFAULT NULL,
  idev_var3 varchar(64) character set utf8 NULL DEFAULT NULL,
  cart_var3 varchar(64) character set utf8 NULL DEFAULT NULL,
  use_var3 tinyint UNSIGNED NOT NULL default '0',
  tag_var3 varchar(64) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_invoice (
  company varchar(255) character set utf8 NULL DEFAULT NULL,
  ad1 varchar(100) character set utf8 NULL DEFAULT NULL,
  ad2 varchar(50) character set utf8 NULL DEFAULT NULL,
  city varchar(100) character set utf8 NULL DEFAULT NULL,
  state varchar(50) character set utf8 NULL DEFAULT NULL,
  zip varchar(20) character set utf8 NULL DEFAULT NULL,
  country varchar(3) character set utf8 NULL DEFAULT NULL,
  note varchar(255) character set utf8 NULL DEFAULT NULL,
  aff_inv tinyint UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_ipblock (
  id int UNSIGNED NOT NULL auto_increment,
  blocked_ip varchar(64) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_iptracking (
  id int UNSIGNED NOT NULL auto_increment,
  acct_id int UNSIGNED NOT NULL default '0',
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  refer varchar(255) character set utf8 NULL DEFAULT NULL,
  stamp bigint UNSIGNED NOT NULL default '0',
  hit_time varchar(128) character set utf8 NULL DEFAULT NULL,
  hit_date varchar(128) character set utf8 NULL DEFAULT NULL,
  src1 int UNSIGNED NOT NULL default '0',
  src2 int UNSIGNED NOT NULL default '0',
  split varchar(128) character set utf8 NULL DEFAULT NULL,
  sub_id varchar(64) character set utf8 NULL DEFAULT NULL,
  tid1 varchar(64) character set utf8 NULL DEFAULT NULL,
  tid2 varchar(64) character set utf8 NULL DEFAULT NULL,
  tid3 varchar(64) character set utf8 NULL DEFAULT NULL,
  tid4 varchar(64) character set utf8 NULL DEFAULT NULL,
  target_url varchar(255) character set utf8 NULL DEFAULT NULL,
  geo varchar(2) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id),
  KEY acct_id_ip (acct_id,ip),
  KEY ip (ip),
  KEY stamp (stamp),
  KEY acct_id (acct_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_language_custom (
  id int UNSIGNED NOT NULL auto_increment,
  name text NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_language_custom_values (
  id int UNSIGNED NOT NULL auto_increment,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;
  
$db->query("CREATE TABLE IF NOT EXISTS idevaff_language_packs (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  status tinyint UNSIGNED NOT NULL default '0',
  def tinyint UNSIGNED NOT NULL default '0',
  table_name varchar(255) character set utf8 NULL DEFAULT NULL,
  user_created tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_lightboxes (
  number int UNSIGNED NOT NULL auto_increment,
  grp int UNSIGNED NOT NULL default '0',
  name varchar(64) character set utf8 NULL DEFAULT NULL,
  image75 varchar(64) character set utf8 NULL DEFAULT NULL,
  image500 varchar(64) character set utf8 NULL DEFAULT NULL,
  description text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY  (number)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_links (
  id int UNSIGNED NOT NULL auto_increment,
  grp int UNSIGNED NOT NULL default '0',
  linktext text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_logos (
  record int UNSIGNED NOT NULL auto_increment,
  id int UNSIGNED NOT NULL default '0',
  approved tinyint UNSIGNED NOT NULL default '0',
  filename varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_logo_settings (
  logo_enabled tinyint UNSIGNED NOT NULL default '0',
  logo_size int UNSIGNED NOT NULL default '0',
  logo_width int UNSIGNED NOT NULL default '0',
  logo_height int UNSIGNED NOT NULL default '0',
  logo_type tinyint UNSIGNED NOT NULL default '0',
  logo_default varchar(255) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_logs_admin (
  id int UNSIGNED NOT NULL auto_increment,
  username varchar(128) character set utf8 NULL DEFAULT NULL,
  ip_address varchar(64) character set utf8 NULL DEFAULT NULL,
  code bigint UNSIGNED NOT NULL default '0',
  message varchar(255) character set utf8 NULL DEFAULT NULL,
  type int UNSIGNED NOT NULL default '0',
  affiliate int UNSIGNED NOT NULL default '0',
  amount decimal(10,2) NOT NULL default '0.00',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_newsletter_addons (
  id int UNSIGNED NOT NULL auto_increment,
  meta_key varchar(255) character set utf8 NULL DEFAULT NULL,
  meta_value longtext character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY meta_key (meta_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_notes (
  id int UNSIGNED NOT NULL auto_increment,
  note_to int UNSIGNED NOT NULL default '0',
  note_sub text NULL,
  note_con text NULL,
  note_display tinyint UNSIGNED NOT NULL default '0',
  note_attach tinyint UNSIGNED NOT NULL default '0',
  note_date varchar(24) character set utf8 NULL DEFAULT NULL,
  note_image varchar(256) character set utf8 NULL DEFAULT NULL,
  note_image_location tinyint UNSIGNED NOT NULL default '0',
  stamp bigint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_paylevels (
  id int UNSIGNED NOT NULL auto_increment,
  type tinyint UNSIGNED NOT NULL default '0',
  level tinyint UNSIGNED NOT NULL default '0',
  amt decimal(10,3) NOT NULL default '0.000',
  amt_alt decimal(10,3) NOT NULL default '0.000',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_payments (
  record int UNSIGNED NOT NULL auto_increment,
  id varchar(64) character set utf8 NULL DEFAULT NULL,
  amount decimal(10,2) NOT NULL default '0.00',
  stamp bigint UNSIGNED NOT NULL default '0',
  export tinyint UNSIGNED NOT NULL default '0',
  code bigint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_payment_methods (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  enabled tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_pdf (
  id int UNSIGNED NOT NULL auto_increment,
  filename text NULL,
  pdf_type tinyint UNSIGNED NOT NULL default '0',
  size int UNSIGNED NOT NULL default '0',
  pdf_desc text NULL,
  sort int NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_peels (
  number int UNSIGNED NOT NULL auto_increment,
  grp int UNSIGNED NOT NULL default '0',
  name varchar(64) character set utf8 NULL DEFAULT NULL,
  image75 varchar(64) character set utf8 NULL DEFAULT NULL,
  image500 varchar(64) character set utf8 NULL DEFAULT NULL,
  description text NULL,
  hits int UNSIGNED NOT NULL default '0',
  conv int UNSIGNED NOT NULL default '0',
  sort int NOT NULL default '0',
  PRIMARY KEY  (number)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_pp_transactions (
  id int UNSIGNED NOT NULL auto_increment,
  aff_id int UNSIGNED NOT NULL default '0',
  order_num varchar(50) character set utf8 NULL DEFAULT NULL,
  rec tinyint UNSIGNED NOT NULL default '0',
  amt decimal(10,2) NOT NULL default '0.00',
  op1 varchar(64) character set utf8 NULL DEFAULT NULL,
  op2 varchar(64) character set utf8 NULL DEFAULT NULL,
  op3 varchar(64) character set utf8 NULL DEFAULT NULL,
  code bigint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_private (
  id int UNSIGNED NOT NULL auto_increment,
  type tinyint UNSIGNED NOT NULL default '0',
  code varchar(64) character set utf8 NULL DEFAULT NULL,
  expires bigint UNSIGNED NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_products (
  id int UNSIGNED NOT NULL auto_increment,
  enabled tinyint UNSIGNED NOT NULL default '0',
  product_id varchar(255) character set utf8 NULL DEFAULT NULL,
  product_amount decimal(10,2) NOT NULL default '0.00',
  product_commission decimal(10,2) NOT NULL default '0.00',
  product_type tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_promo (
  id int UNSIGNED NOT NULL auto_increment,
  start_date bigint UNSIGNED NOT NULL default '0',
  end_date bigint UNSIGNED NOT NULL default '0',
  amount decimal(10,2) NOT NULL default '0.00',
  enabled tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_qsg (
  step_1 tinyint UNSIGNED NOT NULL default '0',
  step_2 tinyint UNSIGNED NOT NULL default '0',
  step_3 tinyint UNSIGNED NOT NULL default '0',
  step_4 tinyint UNSIGNED NOT NULL default '0',
  step_5 tinyint UNSIGNED NOT NULL default '0',
  step_6 tinyint UNSIGNED NOT NULL default '0',
  step_7 tinyint UNSIGNED NOT NULL default '0',
  step_8 tinyint UNSIGNED NOT NULL default '0',
  step_9 tinyint UNSIGNED NOT NULL default '0',
  step_10 tinyint UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_rewards (
  rewards tinyint UNSIGNED NOT NULL default '0',
  rew_1 int UNSIGNED NOT NULL default '0',
  rew_2 tinyint UNSIGNED NOT NULL default '0',
  rew_app tinyint UNSIGNED NOT NULL default '0',
  rew_ceiling_pps_perc tinyint UNSIGNED NOT NULL default '0',
  rew_ceiling_pps_flat tinyint UNSIGNED NOT NULL default '0',
  rew_ceiling_ppc tinyint UNSIGNED NOT NULL default '0'  
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sales (
  record int UNSIGNED NOT NULL auto_increment,
  id int UNSIGNED NOT NULL default '0',
  payment decimal(20,2) NOT NULL default '0.00',
  top_tier_tag tinyint UNSIGNED NOT NULL default '0',
  bonus tinyint UNSIGNED NOT NULL default '0',
  approved tinyint UNSIGNED NOT NULL default '0',
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  code bigint UNSIGNED NOT NULL default '0',
  tracking varchar(64) character set utf8 NULL DEFAULT NULL,
  tier_id int UNSIGNED NOT NULL default '0',
  rec_id int UNSIGNED NOT NULL default '0',
  op1 varchar(64) character set utf8 NULL DEFAULT NULL,
  op2 varchar(64) character set utf8 NULL DEFAULT NULL,
  op3 varchar(64) character set utf8 NULL DEFAULT NULL,
  amount decimal(20,2) NOT NULL default '0.00',
  type tinyint UNSIGNED NOT NULL default '0',
  split varchar(128) character set utf8 NULL DEFAULT NULL,
  profile int UNSIGNED NOT NULL default '0',
  delay int UNSIGNED NOT NULL default '0',
  referring_url varchar(255) character set utf8 NULL DEFAULT NULL,
  adm_alert tinyint UNSIGNED NOT NULL default '0',
  aff_alert tinyint UNSIGNED NOT NULL default '0',
  sub_id varchar(64) character set utf8 NULL DEFAULT NULL,
  tid1 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid2 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid3 varchar(255) character set utf8 NULL DEFAULT NULL,
  tid4 varchar(255) character set utf8 NULL DEFAULT NULL,
  target_url varchar(255) character set utf8 NULL DEFAULT NULL,
  currency varchar(3) character set utf8 NULL DEFAULT NULL,
  converted_amount decimal(20,2) NOT NULL default '0.00',
  override tinyint UNSIGNED NOT NULL default '0',
  override_id int UNSIGNED NOT NULL default '0',
  geo varchar(2) character set utf8 NULL DEFAULT NULL,
  tracking_method varchar(255) character set utf8 NULL DEFAULT NULL,
  conversion_time bigint UNSIGNED NOT NULL default '0',
  notes mediumtext NULL,
  alt_amt tinyint UNSIGNED NOT NULL default '0',
  sliding_scale int UNSIGNED NOT NULL default '0',
  sliding_alternate int UNSIGNED NOT NULL default '0',
  per_product int UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (record),
  KEY bonus_approved (bonus,approved)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_social (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  enabled tinyint UNSIGNED NOT NULL default '0',
  link varchar(2000) character set utf8 NULL DEFAULT NULL,
  image varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_suspensions (
  id int UNSIGNED NOT NULL auto_increment,
  affid int UNSIGNED NOT NULL default '0',
  notice mediumtext NULL,
  alt_delivery tinyint UNSIGNED NOT NULL default '0',
  susp_allow_comm int UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tc_log (
  update_record int UNSIGNED NOT NULL default '0',
  aff_id int UNSIGNED NOT NULL default '0',
  stamp bigint UNSIGNED NOT NULL default '0',
  KEY update_record (update_record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tc_updates (
  record int UNSIGNED NOT NULL auto_increment,
  stamp bigint UNSIGNED NOT NULL default '0',
  terms mediumtext NULL,
  PRIMARY KEY (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_terms (
  display tinyint UNSIGNED NOT NULL default '0',
  forced tinyint UNSIGNED NOT NULL default '0',
  re_forced tinyint UNSIGNED NOT NULL default '0',
  terms text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_testimonials (
  id int UNSIGNED NOT NULL auto_increment,
  aff_id int UNSIGNED NOT NULL default '0',
  affiliate_name varchar(128) character set utf8 NULL DEFAULT NULL,
  website_url varchar(255) character set utf8 NULL DEFAULT NULL,
  testimonial text NULL,
  approved tinyint UNSIGNED NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tiers (
  id int UNSIGNED NOT NULL auto_increment,
  parent int UNSIGNED NOT NULL default '0',
  child int UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY parent (parent,child)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tier_settings (
  level_1_amount decimal(10,2) NOT NULL default '0.00',
  level_1_type tinyint UNSIGNED NOT NULL default '0',
  level_2_amount decimal(10,2) NOT NULL default '0.00',
  level_2_type tinyint UNSIGNED NOT NULL default '0',
  level_3_amount decimal(10,2) NOT NULL default '0.00',
  level_3_type tinyint UNSIGNED NOT NULL default '0',
  level_4_amount decimal(10,2) NOT NULL default '0.00',
  level_4_type tinyint UNSIGNED NOT NULL default '0',
  level_5_amount decimal(10,2) NOT NULL default '0.00',
  level_5_type tinyint UNSIGNED NOT NULL default '0',
  level_6_amount decimal(10,2) NOT NULL default '0.00',
  level_6_type tinyint UNSIGNED NOT NULL default '0',
  level_7_amount decimal(10,2) NOT NULL default '0.00',
  level_7_type tinyint UNSIGNED NOT NULL default '0',
  level_8_amount decimal(10,2) NOT NULL default '0.00',
  level_8_type tinyint UNSIGNED NOT NULL default '0',
  level_9_amount decimal(10,2) NOT NULL default '0.00',
  level_9_type tinyint UNSIGNED NOT NULL default '0',
  level_10_amount decimal(10,2) NOT NULL default '0.00',
  level_10_type tinyint UNSIGNED NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tlog (
  id int UNSIGNED NOT NULL auto_increment,
  ta int UNSIGNED NOT NULL default '0',
  ti varchar(64) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id),
  KEY ta_ti (ta,ti)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tokens (
  panel_language varchar(64) NOT NULL,
  affiliate_login varchar(64) NOT NULL,
  affiliate_creds varchar(64) NOT NULL,
  affiliate_private varchar(64) NOT NULL,
  KEY panel_language (panel_language),
  KEY affiliate_login (affiliate_login),
  KEY affiliate_creds (affiliate_creds),
  KEY affiliate_private (affiliate_private)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_vat (
  id int UNSIGNED NOT NULL auto_increment,
  country varchar(3) character set utf8 NULL DEFAULT NULL,
  rate decimal(10,2) NOT NULL default '0.00',
  admin_invoice tinyint UNSIGNED NOT NULL default '0',
  affiliate_invoice tinyint UNSIGNED NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_videos (
  record int UNSIGNED NOT NULL AUTO_INCREMENT,
  grp int UNSIGNED NOT NULL default '0',
  video_type varchar(10) character set utf8 NULL DEFAULT NULL,
  video varchar(255) character set utf8 NULL DEFAULT NULL,
  logo varchar(255) character set utf8 NULL DEFAULT NULL,
  logo_location varchar(20) character set utf8 NULL DEFAULT NULL,
  splash varchar(255) character set utf8 NULL DEFAULT NULL,
  effect varchar(20) character set utf8 NULL DEFAULT NULL,
  video_finish varchar(20) character set utf8 NULL DEFAULT NULL,
  preroll_show varchar(5) character set utf8 NULL DEFAULT NULL,
  preroll_skip varchar(5) character set utf8 NULL DEFAULT NULL,
  preroll_seconds int NOT NULL default '0',
  preroll_mp4 varchar(255) character set utf8 NULL DEFAULT NULL,
  preroll_thumb varchar(255) character set utf8 NULL DEFAULT NULL,
  responsive varchar(5) character set utf8 NULL DEFAULT NULL,
  fixed_width varchar(10) character set utf8 NULL DEFAULT NULL,
  fixed_height varchar(10) character set utf8 NULL DEFAULT NULL,
  auto_play varchar(5) character set utf8 NULL DEFAULT NULL,
  video_title mediumtext NULL,
  video_desc mediumtext NULL,
  sort int NOT NULL default '0',
  PRIMARY KEY (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_cats (
  id int UNSIGNED NOT NULL,
  name varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_library (
  id int UNSIGNED NOT NULL auto_increment,
  video_name varchar(64) character set utf8 NULL DEFAULT NULL,
  video_size varchar(64) character set utf8 NULL DEFAULT NULL,
  video_cat int UNSIGNED NOT NULL default '0',
  video_location varchar(255) character set utf8 NULL DEFAULT NULL,
  video_enabled tinyint UNSIGNED NOT NULL default '1',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_options (
  id int UNSIGNED NOT NULL auto_increment,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  description text NULL,
  price_initial decimal(10,2) NOT NULL default '0.00',
  days_initial int UNSIGNED NOT NULL default '0',
  duration_initial varchar(1) character set utf8 NULL DEFAULT NULL,
  price_recurring decimal(10,2) NOT NULL default '0.00',
  days_recurring int UNSIGNED NOT NULL default '0',
  duration_recurring varchar(1) character set utf8 NULL DEFAULT NULL,
  days int UNSIGNED NOT NULL default '0',
  discount_percent decimal(10,2) NOT NULL default '0.00',
  discount_flat decimal(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_settings (
  paypal varchar(255) character set utf8 NULL DEFAULT NULL,
  stamp blob NOT NULL,
  enabled tinyint UNSIGNED NOT NULL default '0',
  sidebar tinyint UNSIGNED NOT NULL default '0',
  retro varchar(10) character set utf8 NULL DEFAULT NULL,
  video_logo_url varchar(255) character set utf8 NULL DEFAULT NULL,
  library_version decimal(10,2) NOT NULL default '0.00',
  cloud_location varchar(64) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY paypal (paypal)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_tutorials (
  id int UNSIGNED NOT NULL auto_increment,
  video_location varchar(255) character set utf8 NULL DEFAULT NULL,
  video_title varchar(255) character set utf8 NULL DEFAULT NULL,
  video_length varchar(10) character set utf8 NULL DEFAULT NULL,
  sort int NOT NULL default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

// ----------------------------------
// TABLE ADDS FOR 9.1
// ----------------------------------
$db->query("CREATE TABLE IF NOT EXISTS idevaff_cloud (
  client_id int UNSIGNED NOT NULL default '0',
  stripe_customer_id text NULL,
  package tinyint UNSIGNED NOT NULL default '0.00',
  subscription_status varchar(255) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_webhook_log (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  response_code varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  request_url varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  event_name varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  code bigint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_geo_target (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  country char(2) CHARACTER SET utf8 DEFAULT NULL,
  location varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  country_name varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_countries_geo (
  country_code text COLLATE utf8_unicode_ci,
  country_name text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_country_coords (
  country_code char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  latitude decimal(14,10) NOT NULL DEFAULT '0.0000000000',
  longitude decimal(14,10) NOT NULL DEFAULT '0.0000000000',
  UNIQUE KEY country_code (country_code)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
$tabnum = $tabnum + 1;

// ----------------------------------
// TABLE ADDS FOR 9.2
// ----------------------------------

$db->query("CREATE TABLE IF NOT EXISTS idevaff_ga (
  footer text NULL,
  signup text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_paylevels_sliding (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  type int UNSIGNED NOT NULL DEFAULT '0',
  paylevel int UNSIGNED NOT NULL DEFAULT '0',
  slidinglevel int UNSIGNED NOT NULL DEFAULT '0',
  min_amount decimal(10,3) NOT NULL DEFAULT '0.000',
  max_amount decimal(10,3) NOT NULL DEFAULT '0.000',
  amt decimal(10,3) NOT NULL DEFAULT '0.000',
  amt_alt decimal(10,3) NOT NULL DEFAULT '0.000',
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_privacy (
  privacy_enabled int UNSIGNED NOT NULL DEFAULT '0',
  privacy_signup int UNSIGNED NOT NULL DEFAULT '0',
  privacy_required int UNSIGNED NOT NULL DEFAULT '0',
  policy text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_aff_lockout (
  id int UNSIGNED NOT NULL auto_increment,
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  attempts tinyint UNSIGNED NOT NULL DEFAULT '0',
  code bigint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions_aff (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$tabnum = $tabnum + 1;

// THESE ARE OUT OF ORDER BECAUSE THEY ARE A COPY
// ----------------------------------------------
$db->query("CREATE TABLE IF NOT EXISTS idevaff_deleted_accounts LIKE idevaff_affiliates");
$tabnum = $tabnum + 1;

$db->query("CREATE TABLE IF NOT EXISTS idevaff_deleted_sales LIKE idevaff_sales");
$tabnum = $tabnum + 1;
?>