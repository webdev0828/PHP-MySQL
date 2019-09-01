<?PHP
	
	$current_memory = ini_get('memory_limit');
	$current_memory = preg_replace('/\D/', '', $current_memory);
	if ($current_memory <= '512') { ini_set('memory_limit','1024M'); }
	
	ini_set('max_execution_time','120');
	
	phpinfo();

?>