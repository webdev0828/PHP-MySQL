<?php
include_once 'API/config.php';
$clickid = $db->query("SHOW TABLE STATUS LIKE 'idevaff_iptracking'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];

echo $clickid;
?>