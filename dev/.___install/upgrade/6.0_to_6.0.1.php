<?PHP

// 6.0.1 Update
try {
    $db->query('ALTER TABLE `idevaff_archive` ADD COLUMN `referring_url` VARCHAR(64) NOT NULL');
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_sales CHANGE `code` `code` bigint(12) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


function convert_time($old_time) {
    //echo("old time = " . $old_time . "<br/>");
    $str_len = strlen($old_time);
    $year = substr($old_time, 0, 4);
    $day = substr($old_time, 4, $str_len-10);
    $hour = substr($old_time, $str_len-6, 2);
    $minute = substr($old_time, $str_len-4, 2);
    $second = substr($old_time, $str_len-2, 2);
  
    // echo("$year $day $hour $minute $second <br/>");  
    $year_time = mktime(0,0,0,1,0,$year);
    //echo("year time: " . $year_time . "<br/>");
    $new_time = $year_time + $day*24*60*60 + $hour*60*60 + $minute*60 + $second;
    //echo("new time: " . $new_time . "<br/>");

    return($new_time);
}

$result = $db->query("select record, code from idevaff_sales");

if ( $result->rowCount() ) {
    while( $row = $result->fetch()) {
        $old_date = $row['code'];
        $new_date = convert_time($old_date);
        // echo("old_date = $old_date". "<br/>");

        $check_old_date = substr($old_date, 0, 1);

        if ($check_old_date == 2) {
            try {
                $sql = "update idevaff_sales set code='$new_date' where record=" . $row['record'];
                // echo($sql . "<br/>");
                $db->query($sql);
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
        }
    }
}


try {
    $db->query("update idevaff_config set version = '6.0.1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
$upgrade_version = '6.0.1';

?>