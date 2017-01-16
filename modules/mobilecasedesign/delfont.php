<?php
require_once('../../config/defines.inc.php');
$clipart = _PS_ROOT_DIR_ . '/modules/tshirtdesign/font/';
unlink($clipart . $_POST['fontname']);
?>