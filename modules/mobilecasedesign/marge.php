<?php
	require_once('../../config/settings.inc.php');
	$front_info = '';
	//$back_info = '';
	try{
		if(isset($_POST['arrayobjectfront'])){$front_info = $_POST['arrayobjectfront'];}
		//if(isset($_POST['arrayobjectback'])){$back_info = $_POST['arrayobjectback'];}
		$con = mysql_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_);
		if (!$con){die('Could not connect: ' . mysql_error());}
		mysql_select_db(_DB_NAME_, $con);
		$sql = "insert into " . _DB_PREFIX_ . "custom_design(design_id,front_design_info) values('" . $_POST['did'] . "', '" . addslashes($front_info) . "')";
		mysql_query($sql ,$con);
	}
	catch (Exception $e) {
		echo $e;
	}
?>