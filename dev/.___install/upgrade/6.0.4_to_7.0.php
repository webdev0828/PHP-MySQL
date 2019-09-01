<?PHP

// CHECK GD & FREETYPE STATUS
// --------------------------------------
$use_sec_enable = 0;
if (extension_loaded('gd') && function_exists('gd_info')) {
    $arr_gd_info = gd_info();
    if($arr_gd_info['FreeType Support'] == true) {
        $use_sec_enable = 1;
    }
}

try {
    $db->query("RENAME TABLE idevaff_email TO idevaff_email_english");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english ADD aff_approve_testi_sub text NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english ADD aff_approve_testi_body text NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english ADD admin_new_testi_sub text NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english ADD admin_new_testi_body text NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_email_english set aff_approve_testi_sub = 'Your Site Name Testimonial Approved', aff_approve_testi_body = 'Dear _username_,\n\nThank you for submitting your testimonial for our affiliate program.  We are happy to let you know we have approved it and it is currently on our website.\n\nTestimonials Page:\n_afftestimonials_', admin_new_testi_sub = 'New Testimonial on Your Site Affiliate Program', admin_new_testi_body = 'Dear Admin,\n\nYou have a new testimonial pending approval.  Please login to your iDevAffiliate admin center to manage this new testimonial.'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

$db->query("CREATE TABLE IF NOT EXISTS idevaff_banned_email (
  id int(255) NOT NULL auto_increment,
  email_address varchar(255) character set latin1 NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_banned_ip (
  id int(255) NOT NULL auto_increment,
  ip_address varchar(255) character set latin1 NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_commission_override (
  t_id int(255) NOT NULL auto_increment,
  id int(255) NOT NULL,
  slave int(255) NOT NULL,
  commission_amount decimal(10,2) NOT NULL,
  commission_type int(1) NOT NULL,
  tag int(1) NOT NULL,
  PRIMARY KEY  (t_id),
  UNIQUE KEY id (id,slave)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_coupons (
  id int(255) NOT NULL auto_increment,
  coupon_code varchar(128) character set latin1 NOT NULL,
  coupon_affiliate int(255) NOT NULL,
  coupon_amount decimal(20,2) NOT NULL,
  coupon_type int(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_currency (
  id int(11) NOT NULL auto_increment,
  currency_code varchar(6) character set latin1 NOT NULL,
  currency_symbol varchar(10) NOT NULL,
  currency_rate decimal(10,8) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_custom_vars (
  custom_var_1 varchar(255) character set latin1 NOT NULL,
  custom_var_2 varchar(255) character set latin1 NOT NULL,
  custom_var_3 varchar(255) character set latin1 NOT NULL,
  custom_var_4 varchar(255) character set latin1 NOT NULL,
  custom_var_5 varchar(255) character set latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_attachments (
  template_id int(255) NOT NULL default '0',
  filename varchar(255) character set utf8 NULL DEFAULT NULL,
  size int(255) NOT NULL default '0',
  enabled int(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

/*
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_dutch SELECT * FROM idevaff_email_english");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_french SELECT * FROM idevaff_email_english");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_german SELECT * FROM idevaff_email_english");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_italian SELECT * FROM idevaff_email_english");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_portuguese SELECT * FROM idevaff_email_english");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_spanish SELECT * FROM idevaff_email_english");
*/

$db->query("CREATE TABLE IF NOT EXISTS idevaff_email_language_packs (
  id int(255) NOT NULL auto_increment,
  name varchar(20) character set latin1 NOT NULL default '',
  status int(1) NOT NULL default '0',
  def int(1) NOT NULL default '0',
  table_name varchar(64) character set latin1 NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_general_sales (
  id int(255) NOT NULL auto_increment,
  time_stamp bigint(12) NOT NULL,
  order_number varchar(64) character set latin1 NOT NULL,
  sale_amount decimal(10,2) NOT NULL,
  customer_ip varchar(64) character set latin1 NOT NULL,
  currency varchar(3) character set latin1 NOT NULL,
  converted_amount decimal(10,2) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_newsletter_generic (
  enabled int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_newsletter_mailchimp (
  enabled int(1) NOT NULL,
  api_key blob NOT NULL,
  list_id blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_products (
  id int(255) NOT NULL auto_increment,
  enabled int(1) NOT NULL,
  product_id varchar(255) character set latin1 NOT NULL,
  product_amount decimal(10,2) NOT NULL,
  product_commission decimal(10,2) NOT NULL,
  product_type int(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_promo (
  id int(255) NOT NULL auto_increment,
  start_date bigint(12) NOT NULL,
  end_date bigint(12) NOT NULL,
  amount decimal(10,2) NOT NULL,
  enabled int(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_testimonials (
  id int(255) NOT NULL auto_increment,
  aff_id int(255) NOT NULL,
  affiliate_name varchar(128) character set latin1 NOT NULL,
  website_url varchar(255) character set latin1 NOT NULL,
  testimonial text character set latin1 NOT NULL,
  approved int(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tiers (
  id int(255) NOT NULL auto_increment,
  parent int(10) NOT NULL default '0',
  child int(10) default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY parent (parent,child)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tier_settings (
  level_1_amount decimal(10,2) NOT NULL default '0.00',
  level_1_type int(1) NOT NULL,
  level_2_amount decimal(10,2) NOT NULL default '0.00',
  level_2_type int(1) NOT NULL,
  level_3_amount decimal(10,2) NOT NULL default '0.00',
  level_3_type int(1) NOT NULL,
  level_4_amount decimal(10,2) NOT NULL default '0.00',
  level_4_type int(1) NOT NULL,
  level_5_amount decimal(10,2) NOT NULL default '0.00',
  level_5_type int(1) NOT NULL,
  level_6_amount decimal(10,2) NOT NULL default '0.00',
  level_6_type int(1) NOT NULL,
  level_7_amount decimal(10,2) NOT NULL default '0.00',
  level_7_type int(1) NOT NULL,
  level_8_amount decimal(10,2) NOT NULL default '0.00',
  level_8_type int(1) NOT NULL,
  level_9_amount decimal(10,2) NOT NULL default '0.00',
  level_9_type int(1) NOT NULL,
  level_10_amount decimal(10,2) NOT NULL default '0.00',
  level_10_type int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

// CONTENT UPDATES AND INSERTS
try {
    $db->query("INSERT INTO idevaff_custom_vars (custom_var_1, custom_var_2, custom_var_3, custom_var_4, custom_var_5) VALUES ('', '', '', '', '')");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
	 $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name) VALUES ('english', 1, 1, 'english')");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("INSERT INTO idevaff_newsletter_generic (enabled) VALUES (0)");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("INSERT INTO idevaff_newsletter_mailchimp (enabled) VALUES (0)");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("INSERT INTO idevaff_tier_settings (level_1_amount, level_1_type, level_2_amount, level_2_type, level_3_amount, level_3_type, level_4_amount, level_4_type, level_5_amount, level_5_type, level_6_amount, level_6_type, level_7_amount, level_7_type, level_8_amount, level_8_type, level_9_amount, level_9_type, level_10_amount, level_10_type) VALUES ('0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1, '0.00', 1)");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

$result = $db->query('show tables');
while ($tables = $result->fetch()) {
    foreach ($tables as $key => $value) {
        try {
            $db->query("ALTER TABLE $value COLLATE utf8_general_ci");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

$result = $db->query('show tables');
while ($tables = $result->fetch()) {
    foreach ($tables as $key => $value) {
        try {
            $db->query("ALTER TABLE $value convert to character set utf8");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}


$currency = $db->query("select currency from idevaff_config");
if ( $currency->rowCount() > 0 ) {
    $currency = $currency->fetch();
    $currency = $currency['currency'];
} else {
    $currency = '';
}


$siteurl = $db->query("select siteurl from idevaff_config");
if ( $siteurl->rowCount() > 0 ) {
    $siteurl = $siteurl->fetch();
    $siteurl = $siteurl['siteurl'];
} else {
    $siteurl = "";
}


// idevaff_affiliates
try {
    $db->query("ALTER TABLE idevaff_affiliates ADD email_override varchar(64) NOT NULL default ''");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_affiliates ADD tc_status int(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_affiliates set tc_status = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_archive
try {
    $db->query("ALTER TABLE idevaff_archive CHANGE `stamp` `stamp` int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD currency varchar(3) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD converted_amount decimal(20,2) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD override int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD override_id int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD code bigint(12) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    //$db->query("update idevaff_archive set currency = '$currency'");
	$st = $db->prepare("update idevaff_archive set currency = ?");
    $st->execute(array($currency));
	} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}




// idevaff_config
try {
    $db->query("ALTER TABLE idevaff_config CHANGE `secret` `secret` int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD cur_sym_location int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD decimal_symbols int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD char_set varchar(24) character set latin1 NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD emails_allowed int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD auto_add_ban int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD auto_add_suspension int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD user_min int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD user_max int(255) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD pass_min int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD pass_max int(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD tier_numbers int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD staff varchar(64) character set latin1 NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD redirect_method int(3) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD standard_link_structure int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD seo_link_structure int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD non_commissioned int(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD seo_url varchar(255) character set latin1 NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD seo_link_extension int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD use_cookies int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD network int(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD signup_api int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD coupon_priority int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD qsg int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD testimonials int(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD testimonials_link int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD testimonials_security int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD admin_notify_testimonial int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD affiliate_approved_testimonial int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD paypal_referral_code varchar(30) character set latin1 NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



try {
    $db->query("update idevaff_config set cur_sym_location = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set decimal_symbols = '2'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set char_set = 'utf-8'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set emails_allowed = '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set auto_add_ban = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set auto_add_suspension = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set user_min = '5'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set user_max = '15'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set pass_min = '5'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set pass_max = '15'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set staff = 'on-on-on-on-on-on-on-on-on-on-on-on'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set redirect_method = '301'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set standard_link_structure = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set seo_link_structure = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set non_commissioned = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    //$db->query("update idevaff_config set seo_url = '$siteurl'");
	$st = $db->prepare("update idevaff_config set seo_url = ?");
    $st->execute(array($siteurl));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set seo_link_extension = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set use_cookies = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set network = '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set signup_api = '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set coupon_priority = '2'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set qsg = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set testimonials = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set testimonials_link = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    //$db->query("update idevaff_config set testimonials_security = '$use_sec_enable'");
	$st = $db->prepare("update idevaff_config set testimonials_security = ?");
    $st->execute(array($use_sec_enable));

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set admin_notify_testimonial = '1'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set affiliate_approved_testimonial = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_email_settings
try {
    $db->query("ALTER TABLE idevaff_email_settings ADD delivery_type int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_settings ADD cc_email_address varchar(128) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_email_settings set delivery_type = '2'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_payments
try {
    $db->query("ALTER TABLE idevaff_payments ADD code bigint(12) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_pp_transactions
try {
    $db->query("ALTER TABLE idevaff_pp_transactions ADD code bigint(12) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_rewards
try {
    $db->query("ALTER TABLE idevaff_rewards ADD rew_ceiling_pps_perc int(10) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_rewards ADD rew_ceiling_pps_flat int(10) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_rewards ADD rew_ceiling_ppc int(10) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_rewards set rew_ceiling_pps_perc = '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_rewards set rew_ceiling_pps_flat = '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_rewards set rew_ceiling_ppc = '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_sales
try {
    $db->query("ALTER TABLE idevaff_sales ADD currency varchar(3) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD converted_amount decimal(20,2) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD override int(1) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD override_id int(255) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    //$db->query("update idevaff_sales set currency = '$currency'");
	$st = $db->prepare("update idevaff_sales set currency = ?");
    $st->execute(array($currency));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_terms
try {
    $db->query("ALTER TABLE idevaff_terms ADD re_forced int(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_terms set re_forced = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// UPDATE LANGUAGE PACKS TABLE
try {
    $db->query("ALTER TABLE idevaff_language_packs CHANGE `table_name` `table_name` varchar(64) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_training_videos
try {
    $db->query("ALTER TABLE idevaff_training_videos ADD initial_payment varchar(64) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_training_videos ADD initial_days int(10) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_training_videos ADD initial_duration varchar(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_training_videos ADD recurring_days int(10) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_training_videos ADD recurring_duration varchar(1) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// Language Updates - English
try {
    $db->query("ALTER TABLE idevaff_language_english DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_language_english ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("UPDATE idevaff_language_english SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



$checkifplatplus = $db->query("select id from idevaff_language_packs");
if ($checkifplatplus->rowCount() > 1) {

// Language Updates - German
    try {
        $db->query("ALTER TABLE idevaff_language_german DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_german ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_german SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


// Language Updates - Italian
    try {
        $db->query("ALTER TABLE idevaff_language_italian DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_italian ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_italian SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


// Language Updates - Spanish
    try {
        $db->query("ALTER TABLE idevaff_language_spanish DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_spanish ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_spanish SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


// Language Updates - Portuguese
    try {
        $db->query("ALTER TABLE idevaff_language_portuguese DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_portuguese ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_portuguese SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


// Language Updates - French
    try {
        $db->query("ALTER TABLE idevaff_language_french DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_french ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_french SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


    // Language Updates - Dutch
    try {
        $db->query("ALTER TABLE idevaff_language_dutch DROP tier_stats_payout, DROP tier_stats_earnings, DROP tier_stats_aff_title, DROP tlinks_embedded_type_1, DROP tlinks_forced_earn, DROP tlinks_forced_type_1, DROP tlinks_embedded_type_2, DROP tlinks_forced_type_2");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE idevaff_language_dutch ADD signup_banned text NOT NULL, ADD header_testimonials text NOT NULL, ADD testi_visit text NOT NULL, ADD testi_description text NOT NULL, ADD testi_name text NOT NULL,
 ADD testi_url text NOT NULL, ADD testi_content text NOT NULL, ADD testi_code text NOT NULL, ADD testi_submit text NOT NULL, ADD testi_na text NOT NULL, ADD testi_title text NOT NULL, ADD testi_success_title text NOT NULL,
 ADD testi_success_message text NOT NULL, ADD testi_error_title text NOT NULL, ADD testi_error_name_missing text NOT NULL, ADD testi_error_url_missing text NOT NULL, ADD testi_error_missing text NOT NULL,
 ADD menu_drop_delayed text NOT NULL, ADD details_drop_6 text NOT NULL, ADD details_type_6 text NOT NULL, ADD comdetails_status_6 text NOT NULL, ADD tc_reaccept_title text NOT NULL, ADD tc_reaccept_sub_title text NOT NULL,
 ADD tc_reaccept_button text NOT NULL, ADD tlinks_active text NOT NULL, ADD tlinks_payout_structure text NOT NULL, ADD tlinks_level text NOT NULL, ADD tierText1 text NOT NULL, ADD tierText2 text NOT NULL,
 ADD tierText3 text NOT NULL, ADD tierTextflat text NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("UPDATE idevaff_language_dutch SET signup_banned = 'An error occured during account creation. Please contact the system administrator for more information.', header_testimonials = 'Affiliate Testimonials', testi_visit = 'Visit Website', testi_description = 'Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.', testi_name = 'Name', testi_url = 'Website URL', testi_content = 'Testimonial', testi_code = 'Security Code', testi_submit = 'Submit Testimonial', testi_na = 'Testimonials are not available.', testi_title = 'Offer A Testimonial', testi_success_title = 'Testimonial Success', testi_success_message = 'Thank you for submitting your testimonial. Our team will review it shortly.', testi_error_title = 'Testimonial Error', testi_error_name_missing = 'Please include your name for your testimonial.', testi_error_url_missing = 'Please include your website URL for your testimonial.', testi_error_missing = 'Please include text for your testimonial.', menu_drop_delayed = 'Delayed Commissions', details_drop_6 = 'Current Delayed Commissions', details_type_6 = 'Delayed - Will Approve Soon', comdetails_status_6 = 'Delayed - Will Approve Soon', tc_reaccept_title = 'Terms and Conditions Change Notification', tc_reaccept_sub_title = 'You must agree to our new terms and conditions in order to gain access to your account.', tc_reaccept_button = 'I have read, understand and agree to the above terms and conditions.', tlinks_active = 'Number of Active Tiers', tlinks_payout_structure = 'Tier Payout Structure', tlinks_level = 'Level', tierText1 = '% calculated from the referring affiliate\'s commission amount.', tierText2 = '% calculated from upper tier\'s commission amount.', tierText3 = '% calculated from the sale amount.', tierTextflat = 'flat rate.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
}


function idev_strtotime($date, $end = false) {
    list($month, $day, $year) = explode("-",$date);
    if($end == false) {
        return(mktime( 0,0,0,$month, $day, $year));
    } else {
        return(mktime( 23,59,59,$month, $day, $year));
    }
}

$get_dates = $db->query("select record, `date` from idevaff_archive");
if ($get_dates->rowCount()) {
    while ($qry = $get_dates->fetch()) {
        $record = $qry['record'];
        $existing_date = $qry['date'];
        $broken = explode("-", $existing_date);
        $year = $broken[0];
        $month = $broken[1];
        $day = $broken[2];
        $sale_str = $month . "-" . $day . "-" . $year;
        $comm_date = idev_strtotime($sale_str);
        try {
            //$db->query("update idevaff_archive set code = '$comm_date' where record = '$record'");
			$st = $db->prepare("update idevaff_archive set code = ? where record = ?");
			$st->execute(array($comm_date,$record));
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

$get_dates = $db->query("select record, `date` from idevaff_payments");
if ($get_dates->rowCount()) {
    while ($qry = $get_dates->fetch()) {
        $record = $qry['record'];
        $existing_date = $qry['date'];
        $broken = explode("-", $existing_date);
        $year = $broken[0];
        $month = $broken[1];
        $day = $broken[2];
        $sale_str = $month . "-" . $day . "-" . $year;
        $comm_date = idev_strtotime($sale_str);
        try {
            //$db->query("update idevaff_payments set code = '$comm_date' where record = '$record'");
			$st = $db->prepare("update idevaff_payments set code = ? where record = ?");
			$st->execute(array($comm_date,$record));
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

$get_dates = $db->query("select id, date from idevaff_pp_transactions");
if ($get_dates->rowCount()) {
    while ($qry = $get_dates->fetch()) {
        $id = $qry['id'];
        $existing_date = $qry['date'];
        $broken = explode("-", $existing_date);
        $year = $broken[0];
        $month = $broken[1];
        $day = $broken[2];
        $sale_str = $month . "-" . $day . "-" . $year;
        $comm_date = idev_strtotime($sale_str);
        try {
            //$db->query("update idevaff_pp_transactions set code = '$comm_date' where id = '$id'");
			$st = $db->prepare("update idevaff_pp_transactions set code = ? where id = ?");
			$st->execute(array($comm_date,$id));
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

$get_dates = $db->query("select record, date from idevaff_sales where bonus = '1'");
if ($get_dates->rowCount()) {
    while ($qry = $get_dates->fetch()) {
        $record = $qry['record'];
        $date = $qry['date'];
        $broken = explode("-", $date);
        $year = $broken[0];
        $month = $broken[1];
        $day = $broken[2];
        $sale_str = $month . "-" . $day . "-" . $year;
        $comm_date = idev_strtotime($sale_str);
        try {
            //$db->query("update idevaff_sales set code = '$comm_date' where record = '$record'");
			$st = $db->prepare("update idevaff_sales set code = ? where record = ?");
			$st->execute(array($comm_date,$record));
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}



$second_tier_query = $db->query("select second_tier, tpaystyle, tier_payout, tier_payout_flat, tier_payout_flat from idevaff_config");
if ( $second_tier_query->rowCount() > 0 ) {
    $second_tier_results = $second_tier_query->fetch();
    $second_tier = $second_tier_results['second_tier'];
    $tpaystyle = $second_tier_results['tpaystyle'];
    $tier_payout = $second_tier_results['tier_payout'];
    $tier_payout_flat = $second_tier_results['tier_payout_flat'];
} else {
    $second_tier = '';
    $tpaystyle = '';
    $tier_payout = '';
    $tier_payout_flat = '';
}
// Set Tier Status
if ($second_tier == 1) {
    try {
        $db->query("update idevaff_config set tier_numbers = '1'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
}

// Set Level 1 Tier Payout Type
if ($tpaystyle == 2) {
    $newtpaystyle = 4;
} else {
    $newtpaystyle = 1;
}

try {
    //$db->query("update idevaff_tier_settings set level_1_type = '$newtpaystyle'");
	$st = $db->prepare("update idevaff_tier_settings set level_1_type = ?");
	$st->execute(array($newtpaystyle));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// Set Level 1 Tier Payout Amount
if ($tpaystyle == 1) {
    $newtpayamount = $tier_payout * 100;
} else {
    $newtpayamount = $tier_payout_flat;
}
try {
    //$db->query("update idevaff_tier_settings set level_1_amount = '$newtpayamount'");
	$st = $db->prepare("update idevaff_tier_settings set level_1_type = ?");
	$st->execute(array($newtpayamount));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// Move Tier Accounts To New Table
$get_tiers = $db->query("select id, tier from idevaff_affiliates where tier > '0'");
if ($get_tiers->rowCount()) {
    while ($qry = $get_tiers->fetch()) {
        $id = $qry['id'];
        $tier = $qry['tier'];
        try {
            $db->query("insert into idevaff_tiers (parent, child) VALUES ('$tier', '$id')");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}


$db->query("DROP TABLE IF EXISTS idevaff_alternate_links");
$db->query("DROP TABLE IF EXISTS idevaff_email_interval");
$db->query("DROP TABLE IF EXISTS idevaff_keyword_tracking");

try {
    $db->query("ALTER TABLE idevaff_config DROP second_tier");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP tier_payout");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP tier_payout_flat");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP tpaystyle");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP use_email");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP email_interval");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP debug_mode");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_archive DROP `date`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive DROP `time`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_payments DROP `date`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_pp_transactions DROP `date`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_pp_transactions DROP `time`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_sales DROP `date`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales DROP `time`");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_sales DROP tier");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_affiliates DROP tier");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_email_english DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_english DROP admin_sale_footer");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


/*
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_sale_subject");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_sale_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_dutch DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



try {
    $db->query("ALTER TABLE idevaff_email_italian DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_sale_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_sale_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_italian DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_sale_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_sale_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_portuguese DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_sale_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_sale_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_spanish DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_email_german DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_sale_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_sale_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_german DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("ALTER TABLE idevaff_email_french DROP friend_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP friend_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP approved_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP declined_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_sale_footer");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_acct_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_acct_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_sale_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_sale_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_rec_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_rec_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_rew_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_rew_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_fail_subject");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_fail_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_notify_logo_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_notify_logo_body");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_new_testi_sub");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_email_french DROP admin_new_testi_body");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

*/

try {
    $db->query("update idevaff_config set version = '7.0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
?>