<?PHP
$q = $db->query("select version from idevaff_config");
$config_patch = $q->fetch();
$check_version = $config_patch['version'];

if ($check_version == '7.1') {
    // ---------------------------------------------------------
    // UPDATE TO 7.2
    // ---------------------------------------------------------
    // Update idevaff_config table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_config ADD `link_type` varchar(20) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `main_chart` int(2) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `main_chart_display` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `archive_comm` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `max_comm_amt` decimal(20,2) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `max_comm_email` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `max_comm_use` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `private` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config ADD `email_tier_referral` int(1) NOT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_config set link_type = 'none', main_chart = '7', main_chart_display = '2', archive_comm = '0', max_comm_amt = '0.00', max_comm_email = '0', max_comm_use = '0', private = '0', email_tier_referral = '0'");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_config DROP paypal_referral_code");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


    // ---------------------------------------------------------
    // Update idevaff_iptracking table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_iptracking ADD INDEX `stamp` (`stamp`)");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_iptracking` CHANGE `refer` `refer` VARCHAR(255) NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


    // ---------------------------------------------------------
    // Update idevaff_affiliates table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_affiliates ADD `ip` varchar(64) NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // Update idevaff_form_fields_custom table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_form_fields_custom ADD `display_payment` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_form_fields_custom ADD `display_invoice` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_form_fields_custom ADD `display_record` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE idevaff_form_fields_custom ADD `edit` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // ADD idevaff_logs_admin table
    // ---------------------------------------------------------
    $db->query("CREATE TABLE IF NOT EXISTS idevaff_logs_admin (
      id int(255) NOT NULL auto_increment,
      username varchar(128) character set utf8 NOT NULL default '',
      ip_address varchar(64) character set utf8 NOT NULL default '',
      code int(40) NOT NULL,
      message varchar(255) character set utf8 NOT NULL default '',
      PRIMARY KEY (id)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    // ---------------------------------------------------------
    // ADD idevaff_tc_log table
    // ---------------------------------------------------------
    $db->query("CREATE TABLE IF NOT EXISTS idevaff_tc_log (
      update_record int(255) NOT NULL,
      aff_id int(255) NOT NULL,
      stamp int(40) NOT NULL,
      KEY update_record (update_record)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    // ---------------------------------------------------------
    // ADD idevaff_tc_updates table
    // ---------------------------------------------------------
    $db->query("CREATE TABLE IF NOT EXISTS idevaff_tc_updates (
      record int(255) NOT NULL auto_increment,
      stamp int(40) NOT NULL,
      terms mediumtext NOT NULL,
      PRIMARY KEY (record)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    // ---------------------------------------------------------
    // Update ALL email tables
    // ---------------------------------------------------------
    $get_email_language_tables = $db->query("select table_name from idevaff_email_language_packs");
    if ($get_email_language_tables->rowCount()) {
        while ($qry = $get_email_language_tables->fetch()) {
            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " ADD `admin_max_comm_exceeded_sub` text NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " ADD `admin_max_comm_exceeded_body` text NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " ADD `aff_new_tier_sub` text NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " ADD `aff_new_tier_body` text NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("update idevaff_email_" . $qry['table_name'] . " set admin_max_comm_exceeded_sub = 'Rejected Commission on Your Site Affiliate Program', admin_max_comm_exceeded_body = 'Dear Admin,\n\nA new commission was rejected.  The commission that attempted to come in exceeded your maximum allowable commission amount.  The maximum commission amount allowed is adjustable in your iDevAffiliate admin center on the General Settings (menu at top) then Fraud Control page.\n\nIs this a valid commission?\nConsider raising the limit on your maximum commission amount allowed or disable this feature.  You will probably want to create this commission manually now for the affiliate by clicking the Create link on the left menu of your admin center in the Commissions section.\n\nIs this an invalid commission?\nYou will probably want to investigate the sale.  The details for the sale and commission are below.  This commission did not get put into the system so there is nothing to do where iDevAffiliate is concerned.\n\nRejected Commission Details', aff_new_tier_sub = 'You Have A New Tier Account Signup!', aff_new_tier_body = 'Dear _username_,\n\nA new account has signed up in your tier.  You will now be earning a tier commission each time this new account earns a commission!'");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
        }
    }

    // ---------------------------------------------------------
    // Update idevaff_sales table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE `idevaff_sales` CHANGE `code` `code` BIGINT(12) NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // Update idevaff_archive table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE `idevaff_archive` CHANGE `stamp` `stamp` BIGINT(12) NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // Update idevaff_integration table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_vartotal` `idev_vartotal` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_order` `idev_order` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var1` `idev_var1` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `cart_var1` `cart_var1` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var1` `tag_var1` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var2` `idev_var2` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `cart_var2` `cart_var2` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var2` `tag_var2` VARCHAR(64) NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `idev_var3` `idev_var3` VARCHAR(64) NULL DEFAULT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `cart_var3` `cart_var3` VARCHAR(64) NULL DEFAULT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `tag_var3` `tag_var3` VARCHAR(64) NULL DEFAULT NULL");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("ALTER TABLE `idevaff_integration` CHANGE `option_1` `option_1` BLOB NULL DEFAULT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }


    // ---------------------------------------------------------
    // ADD idevaff_private table
    // ---------------------------------------------------------
    $db->query("CREATE TABLE IF NOT EXISTS idevaff_private (
      id int(255) NOT NULL auto_increment,
      type int(1) NOT NULL default '0',
      code varchar(64) character set utf8 NOT NULL default '',
      expires int(40) NOT NULL default '0',
      PRIMARY KEY (id)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    // ---------------------------------------------------------
    // Update language packs
    // ---------------------------------------------------------

    $get_language_tables = $db->query("select table_name from idevaff_language_packs");
    if ($get_language_tables->rowCount()) {
        while ($qry = $get_language_tables->fetch()) {
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_info_one");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_info_two");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_info_three");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_heading_name");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_heading_email");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_one");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_two");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_three");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_insert");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_footer");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_chars_left");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_note_heading");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_note_one");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_note_two");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_note_three");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_note_four");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_button");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_footer_invalid");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_message_invalid");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_subject_invalid");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_1_invalid_email");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_1_invalid_name");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_2_invalid_email");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_2_invalid_name");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_3_invalid_email");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_recip_3_invalid_name");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_success_one");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_success_two");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_send_again");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_send_again_sec");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_footer_heading");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_footer_info");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_message_heading");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_message_info");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_subject_heading");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP help_friends_subject_info");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `edit_custom_button` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_heading` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_info` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_required_heading` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_code_title` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_button` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_error_title` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_error_invalid` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `private_error_expired` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("update idevaff_language_" . $qry['table_name'] . " set edit_custom_button = 'Edit Answer', private_heading = 'Private Signup', private_info = 'Our affiliate program is not open to the general public and requires a signup code to join.  Information about how to obtain a signup code should be here.', private_required_heading = 'Signup Code Required', private_code_title = 'Enter Signup Code', private_button = 'Submit Code', private_error_title = 'Invalid Signup Code Provided', private_error_invalid = 'The signup code you have provided is invalid.', private_error_expired = 'The signup code you have provided has expired and is no longer valid.'");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
        }
    }

    // ---------------------------------------------------------
    // Update idevaff_language_packs
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_language_packs ADD `user_created` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_language_packs set user_created = '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }



    // ---------------------------------------------------------
    // Update idevaff_email_language_packs
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_email_language_packs ADD `user_created` int(1) NOT NULL default '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_email_language_packs set user_created = '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // ADD idevaff_deleted_affiliates table
    // ---------------------------------------------------------
    try {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_deleted_accounts LIKE idevaff_affiliates");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // ADD idevaff_deleted_sales table
    // ---------------------------------------------------------
    try {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_deleted_sales LIKE idevaff_sales");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_config set version = '7.2'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
}
?>