<?php

include_once 'API/config.php';

			$record			= $db->query("SHOW TABLE STATUS LIKE 'idevaff_iptracking'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
			$secret 		= mt_rand();
			$clickid 		= hash_hmac("sha256", $record, $secret);

            $insert_clickid = $db->prepare("insert into idevaff_clickid (id, clickid_hash) values (?, ?)");
            $click_data 	= array((string) $record, (int) $clickid);
            $insert_clickid->execute($click_data);


?>