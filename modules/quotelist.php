<?php
class ControllerQuotelistQuotelist extends Controller {
	public function index() {
		
		if(isset($this->request->get['quote_id'])){
			$this->db->query("DELETE FROM " . DB_PREFIX . "sc_quote WHERE quote_id = '" . (int)$this->request->get['quote_id'] . "'");
			$this->db->query("DELETE FROM " . DB_PREFIX . "sc_quote_order WHERE quote_id = '" . (int)$this->request->get['quote_id'] . "'");
			$this->db->query("DELETE FROM " . DB_PREFIX . "sc_quote_order_options WHERE quote_id = '" . (int)$this->request->get['quote_id'] . "'");
			$this->response->redirect($this->url->link('quotelist/quotelist&token='.$this->session->data['token']));
		}
		
		$this->document->setTitle("Quotation List");
		$data["heading_title"] = "Quotation List";
		$data['token'] = $this->session->data['token'];
		$this->getList();
	}

	protected function getList() {
		$data['quotelist'] = array();
		$quote_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sc_quote ORDER BY quote_id DESC");
		if ($quote_query->num_rows) {
			foreach($quote_query->rows as $quote){
				$quote_product = $this->getQuoteProducts($quote['quote_id']);
				$data['quotelist'][] = array(
					'quote_id'		=> $quote['quote_id'],
					'name'			=> $quote['name'],
					'email'			=> $quote['email'],
					'reply'			=> $quote['reply'],
					'details'		=> $quote['details'],
					'created_date'	=> date("d/m/Y", strtotime($quote['created_date'])),
					'quote_product'	=> $quote_product['p'],
					'gtotal'		=> $quote_product['gt']
				);
			}
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$data['token'] = $this->session->data['token'];
		$this->response->setOutput($this->load->view('quotelist/quotelist.tpl', $data));
	}
	
	public function getQuoteProducts($quote_id){
		$quoteproduct = array();
		$gprice = 0.00;
		$this->load->model('tool/image');
		$products = $this->db->query("SELECT * FROM " . DB_PREFIX . "sc_quote_order WHERE quote_id = '" . (int)$quote_id . "'");

		foreach ($products->rows as $product) {
			$option_data = array();

			$options = $this->getQuoteOptions($quote_id, $product['quote_product_id']);

			foreach ($options as $option) {
				if ($option['type'] != 'file') {
					$option_data[] = array(
						'name'  => $option['name'],
						'value' => $option['value'],
						'type'  => $option['type']
					);
				} else {
					$option_data[] = array(
						'name'  => $option['name'],
						'value' => utf8_substr($option['value'], 0, utf8_strrpos($option['value'], '.')),
						'type'  => $option['type']
					);
				}
			}
			
			$img = '';
			$queryxx = $this->db->query("SELECT image FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product['product_id'] . "'");
			if(isset($queryxx->row['image'])){
				$img  = $this->model_tool_image->resize($queryxx->row['image'], 50, 50);
			}
			$gprice = (float)$gprice + (float)($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0));
			$quoteproduct[] = array(
				'quote_product_id' => $product['quote_product_id'],
				'product_id'       => $product['product_id'],
				'name'    	 	   => $product['name'],
				'model'    		   => $product['model'],
				'option'   		   => $option_data,
				'thumb'			   => $img, 
				'quantity'		   => $product['quantity'],
				'price'    		   => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), '',''),
				'total'    		   => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0),'')
			);
		}
		
		$result = array(
			'p'		=> $quoteproduct,
			'gt'	=> $this->currency->format($gprice, '','')
		);
		
		return $result;
	}
	
	public function getQuoteOptions($quote_id, $quote_product_id) {
		$query = $this->db->query("SELECT oo.* FROM " . DB_PREFIX . "sc_quote_order_options AS oo LEFT JOIN " . DB_PREFIX . "product_option po USING(product_option_id) LEFT JOIN `" . DB_PREFIX . "option` o USING(option_id) WHERE quote_id = '" . (int)$quote_id . "' AND quote_product_id = '" . (int)$quote_product_id . "'");
		return $query->rows;
	}
	
	public function sendReplyEmail(){
		$to = $_POST['email'];

		$subject = $_POST['subject'];
		
		$headers = "From: " . strip_tags($this->config->get('config_email')) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($this->config->get('config_email')) . "\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body>';
		$message .= '<h1>' . $_POST['details'] .'</h1>';
		$message .= '</body></html>';
		mail($to, $subject, $message, $headers);
		$this->db->query("UPDATE " . DB_PREFIX . "sc_quote SET reply = 1 WHERE quote_id = '" . (int)$_POST['quote_id'] . "'");
	}
}
?>