<?php
class AdminClipartController extends AdminController
{
    public function __construct()    
    {    
         $this->bootstrap = true;
		 parent::__construct();        
    }

    public function initContent()    
    {
        /*here we save uplaod post image*/
		if(isset($_FILES["fileuplaod"]["name"])){
			$filename = $_FILES["fileuplaod"]["name"];
			$ext = substr(strrchr($filename, "."), 1);
			if(strtolower(trim($ext)) == 'jpg' || strtolower(trim($ext)) == 'png' || strtolower(trim($ext)) == 'gif') {		
				$image_name = uniqid();
				$filename = $image_name . '.' . $ext; 
				if(move_uploaded_file($_FILES["fileuplaod"]["tmp_name"],_PS_ROOT_DIR_.'/img/customImage/clipart/' . $filename)){
					//echo 'success';
				}
				else{
					//echo "fail";
				}
			}
			else {
				//echo 'fail';
			}
		}

		/**/
		parent::initContent();       
	    
		$ps__base_url = $this->getPSBaseUrl();
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';
		
		$clipart_coll = array();
		$did = 0;
		if ($handle2 = opendir(_PS_ROOT_DIR_ . '/img/customImage/clipart')) {
			while (false !== ($entry = readdir($handle2))) {
				if(isset($entry) && $entry !='.' && $entry !='..'){
					$clipart_coll[] = array(
						'clipart'		=> $entry,
						'id'			=> 'str_' . $did
					);
				}
				$did++;
			}
		closedir($handle2);
		}
		
		$this->context->smarty->assign(array(
			'clipart_array'	=> $clipart_coll,
			'root_path'		=> $ps__base_url,
			'module_path'	=> $base_url_module,
			'token'			=> $this->token
		));
		
		$this->setTemplate('clipart.tpl');
    }
	public function getPSBaseUrl()
	{
		$base_url = '';
		$result = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'shop_url');
		if(count($result) > 0){
			$domian = 'http://' . $result['domain'];
			$physical_uri = $result['physical_uri'];
			$base_url = $domian . $physical_uri;
		}
		return $base_url;
	}	
}
?>