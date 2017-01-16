
<?php
//if(!empty($_POST['data'])){
//    $data = $_POST['data'];
//    $fname = mktime() . ".txt";//generates random name
//
//    $file = fopen("upload/" .$fname, 'w');//creates new file
//    fwrite($file, $data);
//    fclose($file);
//}

if(!empty($_POST['data'])){
$data = base64_decode($_POST['data']);
$name = $_POST['name'];
$path = "../orders/".$name.".pdf";
//	mkdir("../orders", 0777);
	if(file_exists($path))
	unlink($path);
file_put_contents($path, $data);
} else {
echo "No Data Sent";
}

exit();

//$pdf = $_POST[pdf];
//echo print_r($pdf);
//echo gettype($pdf);

?>


