<?PHP

if(isset($_POST['emailAuth']) && $_POST['emailAuth'] == "yes")
{
	include_once("../../API/config.php");
	
	$_SESSION[$install_directory_name.'_expire'] = time() + $expire_time;
	
	$data['error'] = "";
	$data['success']	= "";
	$process = true;
	
	if (!isset($_POST['subject']) || ($_POST['subject'] == "")) {
		$data['error'] ="Error! Please enter a subject for your email.";
		$process = false;
	}
	
	if (!isset($_POST['message']) || ($_POST['message'] == "")) {
		$data['error'] ="Error! Please enter a message for your email.";
		$process = false;
	}
	
	if ($process == true) {
		
		
		
		if ($_POST['choice'] == "approved") { $who = 1; }
		if ($_POST['choice'] == "notapproved") { $who = 0; }
		
		if ($_POST['choice'] == "all") {
			$get_user=$db->query("select id, username, password, email, f_name, l_name from idevaff_affiliates");
		} else {
                    $get_user=$db->prepare("select id, username, password, email, f_name, l_name from idevaff_affiliates where approved = ?");
                    $get_user->execute(array($who));
		}
		
		$data['success'] = $get_user->rowCount();	
	}
	
	echo json_encode($data);
}
?>