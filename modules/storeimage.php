<?php
echo json_encode(imageUpload());

function imageUpload(){
	require_once('../config/defines.inc.php');
	$filename = $_FILES["fileToUpload"]["name"];
	$ext = substr(strrchr($filename, "."), 1);
	if(strtolower(trim($ext)) == 'jpg' || strtolower(trim($ext)) == 'png' || strtolower(trim($ext)) == 'gif') {
		$image_name = uniqid();
		$filename = $image_name . '.' . $ext;
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],'../img/customImage/' . $filename)){
			return $filename;
		}
		else{
			return "-10";
		}
	}
	else {
		return '-9';
	}
}
?>
