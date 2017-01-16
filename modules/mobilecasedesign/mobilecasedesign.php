<?php
/*
Mobile Case Customization Module
Developed By SolverCircle
copyright: SolverCircle
*/

if (!defined('_PS_VERSION_'))
	exit;

class MobileCaseDesign extends Module
{
	public function __construct()
	{
		$this->name = 'mobilecasedesign';
		$this->tab = 'front_office_features';
		$this->version = '1.1';
		$this->author = 'SolverCircle';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Mobile Case Customization');
		$this->description = $this->l('Help to Design Your Own Mobile Case');
		$this->ps_versions_compliancy = array('min' => '1.5.6.1', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		if (!parent::install())
			return false;
		return $this->alterTable('add') && $this->registerHook('displayAdminProductsExtra') && $this->registerHook('backOfficeHeader') && $this->registerHook('displayBackOfficeHeader') && $this->registerHook('actionProductUpdate') && $this->registerHook('actionProductAdd') && $this->registerHook('header') && $this->registerHook('footer') && $this->registerHook('displayProductButtons') && $this->registerHook('orderConfirmation') && $this->registerHook('displayBackOfficeFooter')&& $this->registerHook('displayFooter') && Configuration::updateValue('MOBILECASE_DESIGN', 'Mobile-Case Customization');
	}

	public function uninstall()
	{
		return parent::uninstall() && $this->alterTable('remove'); //&& Configuration::deleteByName('TSHIRT_DESIGN');
	}
	
	/*Add JS or CSS into Module Settings page*/	
	public function hookBackOfficeHeader($params){
    	$this->setMedia();
		$this->context->controller->addJS($this->getPathUri(). 'js/jscolor.js');
	}
	public function hookDisplayBackOfficeHeader($params){
      $this->hookBackOfficeHeader($params);    
  	}
	/**/	
	/*Admin Settings Page*/
	public function getContent()
	{
		$html = '';
		/* Update values in DB */
		if (Tools::isSubmit('SubmitMobileDesignSettings'))
		{
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT'));
			Configuration::updateValue('PS_MOBILECASE_BORDER', (string)Tools::getValue('PS_MOBILECASE_BORDER'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_FONTCOLOR', (string)Tools::getValue('PS_MOBILECASE_FONTCOLOR'));
			Configuration::updateValue('PS_MOBILECASE_BG', (string)Tools::getValue('PS_MOBILECASE_BG'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_TOP_UNDERLINE', (string)Tools::getValue('PS_MOBILECASE_TOP_UNDERLINE'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT', (string)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_CART_TEXT_COLOR', (string)Tools::getValue('PS_MOBILECASE_CART_TEXT_COLOR'));
			Configuration::updateValue('PS_MOBILECASE_CART_BUTTON_BG_COLOR', (string)Tools::getValue('PS_MOBILECASE_CART_BUTTON_BG_COLOR'));
			Configuration::updateValue('PS_MOBILECASE_UPLOAD_COLOR', (string)Tools::getValue('PS_MOBILECASE_UPLOAD_COLOR'));
			Configuration::updateValue('PS_MOBILECASE_UPLOAD_BG_COLOR', (string)Tools::getValue('PS_MOBILECASE_UPLOAD_BG_COLOR'));
			Configuration::updateValue('PS_MOBILECASE_CUSTOMIZE_IMAGE_PRICE', (float)Tools::getValue('PS_MOBILECASE_CUSTOMIZE_IMAGE_PRICE'));
			Configuration::updateValue('PS_MOBILECASE_BACK_TEXT', (string)Tools::getValue('PS_MOBILECASE_BACK_TEXT'));
			Configuration::updateValue('PS_MOBILECASE_FRONT_TEXT', (string)Tools::getValue('PS_MOBILECASE_FRONT_TEXT'));
			
			
			$html .= $this->displayConfirmation($this->l('Mobile Case Settings updated Successfully'));
		}

		/* Configuration form */

		return $html.$this->renderForm();
	}
	public function renderForm()
	{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'text',
						'label' => $this->l('Design Popup Background Color:'),
						'name' => 'PS_MOBILECASE_BG',
						'class' => 'color',
						'suffix' => $this->l('Mobile Case')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Design Popup Border Color:'),
						'name' => 'PS_MOBILECASE_BORDER',
						'class' => 'color',
						'suffix' => $this->l('Border Color')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Design Popup Font Color: '),
						'name' => 'PS_MOBILECASE_FONTCOLOR',
						'class' => 'color',
						'suffix' => $this->l('font color')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Top text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT',
						'suffix' => $this->l('popup top text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Design Popup Add Text and Upload Button font color:'),
						'name' => 'PS_MOBILECASE_UPLOAD_COLOR',
						'class' => 'color',
						'suffix' => $this->l('Font Color')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Design Popup Add Text and Upload Button Background color:'),
						'name' => 'PS_MOBILECASE_UPLOAD_BG_COLOR',
						'class' => 'color',
						'suffix' => $this->l('Background Color')
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Customize Popup Top text Underline'),
						'desc' => $this->l(''),
						'name' => 'PS_MOBILECASE_TOP_UNDERLINE',
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Enabled')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						),
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup View Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT',
						'suffix' => $this->l('Popup View Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Cart Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT',
						'suffix' => $this->l('Popup Cart Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Cart Text Color: '),
						'name' => 'PS_MOBILECASE_CART_TEXT_COLOR',
						'class' => 'color',
						'suffix' => $this->l('Cart Text Color')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Cart Button Background Color: '),
						'name' => 'PS_MOBILECASE_CART_BUTTON_BG_COLOR',
						'class' => 'color',
						'suffix' => $this->l('Cart Background Color')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Delete Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT',
						'suffix' => $this->l('Popup Delete Object Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Back Text:'),
						'name' => 'PS_MOBILECASE_BACK_TEXT',
						'suffix' => $this->l('Image Send To Back text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Front Text:'),
						'name' => 'PS_MOBILECASE_FRONT_TEXT',
						'suffix' => $this->l('Image Send To Front text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Quantity Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT',
						'suffix' => $this->l('Popup Quantity Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1',
						'suffix' => $this->l('Popup Tab Text 1')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_2 Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2',
						'suffix' => $this->l('Popup Tab Text 2')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_3 Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3',
						'suffix' => $this->l('Popup Tab Text 3')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_4 Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4',
						'suffix' => $this->l('Popup Tab Text 4')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Heading Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT',
						'suffix' => $this->l('Popup Tab 1 Heading Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_2 Heading Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT',
						'suffix' => $this->l('Popup Tab 2 Heading Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_3 Heading Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT',
						'suffix' => $this->l('Popup Tab 3 Heading Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_4 Heading Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT',
						'suffix' => $this->l('Popup Tab 4 Heading Text')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Content Text 1:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1',
						'suffix' => $this->l('Popup Tab 1 Content Text 1')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Content Text 2:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2',
						'suffix' => $this->l('Popup Tab 1 Content Text 2')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Content Text 3:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3',
						'suffix' => $this->l('Popup Tab 1 Content Text 3')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_1 Content Text 4:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4',
						'suffix' => $this->l('Popup Tab 1 Content Text 4')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Customize Popup Tab_2 Content Text 1:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1',
						'suffix' => $this->l('Popup Tab 2 Content Text 1')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Minimum Customize Alert Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT',
						'suffix' => $this->l('popup alert')
					),
					array(
						'type' => 'text',
						'label' => $this->l('Design It Button Text:'),
						'name' => 'PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT',
						'suffix' => $this->l('button text')
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'SubmitMobileDesignSettings';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}
	
	public function getConfigFieldsValues()
	{
		return array(
			'PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT')),
			'PS_MOBILECASE_BORDER' => Tools::getValue('PS_MOBILECASE_BORDER', Configuration::get('PS_MOBILECASE_BORDER')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT')),
			'PS_MOBILECASE_FONTCOLOR' => Tools::getValue('PS_MOBILECASE_FONTCOLOR', Configuration::get('PS_MOBILECASE_FONTCOLOR')),
			'PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT')),
			'PS_MOBILECASE_TOP_UNDERLINE' => Tools::getValue('PS_MOBILECASE_TOP_UNDERLINE', Configuration::get('PS_MOBILECASE_TOP_UNDERLINE')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT')),
			'PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT' => Tools::getValue('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT', Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT')),
			'PS_MOBILECASE_CART_TEXT_COLOR' => Tools::getValue('PS_MOBILECASE_CART_TEXT_COLOR', Configuration::get('PS_MOBILECASE_CART_TEXT_COLOR')),
			'PS_MOBILECASE_CART_BUTTON_BG_COLOR' => Tools::getValue('PS_MOBILECASE_CART_BUTTON_BG_COLOR', Configuration::get('PS_MOBILECASE_CART_BUTTON_BG_COLOR')),
			
			'PS_MOBILECASE_UPLOAD_COLOR' => Tools::getValue('PS_MOBILECASE_UPLOAD_COLOR', Configuration::get('PS_MOBILECASE_UPLOAD_COLOR')),
			'PS_MOBILECASE_UPLOAD_BG_COLOR' => Tools::getValue('PS_MOBILECASE_UPLOAD_BG_COLOR', Configuration::get('PS_MOBILECASE_UPLOAD_BG_COLOR')),
			'PS_MOBILECASE_BG' => Tools::getValue('PS_MOBILECASE_BG', Configuration::get('PS_MOBILECASE_BG')),
			'PS_MOBILECASE_BACK_TEXT' => Tools::getValue('PS_MOBILECASE_BACK_TEXT', Configuration::get('PS_MOBILECASE_BACK_TEXT')),
			'PS_MOBILECASE_FRONT_TEXT' => Tools::getValue('PS_MOBILECASE_FRONT_TEXT', Configuration::get('PS_MOBILECASE_FRONT_TEXT')),
		);
	}
	
	/*Admin Product Entry Page Custom Tab*/
	public function prepareNewTab()
	{
		$ps__base_url = $this->getPSBaseUrl();
		$ObjCustomData = $this->getCustomFieldData((int)Tools::getValue('id_product'));
		$front_image = '';
		$back_image = '';
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';
		if($ObjCustomData['front_image'] != ''){
			$front_image = $ps__base_url . 'img/customImage/' . $ObjCustomData['front_image'];
		}

		$this->context->smarty->assign(array(
			'chk_is_custom' 	=> $ObjCustomData['is_custom_product'],
			'min_qty' 			=> $ObjCustomData['min_qty'],
			'front_image'		=> $front_image,
			'module_path'		=> $base_url_module,
		));
	}
	public function hookDisplayAdminProductsExtra($params)
	{
		if (Validate::isLoadedObject($product = new Product((int)Tools::getValue('id_product'))))
		{
			$this->prepareNewTab();
			return $this->display(__FILE__, 'views/admin/mobilecasedesign.tpl');
		}
		else{
			$this->prepareNewTab();
			return $this->display(__FILE__, 'views/admin/mobilecasedesign.tpl');
		}
	}
	public function alterTable($method)
	{
		switch ($method) {
			case 'add':
				$sql = 'ALTER TABLE ' . _DB_PREFIX_ . 'product ADD COLUMN `is_custom_product` INT(1) NOT NULL DEFAULT 0, ADD COLUMN `min_qty` int(15) NOT NULL default 1, ADD COLUMN `front_image` varchar(100) NOT NULL';
				
				$sql3 = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'custom_design(`design_id` varchar(100) NOT NULL,`front_design_info` varchar(5000) CHARACTER SET utf8 NOT NULL, PRIMARY KEY (`design_id`))';
				
				if(!Db::getInstance()->Execute($sql)){
					return false;
				}
				
				if(!Db::getInstance()->Execute($sql3)){
					return false;
				}
				
				/*Extra work*/
				
				$sql_menu = "SELECT * FROM " . _DB_PREFIX_ . "tab_lang WHERE name = 'Catalog'";
				if ($row = Db::getInstance()->getRow($sql_menu)){
					$id_catalog = $row['id_tab'];
					if($id_catalog > 0){
						Db::getInstance()->insert('tab', array(
							'id_parent' 				=> (int)$id_catalog,
							'class_name'   				=> 'AdminClipart',
							'position'      			=> (int)499
						));
						$id_tab_1 = Db::getInstance()->Insert_ID();
						Db::getInstance()->insert('tab', array(
							'id_parent' 				=> (int)$id_catalog,
							'class_name'   				=> 'AdminFont',
							'position'      			=> (int)500
						));
						$id_tab_2 = Db::getInstance()->Insert_ID();
						Db::getInstance()->insert('tab', array(
							'id_parent' 				=> (int)$id_catalog,
							'class_name'   				=> 'AdminCaseBackground',
							'position'      			=> (int)500
						));
						$id_tab_3 = Db::getInstance()->Insert_ID();
						Db::getInstance()->insert('tab_lang', array(

							'id_tab' 				=> (int)$id_tab_1,
							'id_lang'   			=> (int)1,
							'name'      			=> 'Mobile Case Clipart'
						));
						Db::getInstance()->insert('tab_lang', array(
							'id_tab' 				=> (int)$id_tab_2,
							'id_lang'   			=> (int)1,
							'name'      			=> 'Mobile Case Text Font'
						));
						Db::getInstance()->insert('tab_lang', array(
							'id_tab' 				=> (int)$id_tab_3,
							'id_lang'   			=> (int)1,
							'name'      			=> 'Mobile Case Background Image'
						));
					}
				}
				
				break;
			
			case 'remove':
				if(!Db::getInstance()->Execute('ALTER TABLE ' . _DB_PREFIX_ . 'product DROP COLUMN `is_custom_product`, DROP COLUMN `min_qty`, DROP COLUMN `front_image`')){
					return false;
				}
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "tab WHERE class_name = 'AdminClipart'");
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "tab WHERE class_name = 'AdminFont'");
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "tab WHERE class_name = 'AdminCaseBackground'");
				Db::getInstance()->Execute("DROP TABLE " . _DB_PREFIX_ . "custom_design");
				
				break;
		}
		
		return true;
	}
	
	public function hookActionProductUpdate($params)
	{
		$id_product = Tools::getValue('id_product');
		$ObjCustomData = $this->getCustomFieldData((int)$id_product);
		$front_image = '';
		if(isset($_FILES["file_front_image"]) && $_FILES["file_front_image"]['size'] > 1){
			$image_name = uniqid();
			$front_image = $this->createImageDirectory($_FILES["file_front_image"],$image_name,'front');
		}
		if($front_image == ''){
			$front_image = $ObjCustomData['front_image'];
		}
		if(!empty($ObjCustomData)){
            $sql = 'UPDATE ' . _DB_PREFIX_ . 'product SET is_custom_product = "' . Tools::getValue('hdncustom') . '",min_qty = "' . Tools::getValue('min_qty') . '",front_image = "' . $front_image . '" WHERE id_product = "' . (int)$id_product . '"';
			Db::getInstance()->Execute($sql);
        }
	}
	
	public function hookActionProductAdd($params){	
		if(isset($params['product']->id)){
			$image_name = uniqid();
			$id_product = $params['product']->id;
			$front_image = '';

			if(isset($_FILES["file_front_image"]) && $_FILES["file_front_image"]['size'] > 1){
				$front_image = $this->createImageDirectory($_FILES["file_front_image"],$image_name,'front');
			}
			$ObjCustomData = $this->getCustomFieldData((int)$id_product);
			if($front_image == ''){
				$front_image = $ObjCustomData['front_image'];
			}
			$sql = 'UPDATE ' . _DB_PREFIX_ . 'product SET is_custom_product = "' . Tools::getValue('hdncustom') . '",min_qty = "' . Tools::getValue('min_qty') . '",front_image = "' . $front_image . '" WHERE id_product = "' . (int)$id_product . '"';
			Db::getInstance()->Execute($sql);
		}
	}
	
	public function getCustomFieldData($id_product){
		$result = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'product` WHERE `id_product` = '.(int)$id_product);
		return $result;
	}
	public function createImageDirectory($image_file_name,$uniqId,$side){
		$image_url = '';
		$dir_path = _PS_ROOT_DIR_ . '/img/customImage';
		if (!file_exists($dir_path)) {
			mkdir($dir_path, 0777, true);
		}
		$filename = $image_file_name['name'];
		$ext = substr(strrchr($filename, "."), 1);
		if(strtolower(trim($ext)) == 'jpg' || strtolower(trim($ext)) == 'png' || strtolower(trim($ext)) == 'gif') {		
			$filename = $uniqId . '_' . $side . '.' . $ext; 
			if(move_uploaded_file($image_file_name["tmp_name"],$dir_path . "/" . $filename)){
				$image_url = $filename;
			}
		}
		return $image_url;
	}
	/*End Custom Tab*/
	/*Product Details Page Hook*/
	public function hookDisplayProductButtons($params)
	{
		if(isset($params['product']->id)){
			$product_id = $params['product']->id;
			$result = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'product` WHERE `id_product` = '.(int)$product_id);
			if(count($result) > 0){
				if($result['is_custom_product'] == 1){
					$this->frontEndDesignTemplate($result['is_custom_product'],$product_id,$result['front_image'],$result['min_qty']);
					$this->_clearCache('mobilecasedesign.tpl');
					return $this->display(__FILE__, 'views/frontend/mobilecasedesign.tpl');
				}
			}
		}
		
	}
	public function frontEndDesignTemplate($is_custom_product,$product_id,$front_image = '',$min_qty = 1)
	{
		
		$ps__base_url = $this->getPSBaseUrl();
		
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';

		if($front_image != ''){
			$front_image = $ps__base_url . 'img/customImage/' . $front_image;
		}
	
		/*Module Default Set*/
		$button_text_color = 'ffffff';
		$button_bg_color = '000000';
		$popup_bg_color = 'ffffff';
		$popup_border = 'cccccc';
		$popup_text_color = '000000';
		$cart_text_color = 'ffffff';
		$cart_bg_color = '0076BA';
		$popup_top_text = 'T-Shirt Design Tool';
		$popup_top_text_underline = 'none';
		$popup_tab_text_1 = 'Add Text';
		$popup_tab_text_2 = 'Add Image';
		$popup_tab_text_3 = 'Add Art';
		$popup_tab_text_4 = 'Background';
		$popup_tab_1_heading_text = 'Add Your Text';
		$popup_tab_2_heading_text = 'Upload Your Logo';
		$popup_tab_3_heading_text = 'Add Your ClipArt';
		$popup_tab_4_heading_text = 'Add Case Background';
		$popup_tab_1_content_text_1 = 'Font:';
		$popup_tab_1_content_text_2 = 'Color:';
		$popup_tab_1_content_text_3 = 'Text:';
		$popup_tab_1_content_text_4 = 'Add Text';
		$popup_tab_2_content_text_1 = 'Upload Image';
		$popup_front_image_text = 'Front';
		$popup_back_image_text = 'Back';
		$popup_view_text = 'View';
		$popup_cart_text = 'Add To Cart';
		$popup_reset_text = 'Delete';
		$design_me_button = 'Design Me';
		$quantity_text = 'Quantity';
		$min_qty_required = 'Minimum required';
		$custom_image_price = 0.00;
		
		$back_text = 'Back';
		$front_text = 'Front';
		
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT') != ''){
			$min_qty_required = Configuration::get('PS_MOBILECASE_CUSTOMIZE_CUSTOMIZE_ALERT');
		}
		if(Configuration::get('PS_MOBILECASE_BG') != ''){
			$popup_bg_color = Configuration::get('PS_MOBILECASE_BG');
		}
		if(Configuration::get('PS_MOBILECASE_BORDER') != ''){
			$popup_border = Configuration::get('PS_MOBILECASE_BORDER');
		}
		if(Configuration::get('PS_MOBILECASE_FONTCOLOR') != ''){
			$popup_text_color = Configuration::get('PS_MOBILECASE_FONTCOLOR');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT') != ''){
			$popup_top_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TOP_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_TOP_UNDERLINE') != '' && Configuration::get('PS_MOBILECASE_TOP_UNDERLINE') == 1){
			$popup_top_text_underline = 'underline';
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1') != ''){
			$popup_tab_text_1 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_1');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2') != ''){
			$popup_tab_text_2 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_2');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3') != ''){
			$popup_tab_text_3 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_3');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4') != ''){
			$popup_tab_text_4 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_TEXT_4');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT') != ''){
			$popup_tab_1_heading_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_HEADING_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT') != ''){
			$popup_tab_2_heading_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_HEADING_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT') != ''){
			$popup_tab_3_heading_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_3_HEADING_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT') != ''){
			$popup_tab_4_heading_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_4_HEADING_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1') != ''){
			$popup_tab_1_content_text_1 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_1');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2') != ''){
			$popup_tab_1_content_text_2 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_2');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3') != ''){
			$popup_tab_1_content_text_3 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_3');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4') != ''){
			$popup_tab_1_content_text_4 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_1_CONTENT_TEXT_4');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1') != ''){
			$popup_tab_2_content_text_1 = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_TAB_2_CONTENT_TEXT_1');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_FRONT_IMAGE_TEXT') != ''){
			$popup_front_image_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_FRONT_IMAGE_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_BACK_IMAGE_TEXT') != ''){
			$popup_back_image_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_BACK_IMAGE_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT') != ''){
			$popup_view_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_VIEW_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT') != ''){
			$popup_cart_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_CART_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT') != ''){
			$popup_reset_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_RESET_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT') != ''){
			$design_me_button = Configuration::get('PS_MOBILECASE_CUSTOMIZE_DESIGN_IT_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT') != ''){
			$quantity_text = Configuration::get('PS_MOBILECASE_CUSTOMIZE_POPUP_QTY_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_CART_TEXT_COLOR') != ''){
			$cart_text_color = Configuration::get('PS_MOBILECASE_CART_TEXT_COLOR');
		}
		if(Configuration::get('PS_MOBILECASE_CART_BUTTON_BG_COLOR') != ''){
			$cart_bg_color = Configuration::get('PS_MOBILECASE_CART_BUTTON_BG_COLOR');
		}
		if(Configuration::get('PS_MOBILECASE_UPLOAD_COLOR') != ''){
			$button_text_color = Configuration::get('PS_MOBILECASE_UPLOAD_COLOR');
		}
		if(Configuration::get('PS_MOBILECASE_UPLOAD_BG_COLOR') != ''){
			$button_bg_color = Configuration::get('PS_MOBILECASE_UPLOAD_BG_COLOR');
		}
		if(Configuration::get('PS_MOBILECASE_BACK_TEXT') != ''){
			$back_text = Configuration::get('PS_MOBILECASE_BACK_TEXT');
		}
		if(Configuration::get('PS_MOBILECASE_FRONT_TEXT') != ''){
			$front_text = Configuration::get('PS_MOBILECASE_FRONT_TEXT');
		}
		
		$font_coll = array();
		if ($handle = opendir(_PS_ROOT_DIR_ . '/modules/mobilecasedesign/font')) {
			while (false !== ($entry = readdir($handle))) {
				if(isset($entry) && $entry !='.' && $entry !='..'){
					$font_name = explode('.',$entry);
					if(isset($font_name)){
						$font_coll[] = array(
							'font'		=> $font_name[0]
						);
					}
				}
			}
		closedir($handle);
		}
		
		$clipart_coll = array();
		if ($handle2 = opendir(_PS_ROOT_DIR_ . '/img/customImage/clipart')) {
			while (false !== ($entry = readdir($handle2))) {
				if(isset($entry) && $entry !='.' && $entry !='..'){
					$clipart_coll[] = array(
						'clipart'		=> $entry
					);
				}
			}
		closedir($handle2);
		}
		
		$bg_coll = array();
		if ($handle2 = opendir(_PS_ROOT_DIR_ . '/img/customImage/design_bg')) {
			while (false !== ($entry = readdir($handle2))) {
				if(isset($entry) && $entry !='.' && $entry !='..'){
					$bg_coll[] = array(
						'clipart'		=> $entry
					);
				}
			}
		closedir($handle2);
		}
		
		$slang = $this->context->language->id;
						
		$this->context->smarty->assign(array(
			'font_array'					=> $font_coll,
			'clipart_array'					=> $clipart_coll, 
			'min_qty_required'				=> $min_qty_required,
			'min_qty'						=> $min_qty,
			'is_custom_product'				=> $is_custom_product,
			'product_id' 					=> $product_id,
			'base_url_module'				=> $base_url_module,
			'front_image'					=> $front_image,
			'root_path'						=> $ps__base_url,
			'popup_bg'						=> $popup_bg_color,
			'popup_border'					=> $popup_border,
			'popup_text_color'				=> $popup_text_color,
			'popup_top_text'				=> $popup_top_text,
			'popup_top_text_underline'		=> $popup_top_text_underline,
			'popup_tab_text_1'				=> $popup_tab_text_1,
			'popup_tab_text_2'				=> $popup_tab_text_2,
			'popup_tab_text_3'				=> $popup_tab_text_3,
			'popup_tab_text_4'				=> $popup_tab_text_4,
			'popup_tab_1_heading_text'		=> $popup_tab_1_heading_text,
			'popup_tab_2_heading_text'		=> $popup_tab_2_heading_text,
			'popup_tab_3_heading_text'		=> $popup_tab_3_heading_text,
			'popup_tab_4_heading_text'		=> $popup_tab_4_heading_text,
			'popup_tab_1_content_text_1'	=> $popup_tab_1_content_text_1,
			'popup_tab_1_content_text_2'	=> $popup_tab_1_content_text_2,
			'popup_tab_1_content_text_3'	=> $popup_tab_1_content_text_3,
			'popup_tab_1_content_text_4'	=> $popup_tab_1_content_text_4,
			'popup_tab_2_content_text_1'	=> $popup_tab_2_content_text_1,
			'popup_front_image_text'		=> $popup_front_image_text,
			'popup_back_image_text'			=> $popup_back_image_text,
			'popup_view_text'				=> $popup_view_text,
			'popup_cart_text'				=> $popup_cart_text,
			'popup_reset_text'				=> $popup_reset_text,
			'design_me_button'				=> $design_me_button,
			'quantity_text'					=> $quantity_text,
			'cart_text_color'				=> $cart_text_color,
			'cart_bg_color'					=> $cart_bg_color,
			'button_text_color'				=> $button_text_color,
			'button_bg_color'				=> $button_bg_color,
			'lang_id'						=> $slang,
			'bg_coll'						=> $bg_coll,
			'back_text'						=> $back_text,
			'front_text'					=> $front_text,
			
			
		));
	}
	public function hookDisplayFooter($params)
	{
		$this->setMedia();
		$ps__base_url = $this->getPSBaseUrl();
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';
		$base_url_marge_image = $ps__base_url . 'img/marge_image/';
		$this->context->smarty->assign(array(
			'base_url_marge_image'	=> $base_url_marge_image,
			'root_path'				=> $ps__base_url,
			'base_url_module'	=> $base_url_module
		));
		return $this->display(__FILE__, 'views/frontend/footer_area.tpl');
	}
	
	public function hookOrderConfirmation($params)
	{
		$order = $params['objOrder'];
		$products = $order->getProducts();	
		foreach ($products as $product){
			$product_id = $product['product_id'];
			$product_name = $product['product_name'];
			$product_attribute_id = $product['product_attribute_id'];
			$name_split = explode('custom :',$product_name);
			if(isset($name_split[1]) && strlen($name_split[1]) == 33){
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "product_attribute WHERE id_product_attribute =" . (int)$product_attribute_id);
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "product_attribute_shop WHERE id_product_attribute =" . (int)$product_attribute_id);
				Db::getInstance()->Execute("DELETE FROM " . _DB_PREFIX_ . "stock_available WHERE id_product_attribute =" . (int)$product_attribute_id);
				//Db::getInstance()->Execute("UPDATE " . _DB_PREFIX_ . "stock_available SET quantity = 9999 WHERE id_product =" . (int)$product_id);
			}
		}
	}
	
	public function hookDisplayBackOfficeFooter($params)
	{
		$ps__base_url = $this->getPSBaseUrl();
		$base_url_module = $ps__base_url . 'modules/mobilecasedesign/';
		$base_url_marge_image = $ps__base_url . 'img/marge_image/';
		$base_url = $ps__base_url . 'img/marge_image/';
		$this->context->smarty->assign(array(
			'base_url_marge_image'	=> $base_url_marge_image,
			'root_path'				=> $ps__base_url,
			'base_url_module'		=> $base_url_module,
			'base_url2'				=> $base_url
		));
		return $this->display(__FILE__, 'views/admin/footer_area.tpl');
	}
	public function setMedia()
	{
		$this->context->controller->addJqueryUI('ui.draggable');
		$this->context->controller->addJqueryUI('ui.resizable');
		$this->context->controller->addJqueryUI('ui.dialog');
		$this->context->controller->addJqueryUI('ui.tabs');
		$this->context->controller->addJqueryPlugin('ajaxfileupload');
		
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

