<?php
	require_once('../../config/config.inc.php');
	require_once('../../config/defines.inc.php');
	require_once('../../config/settings.inc.php');
	$design_id = $_POST['did'];
	//$con = mysql_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_);
	$con = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	$shtml = "<div id='tabs'><ul><li><a href='#tabs-1'>Custom Design Information</a></li><li><a href='#tabs-2'>Added Logo and Text</a></li></ul>";
	if($design_id != ''){
		$result = mysqli_query($con,"select * from " ._DB_PREFIX_. "custom_design where design_id = '" . trim($design_id) . "'");
		
		if($row = mysqli_fetch_array($result)){
			$shtml .= "<div id='tabs-1'><div style='position:absolute;margin:150px 0 0 250px;display:none;' id='ploader'><img src='" . __PS_BASE_URI__ . 'img/loadingAnimation.gif' . "'/></div>
  <div>
    <div align='center' style='font-size:18px;font-weight:bold;text-decoration:underline;color:#00aff0;'>Front Design Image</div>
    <div align='center'>
      <div id='front_marge_image'><img src='" . __PS_BASE_URI__ . 'img/marge_image/' . $design_id . '__front.png' . "' /></div>
      <br/>
	  <div><span onclick=printDiv('front_marge_image'); class='me_button_style'>Print Me</span>&nbsp;&nbsp;<span onclick=makeme300dpi('" . trim($design_id) . "__front'); class='me_button_style'>300 DPI PDF</span></div>
    </div>
  </div>
</div>";
			if($row['front_design_info'] != ''){
				$front_design = json_decode($row['front_design_info'],true);
				$b = 1;
				$shtml .= "<div id='tabs-2'><table>";
				foreach($front_design['objects'] as $fd){ 
					if($fd['type'] == 'text'){
						//here for text
						$shtml .="<tr>
						<td>
							<div><b>Text:&nbsp;</b>" . $fd['text'] . "</div>
							<div><b>Left Space:&nbsp;</b>" . $fd['left'] . "</div>
							<div><b>Right Space:&nbsp;</b>" . $fd['top'] . "</div>
							<div><b>Width:&nbsp;</b>". $fd['width'] . "</div>
							<div><b>Height:&nbsp;</b>".$fd['height']."</div>
							<div><b>Font-Size:&nbsp;</b>".$fd['fontSize']."</div>
							<div><b>Font-Family:&nbsp;</b>".$fd['fontFamily']."</div>
							<div><b>Font Weight:&nbsp;</b>".$fd['fontWeight']."</div>
						</td>
						<td style='padding-left:15px;'>&nbsp;</td>
					</tr>";
					}
					else if($fd['type'] == 'image'){
						//here for image or clipart
						$shtml .= "<div>
					<tr>
						<td><div><img style='width:50%' src='". $fd['src'] . "' /></div><div style='display:none;' id='front_".$b."'><img src='" .$fd['src'] . "' /></div></td>
						<td style='padding-left:15px;'><div><span onclick=printDiv('front_".$b."'); class='me_button_style'>Print Me</span></div></td>
					</tr>
				</div>";
					}
				$b++;
				}
				$shtml .= "</table></div>";
			}
		}
	}
		
	echo $shtml . '</div>';
		
?>
