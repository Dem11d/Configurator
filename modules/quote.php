<?php
class ControllerQuoteQuote extends Controller {
	private $error = array();

	public function index() {
		
		
		if (isset($this->request->get['remove'])) {
			$this->removeQuote($this->request->get['remove']);
			$this->response->redirect($this->url->link('quote/quote'));
		}
		
		if (!empty($this->request->post['quantity'])) {
			foreach ($this->request->post['quantity'] as $key => $value) {
				$this->updateQuote($key, $value);
			}
			$this->response->redirect($this->url->link('quote/quote'));  			
		}
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
			'separator' => false
		);
		
		$data['heading_title'] = 'Opencart Product Quotation';
		$data['c1'] = 'Image';
		$data['c2'] = 'Name';
		$data['c3'] = 'Quantity';
		$data['c4'] = 'Price';
		$data['c5'] = 'Total';
		$data['ulist'] = 'Update Quote List';
		
		$data['q1'] = 'Name';
		$data['q2'] = 'Email';
		$data['q3'] = 'Additional details/comments';
		$data['q4'] = 'Request a Quote';
		
		$mod_feture = $this->config->get('quote');
		if (isset($mod_feture['header_text']) && $mod_feture['header_text']!= '') { 
			$data['heading_title'] = $mod_feture['header_text'];
		}
		if (isset($mod_feture['table_text_1']) && $mod_feture['table_text_1']!= '') { 
			$data['c1'] = $mod_feture['table_text_1'];
		}
		if (isset($mod_feture['table_text_2']) && $mod_feture['table_text_2']!= '') { 
			$data['c2'] = $mod_feture['table_text_2'];
		}
		if (isset($mod_feture['table_text_3']) && $mod_feture['table_text_3']!= '') { 
			$data['c3'] = $mod_feture['table_text_3'];
		}
		if (isset($mod_feture['table_text_4']) && $mod_feture['table_text_4']!= '') { 
			$data['c4'] = $mod_feture['table_text_4'];
		}
		if (isset($mod_feture['table_text_5']) && $mod_feture['table_text_5']!= '') { 
			$data['c5'] = $mod_feture['table_text_5'];
		}
		if (isset($mod_feture['update_list']) && $mod_feture['update_list']!= '') { 
			$data['ulist'] = $mod_feture['update_list'];
		}
		if (isset($mod_feture['email_name']) && $mod_feture['email_name']!= '') { 
			$data['q1'] = $mod_feture['email_name'];
		}
		if (isset($mod_feture['email_text']) && $mod_feture['email_text']!= '') { 
			$data['q2'] = $mod_feture['email_text'];
		}
		if (isset($mod_feture['details_text']) && $mod_feture['details_text']!= '') { 
			$data['q3'] = $mod_feture['details_text'];
		}
		if (isset($mod_feture['button_text_send']) && $mod_feture['button_text_send']!= '') { 
			$data['q4'] = $mod_feture['button_text_send'];
		}
		
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image');
		
		$data['action'] = $this->url->link('quote/quote');
		$data['action2'] = $this->url->link('quote/quote/saveQuoteData'); 
		    
		$data['products'] = array();
		$data['totalprice'] = 0.00;
		
		$products = $this->getQuoteProductFromSession();

		foreach ($products as $product) {
			$product_total = 0;

			foreach ($products as $product_2) {
				if ($product_2['product_id'] == $product['product_id']) {
					$product_total += $product_2['quantity'];
				}
			}

			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_cart_width'), $this->config->get('config_image_cart_height'));
			} else {
				$image = '';
			}

			$option_data = array();

			foreach ($product['option'] as $option) {
				if ($option['type'] != 'file') {
					$value = $option['option_value'];
				} else {
					$filename = $this->encryption->decrypt($option['option_value']);

					$value = utf8_substr($filename, 0, utf8_strrpos($filename, '.'));
				}

				$option_data[] = array(
					'name'  => $option['name'],
					'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value)
				);
			}

			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}

			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$total = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity']);
			} else {
				$total = false;
			}

			$data['totalprice'] = (float)$data['totalprice'] + (float)$this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'];
			$data['products'][] = array(
				'key'                 => $product['key'],
				'thumb'               => $image,
				'name'                => $product['name'],
				'model'               => $product['model'],
				'option'              => $option_data,
				'quantity'            => $product['quantity'],
				'price'               => $price,
				'total'               => $total,
				'href'                => $this->url->link('product/product', 'product_id=' . $product['product_id']),
				'remove'              => $this->url->link('quote/quote', 'remove=' . $product['key'])
			);
		}
		$data['totalprice'] =  $this->currency->format($data['totalprice'],0,0);
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/quote/quote.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/quote/quote.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/quote/quote.tpl', $data));
		}
	}

	public function addVariationProductToQuote(){
		$this->language->load('checkout/cart');

		$json = array();

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {			
			if (isset($this->request->post['quantity'])) {
				$quantity = $this->request->post['quantity'];
			} else {
				$quantity = 1;
			}

			if (isset($this->request->post['option'])) {
				$option = array_filter($this->request->post['option']);
			} else {
				$option = array();	
			}

			$product_options = $this->model_catalog_product->getProductOptions($this->request->post['product_id']);

			foreach ($product_options as $product_option) {
				if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
					$json['error']['option'][$product_option['product_option_id']] = sprintf($this->language->get('error_required'), $product_option['name']);
				}
			}

			if (!$json) {
				$this->addVariationQuote($this->request->post['product_id'], $quantity, $option);

				$s_msg = "Added Product Into <a href='index.php?route=quote/quote'>Quotation List</a> Successfully";
				if($this->config->get('quote')){
					$quote_config = $this->config->get('quote');
					 $s_msg = html_entity_decode($quote_config['success_text']);
				}
				$json['success'] = $s_msg;

			} else {
				$json['redirect'] = str_replace('&amp;', '&', $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']));
			}
		}

		$this->response->setOutput(json_encode($json));
	}
	
	public function addVariationQuote($product_id, $qty = 1, $option) {
		$key = (int)$product_id . ':';

		if ($option) {
			$key .= base64_encode(serialize($option)) . ':';
		}  else {
			$key .= ':';
		}
		if ((int)$qty && ((int)$qty > 0)) {
			if (!isset($this->session->data['scquote'][$key])) {
				$this->session->data['scquote'][$key] = (int)$qty;
			} else {
				$this->session->data['scquote'][$key] += (int)$qty;
			}
		}

		$data = array();
	}
	
	public function getQuoteProductFromSession(){
		$data['quotelists'] = array();
		if(isset($this->session->data['scquote'])){
			foreach ($this->session->data['scquote'] as $key => $quantity) {
				$product = explode(':', $key);
				$product_id = $product[0];
				if (!empty($product[1])) {
					$options = unserialize(base64_decode($product[1]));
				} else {
					$options = array();
				}
				$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");

				
				
				
				if ($product_query->num_rows) {
					$option_price = 0;
					$option_points = 0;
					$option_weight = 0;

					$option_data = array();

					foreach ($options as $product_option_id => $option_value) {
						$option_query = $this->db->query("SELECT po.product_option_id, po.option_id, od.name, o.type FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_option_id = '" . (int)$product_option_id . "' AND po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");

						if ($option_query->num_rows) {
							if ($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio' || $option_query->row['type'] == 'image') {
								$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$option_value . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

								if ($option_value_query->num_rows) {
									if ($option_value_query->row['price_prefix'] == '+') {
										$option_price += $option_value_query->row['price'];
									} elseif ($option_value_query->row['price_prefix'] == '-') {
										$option_price -= $option_value_query->row['price'];
									}

									if ($option_value_query->row['points_prefix'] == '+') {
										$option_points += $option_value_query->row['points'];
									} elseif ($option_value_query->row['points_prefix'] == '-') {
										$option_points -= $option_value_query->row['points'];
									}

									if ($option_value_query->row['weight_prefix'] == '+') {
										$option_weight += $option_value_query->row['weight'];
									} elseif ($option_value_query->row['weight_prefix'] == '-') {
										$option_weight -= $option_value_query->row['weight'];
									}

									if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
										$stock = false;
									}

									$option_data[] = array(
										'product_option_id'       => $product_option_id,
										'product_option_value_id' => $option_value,
										'option_id'               => $option_query->row['option_id'],
										'option_value_id'         => $option_value_query->row['option_value_id'],
										'name'                    => $option_query->row['name'],
										'option_value'            => $option_value_query->row['name'],
										'type'                    => $option_query->row['type'],
										'quantity'                => $option_value_query->row['quantity'],
										'subtract'                => $option_value_query->row['subtract'],
										'price'                   => $option_value_query->row['price'],
										'price_prefix'            => $option_value_query->row['price_prefix'],
										'points'                  => $option_value_query->row['points'],
										'points_prefix'           => $option_value_query->row['points_prefix'],									
										'weight'                  => $option_value_query->row['weight'],
										'weight_prefix'           => $option_value_query->row['weight_prefix']
									);								
								}
							} elseif ($option_query->row['type'] == 'checkbox' && is_array($option_value)) {
								foreach ($option_value as $product_option_value_id) {
									$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

									if ($option_value_query->num_rows) {
										if ($option_value_query->row['price_prefix'] == '+') {
											$option_price += $option_value_query->row['price'];
										} elseif ($option_value_query->row['price_prefix'] == '-') {
											$option_price -= $option_value_query->row['price'];
										}

										if ($option_value_query->row['points_prefix'] == '+') {
											$option_points += $option_value_query->row['points'];
										} elseif ($option_value_query->row['points_prefix'] == '-') {
											$option_points -= $option_value_query->row['points'];
										}

										if ($option_value_query->row['weight_prefix'] == '+') {
											$option_weight += $option_value_query->row['weight'];
										} elseif ($option_value_query->row['weight_prefix'] == '-') {
											$option_weight -= $option_value_query->row['weight'];
										}

										if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
											$stock = false;
										}

										$option_data[] = array(
											'product_option_id'       => $product_option_id,
											'product_option_value_id' => $product_option_value_id,
											'option_id'               => $option_query->row['option_id'],
											'option_value_id'         => $option_value_query->row['option_value_id'],
											'name'                    => $option_query->row['name'],
											'option_value'            => $option_value_query->row['name'],
											'type'                    => $option_query->row['type'],
											'quantity'                => $option_value_query->row['quantity'],
											'subtract'                => $option_value_query->row['subtract'],
											'price'                   => $option_value_query->row['price'],
											'price_prefix'            => $option_value_query->row['price_prefix'],
											'points'                  => $option_value_query->row['points'],
											'points_prefix'           => $option_value_query->row['points_prefix'],
											'weight'                  => $option_value_query->row['weight'],
											'weight_prefix'           => $option_value_query->row['weight_prefix']
										);								
									}
								}						
							} elseif ($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
								$option_data[] = array(
									'product_option_id'       => $product_option_id,
									'product_option_value_id' => '',
									'option_id'               => $option_query->row['option_id'],
									'option_value_id'         => '',
									'name'                    => $option_query->row['name'],
									'option_value'            => $option_value,
									'type'                    => $option_query->row['type'],
									'quantity'                => '',
									'subtract'                => '',
									'price'                   => '',
									'price_prefix'            => '',
									'points'                  => '',
									'points_prefix'           => '',								
									'weight'                  => '',
									'weight_prefix'           => ''
								);						
							}
						}
					} 
					$price = $product_query->row['price'];
					
					$data['quotelists'][$key] = array(
						'key'                       => $key,
						'product_id'                => $product_query->row['product_id'],
						'name'                      => $product_query->row['name'],
						'model'                     => $product_query->row['model'],
						'image'                     => $product_query->row['image'],
						'option'                    => $option_data,
						'quantity'                  => $quantity,
						'price'                     => ($price + $option_price),
						'total'                     => ($price + $option_price) * $quantity,
						'tax_class_id'              => $product_query->row['tax_class_id']
					);
					
				}
			}
		}
		
		return $data['quotelists'];
	}
	
	public function removeQuote($key) {
		if (isset($this->session->data['scquote'][$key])) {
			unset($this->session->data['scquote'][$key]);
		}
	}
	
	public function updateQuote($key, $qty) {
		if ((int)$qty && ((int)$qty > 0)) {
			$this->session->data['scquote'][$key] = (int)$qty;
		} else {
			$this->removeQuote($key);
		}
	}
	
	public function saveQuoteData(){
		if (!empty($this->request->post['txtname']) && isset($this->session->data['scquote'])) {
			
			$products = $this->getQuoteProductFromSession();
			$name = $this->request->post['txtname'];
			$email = $this->request->post['txtemail'];
			$details = $this->request->post['txtdetails'];
			
			//insert into quote table
			$this->db->query("INSERT INTO " . DB_PREFIX . "sc_quote SET name = '" . $this->db->escape($name) . "', email = '" . $this->db->escape($email) . "', details = '" . $this->db->escape($details) . "'");
			$quote_id = $this->db->getLastId();
			
			foreach ($products as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sc_quote_order SET quote_id = '" . (int)$quote_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "'");
	
				$quote_product_id = $this->db->getLastId();
	
				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "sc_quote_order_options SET quote_id = '" . (int)$quote_id . "', quote_product_id = '" . (int)$quote_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['option_value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
			$this->sendAdminAndCustomerNotificationEmail($products,$name,$email,$details);
			unset($this->session->data['scquote']);
			$this->response->redirect($this->url->link('quote/quote&m=s'));
			
		}
		else{
			$this->response->redirect($this->url->link('quote/quote&m=x'));
			//session timeout here so show some message to customer
		}
	}
	
	public function sendAdminAndCustomerNotificationEmail($quote,$name,$email,$details){
		if (!empty($quote)){
			$to = $this->config->get('config_email');
			$subject = 'Product Quotation Details';
			$headers = "From: " . strip_tags($this->config->get('config_email')) . "\r\n";
			$headers .= "Reply-To: ". strip_tags($this->config->get('config_email')) . "\r\n";
			$headers .= "CC: ". strip_tags($email) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body>';
			$message .= '<h3>'.$name.' Submitted new quote. please check below.</h3>';
			$message .= '<div><u><b>Customer Deatils</b></u></div><br/>';
			$message .= '<div>Customer name: '.$name.'</div>';
			$message .= '<div>Customer email: '.$email.'</div>';
			$message .= '<div>Quote Details: '.$details.'</div><br/><br/>';
			$message .= '<div><u><b>Product Deatils</b></u></div><br/><br/>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= '<tr><td>Name</td><td>Model</td><td>Quantity</td><td>Price</td></tr>';
			foreach ($quote as $product) {
				$message .= '<tr>';
				$message .= '<td>' . $product['name'] . '</td>';
				$message .= '<td>' . $product['model'] . '</td>';
				$message .= '<td>' . $product['quantity'] . '</td>';
				$message .= '<td>' . $this->currency->format((float)$product['price']) . '</td>';
				$message .= '</tr>';
			}
			$message .= '</table>';
			$message .= '</body></html>';
			mail($to, $subject, $message, $headers);
		}
	}
}
?>