<?php
	require_once('../../config/config.inc.php');
	require_once('../../config/defines.inc.php');
	require_once('../../config/settings.inc.php');
	$design_id = $_POST['design_id'];
	$source_dir = $design_id . '.png';
	$desc_dir = $design_id . '.pdf';
	shell_exec("convert -units PixelsPerInch " . $source_dir . " -resample 300 " . $desc_dir);
	echo $design_id . '.pdf';
?>
