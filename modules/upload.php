<?php
require_once('../../config/defines.inc.php');
$filename = $_FILES["fileToUpload"]["name"];
$ext = substr(strrchr($filename, "."), 1);
if(strtolower(trim($ext)) == 'jpg' || strtolower(trim($ext)) == 'png' || strtolower(trim($ext)) == 'gif') {		
	$image_name = uniqid();
	$filename = $image_name . '.' . $ext; 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],_PS_ROOT_DIR_.'/img/customImage/' . $filename)){
		echo $filename;
		die();
	}
	else{
		echo "-10";
		die();
	}
}
else {
	echo '-9';
	die();
}
?>