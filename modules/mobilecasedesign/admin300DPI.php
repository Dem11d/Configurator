<?php
	require_once('../../config/config.inc.php');
	require_once('../../config/defines.inc.php');
	require_once('../../config/settings.inc.php');
	$design_id = $_POST['design_id'];
	$source_dir = $_SERVER['REQUEST_SCHEME'] . '//' . $_SERVER['SERVER_NAME'] .  __PS_BASE_URI__ . 'img/marge_image/' . $design_id . '.png';
	$desc_dir = _PS_ROOT_DIR_.'/img/marge_image/300DPI/' . $design_id . '.pdf';	
	shell_exec("convert -units PixelsPerInch " . $source_dir . " -resample 300 " . $desc_dir);
	echo $_SERVER['REQUEST_SCHEME'] . '//' . $_SERVER['SERVER_NAME'] . __PS_BASE_URI__ . 'img/marge_image/300DPI/' . $design_id . '.pdf';
	
	function getURL(){
		$base_dir = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
		$doc_root = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
		$base_url = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
		$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
		$port = $_SERVER['SERVER_PORT'];
		$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
		$domain = $_SERVER['SERVER_NAME'];
		$full_url = "$protocol://{$domain}{$disp_port}";
		return $full_url;
	}
?>
