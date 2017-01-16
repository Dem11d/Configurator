<?php
require_once('../../config/defines.inc.php');
$clipart = _PS_ROOT_DIR_ . '/img/customImage/design_bg/';
unlink($clipart . $_POST['imgname']);
?>