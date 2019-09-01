<?
include_once 'API/config.php';

$record 		= $db->query("SHOW TABLE STATUS LIKE 'idevaff_sales'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
echo $record;
?>