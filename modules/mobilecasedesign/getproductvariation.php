<?php
	require_once('../../config/config.inc.php');
	require_once('../../config/defines.inc.php');
	require_once('../../config/settings.inc.php');
	$con = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	$html = '';
	$product_id = $_POST['id_product'];
	if($product_id != ''){
	/*custom variation*/
		$array_custom_var = array();
		$query_get_groups = "SELECT cag.id_attribute_group,agl.public_name from " . _DB_PREFIX_ . "custom_attribute_group cag inner join " . _DB_PREFIX_ . "attribute_group_lang agl on agl.id_attribute_group = cag.id_attribute_group where cag.id_product =" . (int)$product_id; 
		$product_groups = mysqli_query($con,$query_get_groups);
		while($row = mysqli_fetch_array($product_groups)){
			$query_get_attrs = "SELECT ca.id_attribute,al.name from " . _DB_PREFIX_ . "custom_attributes ca inner join " . _DB_PREFIX_ . "attribute_lang al on al.id_attribute = ca.id_attribute and al.id_lang = " . (int)$_POST['lang_id']. " where ca.id_product =" . (int)$product_id. " AND ca.id_attribute_group = " . (int)$row['id_attribute_group'] . " order by al.name ASC";
			$product_atts = mysqli_query($con,$query_get_attrs);
			$html .= "<td>";
				$html .= "&nbsp;" . $row['public_name'] . ":";
				$html .= "<select class='custom_options' name=option[".$row['id_attribute_group']."]>";
					while($rowxx = mysqli_fetch_array($product_atts)){
						$html .= "<option value=".$row['id_attribute_group']."|".$rowxx['id_attribute'].">".$rowxx['name']."</option>";
					}
				$html .= "</select>";
			$html .= "</td>";
		
		}
	}
			
		/**/
	
	echo $html;
		
?>
