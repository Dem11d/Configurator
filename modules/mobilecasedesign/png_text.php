<?php
require_once('../../config/defines.inc.php');
$stxt = explode("|",$_POST['str']);
$count = count($stxt);
$str = '';
$uniqId = $_GET['guid'];

foreach($stxt as $ztxt){
	if($str !='' && $count != 0){
		$str = $str . chr(0x0A) . $ztxt;
	}
	else if($str !='' && $count = 0){
		$str = $str . $ztxt;
	}
	else{
		$str = $ztxt;
	}
	$count = $count - 1;
}
//
$font = _PS_ROOT_DIR_.'/modules/tshirtdesign/font/'.getFontName($_GET['ft']);
$text_color = $_GET['col'];
$back_color = $_GET['bg'];
$fontsize = 50;
$quotes = array($str);
/*Background*/
$r_bg = hexdec("0x".substr($back_color,0,2));
$g_bg = hexdec("0x".substr($back_color,2,2));
$b_bg = hexdec("0x".substr($back_color,4,2));

/*Text Color Change*/
$r_col = hexdec("0x".substr($text_color,0,2));
$g_col = hexdec("0x".substr($text_color,2,2));
$b_col = hexdec("0x".substr($text_color,4,2));
//
$pos = rand(0,count($quotes)-1);
$quote = wordwrap($quotes[$pos],20);
$dims = imagettfbbox($fontsize, 0, $font, $quote);
$width = ($dims[4] - $dims[6]) + 10;
$height = $dims[3] - $dims[5] + 10;
$image = imagecreatetruecolor($width,$height);
$bgcolor = imagecolorallocate ($image, $r_bg, $g_bg, $b_bg);
$fontcolor = imagecolorallocate ($image,$r_col,$g_col,$b_col);
imagecolortransparent($image, $bgcolor);
imagefilledrectangle($image, 0, 0, $width, $height, $bgcolor);
$x = 0; 
$y = $fontsize;
imagettftext($image, $fontsize, 0, $x, $y, $fontcolor, $font, $quote);
imagepng($image);

$image_name = $uniqId;
imagepng($image, _PS_ROOT_DIR_.'/img/customImage/'.$image_name.'.png');
imagedestroy($image);
function getFontName($sCode){
	return "$sCode".".ttf";
}
function isNewLine(){
	$string = $_GET['str'];
    $pos = strpos($string, "|");
    return $pos;
}

?>
