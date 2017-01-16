<?php
error_reporting(E_ALL);
include "controllers/admin/AdminCaseBackgroundController.php";
$obj = new AdminCaseBackgroundController();
$params = $obj->initContent();



$params['front_image'] = 'img/customImage/android/'.$params['device_android'][0]['android'];
$params['back_image'] = 'products/back.png';
/* $params['fonts'] = 'products/back.png'; */
include "modules/templ.php";

?>
