<?PHP
try {
    $db->query("update idevaff_email_settings set smtp_char_set = 'utf-8'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query('ALTER TABLE `idevaff_affiliates` ADD COLUMN `signup_date` int(40) NOT NULL');
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query('ALTER TABLE `idevaff_affiliates` ADD COLUMN `signup_date` int(40) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_config` ADD COLUMN `faq_location` int(1) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_config` ADD COLUMN `debug_mode` int(1) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_config` ADD COLUMN `maint_mode` int(1) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_config` ADD COLUMN `marketing_delivery` int(1) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_config` ADD COLUMN `commission_blocking` int(1) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_config` CHANGE `pass_var` `pass_var` VARCHAR(32) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_config set faq_location = '2'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set marketing_delivery = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}




$db->query("CREATE TABLE IF NOT EXISTS idevaff_ipblock (
  id int(255) NOT NULL auto_increment,
  blocked_ip varchar(64) NOT NULL,
  PRIMARY KEY  (id) )
ENGINE = MyISAM");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_canspam (
  display int(1) NOT NULL default '0',
  forced int(1) NOT NULL default '0',
  canspam text NULL,
  KEY display (display)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");


try {
    $db->query("insert into idevaff_canspam VALUES ('0', '0', '')");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_language_english` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_language_english set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// UPDATE GOLD/PLATINUM/SEO WITH LANGUAGE ITEMS

$checkifplatplus = $db->query("select id from idevaff_language_packs");
if ( $checkifplatplus->rowCount() > 1) {
    try {
        $db->query('ALTER TABLE `idevaff_language_spanish` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query('ALTER TABLE `idevaff_language_german` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query('ALTER TABLE `idevaff_language_portuguese` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query('ALTER TABLE `idevaff_language_dutch` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query('ALTER TABLE `idevaff_language_french` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query('ALTER TABLE `idevaff_language_italian` ADD COLUMN `signup_maintenance_heading` mediumtext NOT NULL, ADD COLUMN `signup_maintenance_info` mediumtext NOT NULL, ADD COLUMN `marketing_group_title` mediumtext NOT NULL, ADD COLUMN `marketing_button` mediumtext NOT NULL, ADD COLUMN `marketing_no_group` mediumtext NOT NULL, ADD COLUMN `marketing_choose` mediumtext NOT NULL, ADD COLUMN `marketing_notice` mediumtext NOT NULL, ADD COLUMN `canspam_heading` mediumtext NOT NULL, ADD COLUMN `canspam_accept` mediumtext NOT NULL, ADD COLUMN `canspam_error` mediumtext NOT NULL');
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_spanish set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_german set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_portuguese set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_dutch set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_french set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_italian set signup_maintenance_heading = 'Maintenance Notice', signup_maintenance_info = 'Signups are temporaily disabled. Please try back later.', marketing_group_title = 'Marketing Group', marketing_button = 'Display', marketing_no_group = 'No Group Selected', marketing_choose = 'Please Choose A Marketing Group Above', marketing_notice = 'Marketing Groups May Have Different Incoming Traffic Pages', canspam_heading = 'CAN-SPAM Rules and Acceptance', canspam_accept = 'I have read, understand and agree to the above CAN-SPAM rules.', canspam_error = 'You have not accepted our CAN-SPAM rules.'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
}

try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `target_url` `target_url` VARCHAR(255) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `tid1` `tid1` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `tid2` `tid2` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `tid3` `tid3` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `tid4` `tid4` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `sub_id` `sub_id` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `referring_url` `referring_url` VARCHAR(255) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `split` `split` VARCHAR(128) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `op1` `op1` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `op2` `op2` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `op3` `op3` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `tracking` `tracking` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_sales` CHANGE `ip` `ip` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}




//--
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `paypal` `paypal` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `url` `url` VARCHAR(128) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `fax` `fax` VARCHAR(40) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `phone` `phone` VARCHAR(40) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `country` `country` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `state` `state` VARCHAR(40) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `zip` `zip` VARCHAR(20) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `city` `city` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `address_1` `address_1` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `address_2` `address_2` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `email` `email` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `f_name` `f_name` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `l_name` `l_name` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `company` `company` VARCHAR(128) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_affiliates` CHANGE `payable` `payable` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


//--
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_vartotal` `idev_vartotal` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_order` `idev_order` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var1` `idev_var1` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var1` `tag_var1` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var2` `idev_var2` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var2` `tag_var2` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var3` `idev_var3` VARCHAR(64) NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var3` `tag_var3` VARCHAR(64) NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_config set version = '6.0.4'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

$upgrade_version = '6.0.4';
?>