<?php
	require_once('../../config/config.inc.php');
	require_once('../../config/defines.inc.php');
	require_once('../../config/settings.inc.php');
	$design_id = $_POST['did'];
	//$con = mysql_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_);
	$con = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	$shtml = "<div align='center'><br/>";
	if($design_id != ''){
		$result = mysqli_query($con,"select * from " ._DB_PREFIX_. "custom_design where design_id = '" . trim($design_id) . "'");
		if($row = mysqli_fetch_array($result)){
			$shtml .= "<div style='position:absolute;margin:150px 0 0 250px;display:none;' id='ploader'><img src='" . __PS_BASE_URI__ . 'img/loadingAnimation.gif' . "'/></div>
  <div>
    <div align='center' style='font-size:18px;font-weight:bold;text-decoration:underline;color:#00aff0;'>Case Design Image</div><br/>
    <div align='center'>
      <div id='front_marge_image'><img src='" . __PS_BASE_URI__ . 'img/marge_image/' . $design_id . '__front.png' . "' /></div>
    </div>
  </div>
  <div style='clear:both;'></div>";	
		}
	}
		
	echo $shtml . '</div>';
		
?>
