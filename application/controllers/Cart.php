<?php

class cart extends CI_Controller { // Our Cart class extends the Controller class

    public function __construct(){
		
      parent::__construct();

   	  $this->load->model('model_cart');
	  $this->load->helper("check_data");
	  $this->load->model("model_user");
	  $this->load->model("model_event");

  	}

	function add_cart_item(){
		
	
	    $validate_cart = $this->model_cart->validate_add_cart_item();
		
	    if(!empty($validate_cart)){

	     	$id = $this->input->post('product_id');
	     	$qty = $this->input->post('quantity');
	     	$image = $this->input->post('product_image_1');
	     	$title = $this->input->post('product_title');
	     	$code = $this->input->post('product_code');		
			
	     	// $id_ajak = $this->input->post('ajax');
			// Create an array with product information
			
		  if(($qty <= $validate_cart["stock"]) || ($validate_cart["product_availability"] == "pre_order"))
		  {
				$data = array(
	
					'id'      => $id,
					'qty'     => $qty,
					'name'    => $title,
					'price'   => $validate_cart["price"],
					'image'	  => $image,
					'code'	  => $code
					/*'options' => array('image' => $image , 'code' => $product_code , 'manu' => $manu)*/
				);
	
	
				// Add the data to the cart using the insert function that is available because we loaded the cart library
	
				// echo $id;
				// echo $cty ;
				// echo $title ;
				// echo $image;
				// die();
				$this->cart->insert($data);
				
				$message = success("You Successfully Add Product to cart");
				$this->session->set_flashdata("message",$message);
			}
		  
			else
			{
				$message = danger("this product out of stock");
				$this->session->set_flashdata("message",$message);
				
			}
			
			redirect($this->agent->referrer());


	    } else{

	        // Nothing found! Return FALSE! 
	        return FALSE;

	    }

	}

	function show_cart(){

		$this->load->library("rajaongkir");
		$this->load->model("bank_model");
		
		$user_id = $this->session->userdata("user_id");		
		$province = $this->rajaongkir->show_province();
		$json_decode = json_decode($province,TRUE);
		
		$data["bank"]		  = $this->bank_model->get_all_array();
		$data["address_book"] = $this->model_user->address_book_list($user_id);
		$data["province"] = $json_decode["rajaongkir"]["results"];
		$data["content"] = "v_cart";
    	
		$this->load->view("templates/template",$data);

	}

	function update_cart(){

		// Get the total number of items in cart
		$product_id = $this->input->post('product_id'); // array
	    $qty = $this->input->post('qty'); // array
		
		//print_r( $qty); exit;	
		
	    $total = count($this->cart->contents());

	    // Retrieve the posted information

	    $item = $this->input->post('rowid');

	 	/*echo $qty;
	 	die();*/
	    // Cycle true all items and update them
		// check stock
		
			for($i=0;$i < $total;$i++)
			{
			   $validate_cart = $this->model_cart->validate_add_cart_item($product_id[$i]);	
			   if($qty[$i] <= $validate_cart["stock"] || ($validate_cart["product_availability"] == "pre_order" && $validate_cart["stock"] == 0))
			   {
					// Create an array with the products rowid's and quantities. 
		
					$data = array(
		
					   'rowid' => $item[$i],
					   'qty'   => $qty[$i]
		
					);
		
					//echo $item[$i];
		
					// Update the cart with the new information
		
					$this->cart->update($data);
					
					$message = success("You Successfully updated cart");
					$this->session->set_flashdata("message",$message);
			   }
				else
				{
					$message = danger("this product out of stock");
					$this->session->set_flashdata("message",$message);
					
				}	
			}
		
		redirect($this->agent->referrer());
	    /*$this->model_cart->validate_update_cart();*/
	    

	}

	function removeCartItem() {

		$rowid=$this->uri->segment(3);

        $data = array(

            'rowid'   => $rowid,
            'qty'     => 0

        );

        $this->cart->update($data);

        redirect($this->agent->referrer());

	}

	function empty_cart(){

    	$this->cart->destroy(); // Destroy all cart data

    	redirect('products/all'); // Refresh te page

	}

	function save_invoice()
	{

		// database	
	}

	function print_invoice()
	{



		$this->load->model("model_user");

		$this->load->model("model_product");

		$this->load->library("M_Pdf");

		$user_session = $this->session->all_userdata();	

		$dt_stat = "error";

		$dt_msg  = '<div class="alert alert-danger alert-dismissable">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

						Silakan login terlebih dahulu

					</div>';

		if(empty($user_session["email"]))
		{

			$this->session->set_flashdata($dt_stat,$dt_msg);

			redirect(base_url("cart/show_cart"));
	

		}

		else

		{

			$cart = $this->cart->contents();

			$date = date("d-m-Y"); 

			$name_pdf = "Besha invoice $date.pdf";

			$data["name_pdf"] = $name_pdf;

			//print_r($cart);

			//$html =  $this->load->view("invoice/invoice-page",$data,true); 

			$html = $this->load->view("invoice/invoice-fancy-page",$data,true);

			$this->m_pdf->generate_pdf($html, "Besha invoice $date.pdf");

		}

	}

	function send_email_invoice()
	{



		$this->load->model("model_user");

		$this->load->model("model_product");

		$user_session = $this->session->all_userdata();

		

		//print_r($user_session); exit;

		$dt_stat = "error";

		$dt_msg  = '<div class="alert alert-danger alert-dismissable">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

						Silakan login terlebih dahulu

					</div>';

		//$dt_msg = "Silahkan login Terlebih dahulu";

		

		if(empty($user_session["email"]))
		{

			//echo "test"; exit;

			$this->session->set_flashdata($dt_stat,$dt_msg);

			redirect(base_url("cart/show_cart"));

		}
		else
		{

			$date = date("d-m-Y"); 
			$name_pdf = "Besha invoice $date.pdf";
			$data["user_sess"] = $user_session;
			$data["name_pdf"] = $name_pdf;
			
			//$html = $this->load->view("invoice/invoice-fancy-page",$data,true);

			$html =  $this->load->view("invoice/invoice-fancy-page-inline",$data,true); 

			//print_r($user_session);

			//error_reporting(E_ALL);

			//$from_email = 'beshaanalitika99@gmail.com';
			//$from_email = "fadil.hakim182@gmail.com";
			//$from_email = "webbeshaanalitika@gmail.com";
			$from_email = "info@besha-analitika.co.id";
			
			$to_email = $user_session["email"];

			$subject = "$name_pdf";

			$message = $html;

			

			//echo !extension_loaded('openssl')?"Not Available":"Available"; exit;

			

			//configure email settings

			/* $config['protocol']  = 'smtp';

			$config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name

			$config['smtp_port'] = '465'; //smtp port number

			$config['smtp_user'] = $from_email;

			$config['smtp_pass'] = 'admbesha'; //$from_email password
			//$config["smtp_pass"] = "bismilah1";
			
			$config['mailtype']  = 'html';

			$config['charset']   = 'iso-8859-1';

			$config['wordwrap']  = TRUE;

			$config['newline']   = "\r\n"; //use double quotes*/
			
			$config['protocol']  = 'smtp';
			$config['mailtype']  = 'html';
			$config['priority']  = '1';
			$config['charset']   = 'iso-8859-1';
			$config['newline']   = "\r\n"; //use double quotes*/
			$config['wordwrap']  = TRUE;
			$config['smtp_host'] = 'ssl://besha-analitika.co.id';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'info@besha-analitika.co.id';
			$config['smtp_pass'] = 'info-n23';

			$this->email->initialize($config);

			//send mail

			$this->email->from($from_email, 'Besha Analitika');
			$this->email->to(array($to_email,"service@besha-analitika.co.id"));
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();

			//echo $this->email->print_debugger();
			redirect("product/invoice_success_page");
			//redirect("cart/show_cart");

		}

	}
	
	function test()
	{
		$subject = "test aja";
		$message = "test message";
		$from_email = "info@besha-analitika.co.id";
		
		$config['protocol']  = 'smtp';
		$config['mailtype']  = 'html';
		$config['priority']  = '1';
		$config['charset']   = 'iso-8859-1';
		$config['newline']   = "\r\n"; //use double quotes*/
		$config['wordwrap']  = TRUE;
		$config['smtp_host'] = 'ssl://besha-analitika.co.id';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'info@besha-analitika.co.id';
		$config['smtp_pass'] = 'info-n23';
  
		$this->email->initialize($config);
  
		//send mail
  
		$this->email->from($from_email, 'Besha Analitika');
		$this->email->to(array("service@besha-analitika.co.id","alhusna901@gmail.com"));
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		
		$this->email->print_debugger();
	}
}