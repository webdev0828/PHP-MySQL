<?php
include_once 'API/config.php';

// $idev = 106;
// $offer_id = 209;
// $q_db_get_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 0');
// $q_db_get_postback->execute(array($idev, $offer_id));
// $db_get_postback_url = $q_db_get_postback->fetchAll(PDO::FETCH_COLUMN); // returns array of enabled per offer GET urls
// // get enabled GET global postback start
// $q_db_get_global_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 0');
// $q_db_get_global_postback->execute(array($idev, 0));
// $db_get_global_postback_url = $q_db_get_global_postback->fetchAll(PDO::FETCH_COLUMN); // returns global GET postback, if enabled, in array
// // get enabled GET global postback end
// $db_get_postback_url = array_merge($db_get_postback_url, $db_get_global_postback_url); // merge with global



// print_r($db_get_postback_url);
?>