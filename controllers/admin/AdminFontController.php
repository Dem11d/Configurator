<?php
class AdminFontController
{
    public function __construct()
    {
         $this->bootstrap = true;
		 //parent::__construct();
    }

    public function initContent()
    {
        /*here we save uplaod post image*/
		if(isset($_FILES["fileuplaod"]["name"])){
			$filename = $_FILES["fileuplaod"]["name"];
			$ext = substr(strrchr($filename, "."), 1);
			if(strtolower(trim($ext)) == 'ttf') {
				//$image_name = uniqid();
				//$filename = $image_name . '.' . $ext;
				if(move_uploaded_file($_FILES["fileuplaod"]["tmp_name"],_PS_ROOT_DIR_.'/modules/mobilecasedesign/font/' . $filename)){
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
		//parent::initContent();

		$ps__base_url = $this->getPSBaseUrl();
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';

		$ax = 0;
		$font_coll = array();
		if ($handle = opendir(_PS_ROOT_DIR_ . '/modules/mobilecasedesign/font/')) {
			while (false !== ($entry = readdir($handle))) {
				if(isset($entry) && $entry !='.' && $entry !='..'){
					$font_coll[] = array(
						'font'		=> $entry,
						'id'		=> 'str_' . $ax
					);
				}
				$ax++;
			}
		closedir($handle);
		}

		$this->context->smarty->assign(array(
			'font_array'	=> $font_coll,
			'root_path'		=> $ps__base_url,
			'module_path'	=> $base_url_module,
			'token'			=> $this->token
		));

		$this->setTemplate('font.tpl');
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
