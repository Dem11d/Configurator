<?php
require_once('../../config/defines.inc.php');
$clipart = _PS_ROOT_DIR_ . '/img/customImage/clipart/';
unlink($clipart . $_POST['imgname']);
?>