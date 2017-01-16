<?php
	require_once('../../config/defines.inc.php');
	$uniqid = $_POST['did'];
	$image = $_POST['image'];
    $decoded = base64_decode(str_replace('data:image/png;base64,', '', $image));
    file_put_contents( _PS_ROOT_DIR_.'/img/marge_image/' . $uniqid . "__" . $_POST['side'] . ".png", $decoded);
?>