<?php
include_once 'API/config.php';
// grep 'approvedtest.php' /var/log/nginx/sublimerevenue.com.access.log | less

// CONFIG START

// already set vars in script - get rid of this when done
$idev			= "106";
$payout			= "8.99";
$setme			= "1";
$timestamp		= time();
$sub_id			= "test0";
$tid1			= "test1";
$tid2			= "test2";
$tid3			= "test3";
$tid4			= "test4";
$country_code	= "XX";
//$oid 			= "335"; // fictive as the rest, just for the test
// CONFIG END - will not need this for vars are defined in the sales reporting script.

// POSTBACK TO COPY TO SALES REPORTING SCRIPT START
// GET DATA START
// get record and postback url start
//$record			 = "5"; // test value
$record			 = $db->query("SHOW TABLE STATUS LIKE 'idevaff_sales'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
$q_db_get_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and postback_url IS NOT NULL and state = 1 and method = 0');
$q_db_get_postback->execute([$idev]);
$db_get_postback_url = $q_db_get_postback->fetchAll(PDO::FETCH_COLUMN); // returns array of enabled get urls

$q_db_post_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and postback_url IS NOT NULL and state = 1 and method = 1');
$q_db_post_postback->execute([$idev]);
$db_post_postback_url = $q_db_post_postback->fetchAll(PDO::FETCH_COLUMN); // returns array of enabled post urls
// get record and postback url start

// get offer id from src1 and src2 on sale report and use it for postback calls start
$src1 = isset($_GET['src1']) ? $_GET['src1'] : '';
$src2 = isset($_GET['src2']) ? $_GET['src2'] : '';
// get offer id from src1 and src2 on sale report and use it for postback calls start do not include in code
// part already in code
    if ($src2) {
        if ($src1 == 1) {
            $table = 'banners'; // direct offers banners
            $col = "number";
        }
        if ($src1 == 2) {
            $table = "ads";
            $col = "id";
        }
        if ($src1 == 3) {
            $table = 'links'; // smart links / direct offer links
            $col = "id";
        }
        if ($src1 == 4) {
            $table = 'htmlads'; // popunders
            $col = "id";
        }
        if ($src1 == 5) {
            $table = 'email_templates'; // backoffers
            $col = "id";
        }
        if ($src1 == 6) {
            $table = "peels";
            $col = "number";
        }
        if ($src1 == 7) {
            $table = "lightboxes";
            $col = "number";
        }
// part already in code
        $qoid  = $db->prepare('SELECT grp FROM idevaff_' . $table . ' WHERE ' . $col . ' = ? LIMIT 1');
        $qoid->execute([$src2]);
        $oquery= $qoid->fetch();
        $oid   = $oquery['grp'];
        if ($oid >= 3) {
        $offer_id = $oquery['grp'];
        } else {
        $offer_id = 0;
        }
} // part already in code
// get offer id from src1 and src2 on sale report and use it for postback end
// GET DATA END

// rewrite postback url with actual data start
$notify_get_postback_urls = str_replace(
  array('[commission_id]', '[payout]', '[status]', '[timestamp]', '[sub_id]', '[tid1]', '[tid2]', '[tid3]', '[tid4]', '[geo]', '[offer_id]', '[click_id]', '&amp;'),
  array($record, $payout, $setme, $timestamp, $sub_id, $tid1, $tid2, $tid3, $tid4, $country_code, $offer_id, $click_id, '&'), 
  $db_get_postback_url
);
$notify_post_postback_urls = str_replace(
  array('[commission_id]', '[payout]', '[status]', '[timestamp]', '[sub_id]', '[tid1]', '[tid2]', '[tid3]', '[tid4]', '[geo]', '[offer_id]', '[click_id]', '&amp;'),
  array($record, $payout, $setme, $timestamp, $sub_id, $tid1, $tid2, $tid3, $tid4, $country_code, $offer_id, $click_id, '&'), 
  $db_post_postback_url
);
$postback_post_bases = preg_replace('/\\?.*/', '', $notify_post_postback_urls);
$postback_post_query_strings = str_replace($postback_post_bases, '', $notify_post_postback_urls);
// rewrite postback url with actual data end


// curl notify $_GET start
foreach ($notify_get_postback_urls as $postback_get_url) { // test!!
// check, if a successful notification about the sale already exists
$chcek_get_duplicate = $db->prepare('select record from idevaff_postbacks_logs where record = ? and result = 1 and postback_url = ?');
$chcek_get_duplicate->execute(array($record, $postback_get_url));
$number_of_all_get_rows = $chcek_get_duplicate->fetchALL();
$number_of_get_rows     = count($number_of_all_get_rows);
    if (count($notify_get_postback_urls) > 0 && $number_of_get_rows == 0) { // if _get urls exist and no records for this commission exist do foreach
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $postback_get_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
// postback log entry start
$postback_log_entry = $db->prepare('insert into idevaff_postbacks_logs (record, acct_id, grp, postback_url, status, method, result, http_status, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$postback_log_entry->execute(array($record, $idev, $offer_id, $postback_get_url, $setme, 0, $result, $http_status, $timestamp)); // Note: 0 = global, number = offer id, NULL = no offer id (impossible)
// postback log entry end
    } 
}
// curl notify $_GET end
// curl notify $_POST start
$i = 0;
foreach ($notify_post_postback_urls as $postback_post_url) { // test!!
$chcek_post_duplicate = $db->prepare('select record from idevaff_postbacks_logs where record = ? and result = 1 and postback_url = ?');
$chcek_post_duplicate->execute(array($record, $postback_post_url));
$number_of_all_post_rows = $chcek_post_duplicate->fetchALL();
$number_of_post_rows     = count($number_of_all_post_rows);
    if (count($notify_post_postback_urls) > 0 && $number_of_post_rows == 0) { // if _post urls exist and no records for this commission exist do foreach
        $ch = curl_init($postback_post_bases[$i]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postback_post_query_string[$i]);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
// postback log entry start
$postback_log_entry = $db->prepare('insert into idevaff_postbacks_logs (record, acct_id, grp, postback_url, status, method, result, http_status, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$postback_log_entry->execute(array($record, $idev, $offer_id, $postback_post_url, $setme, 1, $result, $http_status, $timestamp)); // Note: 0 = global, number = offer id, NULL = no offer id (impossible)
// postback log entry end
    }
    $i++;
}
// curl notify $_POST end


// POSTBACK TO COPY TO SALES REPORTING SCRIPT END




// TODO: script with cron to check for result 0 and run the same url and write to log again with new result, also email affs about each non-successful notification!
/*
case - NB! check if has success about the same record before checking all records in point 1 - this is to avoid wasting resources on not being able to insert a record when it finds uncuccessful record but already inserted anew as successful because it is unique.

Should work like this:
1. Connect to idevaff_postbacks_logs table and select all unique urls where result = 0 and records are unique if postback_status is enabled (turned on)
Find way to filter till complete uniqueness of url (record id (think of cases for multi postback or single global)) then send for processing
2. Try to notify each unique URL again and on success insert a new record with the same column data and new result and http status 
should do count and while array has values do while loop like so - while count is > 0 (has records), initialize curl notification on each cron run where record is unique and if there is NO db row for the same record with result 1 and http status 200 (run every hour)
TODO: per offer multiple postbacks (save without page refresh but rather with js notification as the copy url) for if they promote the same thing over different sources, possibly add offer id in postbacks and postback logs and check should aslo chekc by record
/includes/validate.php - add offer id column on signup, if global - offerid = 0, allow update, edit and delete per offer postbacks.
TODO: all postbacks page:

DataTables table with all offerids and names | URL
On unapproval script - make it notify with type = 0
// type is for approval or unapproval
*/

// write to log works, just adjust vars before implementing, also add ping in account stats
// tail -F /var/log/nginx/sublimerevenue.com.access.log | grep "postback_script_name.php" to track successful notifications



$date = gmdate("Y-m-d H:i:s e", $timestamp);

echo $db_postback_url;
echo "<br>";echo "<br>";echo "URL for cURL to notify: ";
print_r($postback_post_query_strings);
echo "<br>";echo "<br>";echo "status code: ";
echo $http_status;
echo "<br>";echo "<br>";echo "result code: ";
echo $result;
echo "<br>";echo "<br>";echo "result date: ";
echo $date;
echo "<br>";echo "<br>";echo "result duplicate: ";
echo $number_of_all_rows; echo " | "; echo $number_of_rows;
echo "<br>";echo "<br>";echo "oid: ";
echo $oid; echo " | real offer id: "; echo $offer_id;
echo "<br>";echo "<br>";echo "method: ";
echo $method;
echo "<br>";echo "<br>";echo "POST script: ";
echo $postback_post_base;
echo "<br>";echo "<br>";echo "POST query string: ";
echo $postback_post_query_string;

?>