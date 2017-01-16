<?php
require_once('../../config/defines.inc.php');
if($_POST['simage']){
	//$old_url = str_replace(',','/',$_POST['simage']);
	$img_name =  pathinfo($_POST['simage'], PATHINFO_FILENAME);
	$img_ext = pathinfo($_POST['simage'], PATHINFO_EXTENSION);
	
	$old_url = _PS_ROOT_DIR_ . $_POST['simage'];
	$new_id = uniqid();
	$new_url = _PS_ROOT_DIR_.'/img/customImage/'.$new_id.'.'.$img_ext;
	if (!copy($old_url, $new_url)) {echo "-1";}
	else{echo $new_id.'.'.$img_ext;}
}
?>
