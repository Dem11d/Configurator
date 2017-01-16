<?php
	require_once('../../config/settings.inc.php');
	$design_id = $_POST['did'];
	$id_product = $_POST['id_product'];
	$con = mysql_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_);
	if (!$con){die('Could not connect: ' . mysql_error());}
	mysql_select_db(_DB_NAME_, $con);
	
	/*get the lang id*/
	$id_lang = 1;
	if(isset($_POST['lang_id'])){
		$id_lang = $_POST['lang_id'];
	}
	
	/*Here Done Variation Work*/
	if(isset($_POST['custom_options']) && $_POST['custom_options'] != ''){
		$var_custom = $_POST['custom_options'];
		$attrs =  explode(',',$var_custom);
		if(count($attrs) > 0){
			foreach($attrs as $attr){
				$id_attrs =  explode('|',$attr);
				$id_attr_group = $id_attrs[0];
				$id_attr = $id_attrs[1];
				mysql_query("INSERT INTO " ._DB_PREFIX_. "custom_product_attributes(id_variation,id_attribute_group,id_attribute,id_lang) VALUES('".$design_id."',".(int)$id_attr_group.",".(int)$id_attr."," .(int)$id_lang. ")",$con);
			}
		}
	}
	/************************/
	
	/**/
	//here we insert dammy custom variation
	$attribute_group_id = 0;
	$attribute_id = 0;
	$paId = 0;
	$custom_design_price = 0.00;
	//here we dummy insert into variation table
	if($design_id != ''){
		/********************* Here find the Variation Group ID **************************/
		$result = mysql_query("select * from " ._DB_PREFIX_. "attribute_group_lang where name = 'custom' and public_name = 'custom'");
		if($row = mysql_fetch_array($result)){
			//here exist onetime so return group id
			$attribute_group_id  = $row['id_attribute_group'];
		}
		else{
			//not exist so insert and return group id
			mysql_query("INSERT INTO " ._DB_PREFIX_. "attribute_group(is_color_group,position) VALUES('0','100')",$con);
			$attribute_group_id = mysql_insert_id();
			mysql_query("INSERT INTO " ._DB_PREFIX_. "attribute_group_lang(id_attribute_group,id_lang,name,public_name) VALUES('".(int)$attribute_group_id."','".$id_lang."','custom','custom')",$con);
		}
		/**********************Here find the attubute id ******************************/
		if($attribute_group_id > 0){
			mysql_query("INSERT INTO " ._DB_PREFIX_. "attribute(id_attribute_group,position) VALUES('".(int)$attribute_group_id."','100')",$con);
			$attribute_id = mysql_insert_id();
			if($attribute_id > 0){
				mysql_query("INSERT INTO " ._DB_PREFIX_. "attribute_lang(id_attribute,id_lang,name) VALUES('".(int)$attribute_id."','".$id_lang."','".$design_id."')",$con);
			}
		}
		/*********************************************************************************/
		
		if($attribute_id > 0){
			$sqlpa = "INSERT INTO " ._DB_PREFIX_. "product_attribute(id_product,wholesale_price,price,quantity) VALUES('" . (int)$id_product . "','5.23','5.23','100')";
			mysql_query($sqlpa,$con);
			$paId = mysql_insert_id();
		}
		if($paId > 0){
		mysql_query("INSERT INTO " ._DB_PREFIX_. "product_attribute_combination(id_attribute,id_product_attribute) VALUES('" . (int)$attribute_id . "','" . (int)$paId . "')",$con);
		mysql_query("INSERT INTO " ._DB_PREFIX_. "stock_available(id_product,id_product_attribute,id_shop,id_shop_group,quantity,depends_on_stock,out_of_stock) VALUES('" . (int)$id_product . "','" . (int)$paId . "','1','0','10','0','2')",$con);
		mysql_query("INSERT INTO " ._DB_PREFIX_."product_attribute_shop(id_product,id_product_attribute,id_shop,price) VALUES('" . (int)$id_product . "','" . (int)$paId . "','1','".$custom_design_price."')",$con);
		}
	}
	//
	echo $paId;
	
?>