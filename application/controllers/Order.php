<?php 

	class Order extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
			
			$this->load->model("order_model");	
			$this->load->model("model_cart");
			$this->load->library("cart");
		}
		
		
		
		function insert_order()
		{
			error_reporting(E_ALL & ~E_NOTICE);
			$this->authentification->logged_in();
			
			$this->load->library("form_validation");
			$this->load->library("Rajaongkir");
			
			$this->load->model("model_user");
			$this->load->model("bank_model");
			$this->load->model("model_product");
			
			$user_sess_id = $this->session->userdata("user_id");
			
			$contact_person = $this->input->post("contact_person",TRUE);
			$no_hp			= $this->input->post("no_hp",TRUE);
			
			$id_add_user  = $this->input->post("address_book",TRUE);
			$id_province  = $this->input->post("id_province",TRUE);
			$id_city	  = $this->input->post("id_city",TRUE);
			$kecamatan	  = $this->input->post("kecamatan",TRUE);
			$kode_pos	  = $this->input->post("kode_pos",TRUE);
			
			$kurir 		  = $this->input->post("kurir",TRUE);
			$total_weight = $this->input->post("total_weight",TRUE);
			$layanan_kurir= $this->input->post("layanan_kurir",TRUE);
			
			$purpose_bank = $this->input->post("purpose_bank",TRUE);
			
			$save_address_book = $this->input->post("save_address_book",TRUE);
			
			//var_dump($save_address_book); exit;
			
			/*$save_address_book = !is_null($save_address_book) ? $save_address_book : "";
			
			var_dump($save_address_book);
			echo"<hr>";
			var_dump(!is_null($save_address_book)); exit;*/
			
			$check_ongkir = FALSE;
			$err_ongkir = "";
			if(in_array($kurir,array("jne","tiki","pos")) )
			{
			  if($layanan_kurir == "")
			  {
				  $check_ongkir = FALSE;
				  $err_ongkir .= "you must choose layanan kurir";
			  }
			  else
			  {
				  $check_ongkir = TRUE;  
			  }
			
			  if($check_ongkir == TRUE)
			  {
			  	$exp		  = explode("&",$layanan_kurir);
			  	$layanan_kurir= $exp[0];
			  	$ongkir 	  = $exp[1];
			  }	  
			  
			}
			else if($kurir == "pick_up")
			{
				$check_ongkir = TRUE;
				if($layanan_kurir == 0)
				{
					$check_ongkir = TRUE;	
				}
			}
			
			$shipping_address = $this->input->post("shipping_address",TRUE);
			//$billing_address = $this->input->post("billing_address",TRUE);
			
			$grand_total_session = $this->session->userdata("grand_total");
			
			$this->form_validation->set_rules("contact_person","Contact Person","required");
			
			$this->form_validation->set_rules("id_province","Province","required");
			$this->form_validation->set_rules("id_city","City","required");
			$this->form_validation->set_rules("kecamatan","Kecamatan","required");
			$this->form_validation->set_rules("kode_pos","Kode Pos","required");
			
			$this->form_validation->set_rules("kurir","Kurir","required");
			$this->form_validation->set_rules("total_weight","Total Weight","required");
			$this->form_validation->set_rules("layanan_kurir","Layanan Kurir","required");
			
			$this->form_validation->set_rules("shipping_address","Shipping Address","required");
			//$this->form_validation->set_rules("billing_address","Billing Address","required");
			
			$this->form_validation->set_rules("purpose_bank","Bank Transfer in Payment Method","required");
			
			$cart_content =  $this->cart->contents();
			
			if(!empty($cart_content) && 
			$this->form_validation->run() == TRUE && $check_ongkir == TRUE)
			{
				// ini address book master 
				if(empty($id_add_user) && $save_address_book == "on")
				{
				 	// insert to address book	
				 	$this->model_user->add_address_book();
				}
				
			    // add address book tr
				$order = $this->order_model->insert_order();
				$id_order = $order["id_order"]; // new_code
				
				//hapus cart 
				$this->cart->destroy();
				
				//send email invoice
				$this->load->library("MY_Email2");
					
				$order_dt = $this->order_model->detail_order($id_order);
				$order_detail= $this->order_model->detail_list_order($id_order);
				$address_tr  = $this->order_model->address_tr_detail($order_dt["user_addtr_id"]);
				$user_detail = $this->model_user->get_user_detail($user_sess_id); 
				
				$dt = array("order"=>$order_dt,"order_detail"=>$order_detail,"address_tr"=>$address_tr,"user_detail"=>$user_detail);
				$user = "mochakids3";
				//$message = $this->load->view("payment_conf/email_invoice", $data, true);
				$message = $this->load->view("invoice/new_invoice", $dt, true);
				
				$content = array(
					
					"subject" 		=> "Mochakids Invoice - $id_order",
					"subject_title"  => WEBSITE,
					"to" 			 => array($user_detail["email"],"mochakidshop@gmail.com"), 
					"data"			=> array("hello"=>"world"),						
					"message" 		=> $message,
					"mv" 			 => FALSE,
					"alt_message"  => "users/email/email-create-alt", // buat alt nya 
					"amv" 		    => FALSE
				
				);
				
				$this->my_email2->send_email($user,$content);
				
				$suceess = success("You Successfully save Order. now you must confirm the Payment 24 Hours after you order ");
				$this->session->set_flashdata("message",$suceess);
				
				redirect(base_url("checkout/payment/$order[id_order]"));
			}
			else
			{
				$err = "";
				if(empty($cart_content))
				{
					$err  .= "<p> Your Cart is empty </p>";
				}
				if($check_ongkir == FALSE)
				{
					$err .= "<p>".$err_ongkir."</p>";	
				}
				
				$err .= validation_errors(); 
				$message = danger($err);
				$this->session->set_flashdata("message",$message);
				
				redirect("cart/show_cart");	
			}
			
		}
		
		function modal_delete_order()
		{
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$id_order = $this->input->post("id_order",TRUE);
				
				$data["modal_heading"] = "Delete Order #$id_order";
				$data["modal_body"]    = "Are yout want to delete order #$id_order ? <input type='hidden' name='id_order' value='$id_order'>";	
				$data["modal_submit"]  = "Delete";
				$data["modal_submit_url"] = base_url("order/delete_order_process");
				$data["modal_id"]	   = "modal_delete_order";			
				
				$this->load->view("modal",$data);
			}
			else
			{
				show_404();	
			}
		}
		
		function delete_order_process()
		{
			$id_order = $this->input->post("id_order");	
			
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax && !empty($id_order))
			{
				$this->order_model->delete_order($id_order);
				
				echo success("You Successfully Deleted Order");
				
				echo "<script> setTimeout(function(){ location.reload(); }, 3000); </script>";
			}
			else
			{
				show_404();	
			}
			
			
		}
		
		function change_status_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			$status  = $this->input->post("status"); 
			$id_order = $this->input->post("id_order");
			
			if($is_ajax == TRUE)
			{ 
			  $dt = array();
			  $modal_body = "Are you sure want to Change Status to <b>'$status'</b> in Order <b>#".$id_order."</b> ";
			  $modal_body .= "<input type='hidden' name='id_order' value='$id_order'> ";
			  $modal_body .= "<input type='hidden' name='status' value='$status'> ";
			  $data = array(
				  "modal_heading"=>"Change Status",
				  "modal_body"=>$modal_body,
				  "modal_submit_url"=>base_url("order/change_status_process")
			  );
			  
			  $this->load->view("modal",$data);
			}
			else
			{
				show_404();	
			}
		}
		
		function change_status_process()
		{
			$is_ajax = $this->input->is_ajax_request();
			$status  = $this->input->post("status"); 
			$id_order = $this->input->post("id_order");
			
			if($is_ajax == TRUE && !empty($id_order))
			{ 
				
				$this->order_model->change_status($status);
				
			 	echo success("You Successfully Change Status Order #$id_order ");
				echo "<script> setTimeout(function(){ location.reload(); }, 3000); </script>"; 
			}
			else
			{
				show_404();	
			}
			
		}
		
		function cancel_order()
		{
			$id_order = $this->input->post("id_order");	
			
		}
		
		function test()
		{
			//error_reporting(0);
			
			$this->load->library("MY_Email2");
			
			$user = "mochakids3";
				//$message = $this->load->view("payment_conf/email_invoice", $data, true);
				$message = " Quick brownfox jump over the lazy dog";
				$email = "alhusna901@gmail.com";
				
				$content = array(
					
					"subject" 		=> "Mochakids Invoice",
					"subject_title"  => "Mochakids",
					"to" 			 => array($email,"alhusna_99@yahoo.co.id"), 
					"data"			=> array("hello"=>"world"),						
					"message" 		=> $message,
					"mv" 			 => FALSE,
					//"alt_message"  => "users/email/email-create-alt", // buat alt nya 
					"amv" 		    => FALSE
				
				);
				
		    $this->my_email2->send_email($user,$content);
		}
		
		function test_post()
		{
			
			print_r($_POST);	
		}
		
		
	}