<?php

	class Profile extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
			$this->authentification->logged_in();
			$this->load->model("model_user");
			$this->load->library("rajaongkir");
		}
		
		function index()
		{
			$user_id = $this->session->userdata("user_id");
			$dt_profile = $this->model_user->get_user_detail($user_id);
			
			//print_r($dt_profile); exit;
			
			$data["dt_profile"] = $dt_profile;
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/profile";
			$this->load->view("templates/template",$data);	
		}
		
		function order()
		{
			$this->load->model("order_model");
			
			$id_user_sess = $this->session->userdata("user_id");
			
			$order = $this->order_model->list_order_member($id_user_sess);
			
			$data["list_order"] = $order;
			
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/order_list";
			$this->load->view("templates/template",$data);
			
		}
		
		function detail_order()
		{
			$this->load->model("order_model");
			$this->load->model("bank_model");
			$this->load->model("model_product");
			
			$id_order = $this->uri->segment(4);
			
			$detail_order 	   = $this->order_model->detail_order($id_order);
			
			if(!empty($detail_order))
			{
			
				$detail_list_order = $this->order_model->detail_list_order($id_order);
				$payment_confirm   = $this->order_model->order_payment_confirmation($id_order);
				
				if(empty($payment_confirm))
				{
					$data["bank"]	 = $this->bank_model->get_all();
				}
				else if(!empty($payment_confirm))
				{
					$data["bank_dt"] = $this->bank_model->get_by_id_arr($payment_confirm["id_bank"]);
				}
				
				$data["detail_list_order"] = $detail_list_order;
				$data["detail_order"]	   = $detail_order;
				$data["payment"]		   = $payment_confirm;
				
				$data["content"]    = "profile/content";
				$data["subcontent"] = "profile/order_detail";
			}
			else
			{
				$data["content"] = "404page";	
			}
			
			//$this->load->view("profile/order_detail");

			//$this->load->view('templates/footer-2');
			$this->load->view("templates/template",$data);		
		}
		
		function address_book()
		{
			$user_id = $this->session->userdata("user_id");
			$address_list = $this->model_user->address_book_list($user_id);
			
			$data["address_list"] = $address_list;
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/address_book";
			
			
			$this->load->view("templates/template",$data);	
			
			
		}
		
		function add_address_book()
		{
			$user_id = $this->session->userdata("user_id");	
			
			$province = $this->rajaongkir->show_province();
			
		    $json_decode = json_decode($province,TRUE);
			
			$data["province"] = $json_decode["rajaongkir"]["results"];
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/add_address_book";
			
			
			$this->load->view("templates/template",$data);	
			
		}
		
		function account_setting()
		{
			$user_id = $this->session->userdata("user_id");
			$dt_account = $this->model_user->get_user_detail($user_id);
			
			$data["dt_account"] = $dt_account;
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/account_setting";
			
			
			$this->load->view("templates/template",$data);	
		}
		
		function payment_confirmation($id_order)
		{
			
			$this->load->view("templates/template",$data);	
		}
		
		function add_address_book_process()
		{
			$this->load->library("form_validation");
			
			/* Array
			(
				[contact_person] => 
				[no_hp] => 
				[id_province] => 1
				[id_city] => 17
				[kecamatan] => 
				[kode_pos] => 
				[shipping_address] => 
				[billing_address] => 
			)*/
			
			$contact_person = $this->input->post("contact_person",TRUE);
			$no_hp = $this->input->post("no_hp",TRUE);
			$id_province = $this->input->post("id_province",TRUE);
			$id_city = $this->input->post("id_city",TRUE);
			$kecamatan = $this->input->post("kecamatan",TRUE);
			$kode_pos = $this->input->post("kode_pos",TRUE);
			$shipping_address = $this->input->post("shipping_address",TRUE);
			$billing_address = $this->input->post("billing_address",TRUE);
			
			$this->form_validation->set_rules("contact_person","Contact Person","required");
			$this->form_validation->set_rules("no_hp","No Hp","required");
			$this->form_validation->set_rules("id_province","Province","required");
			$this->form_validation->set_rules("id_city","City","required");
			$this->form_validation->set_rules("kecamatan","Kecamatan","required");
			$this->form_validation->set_rules("kode_pos","Kode Pos","required");
			$this->form_validation->set_rules("shipping_address","Shipping Address","required");
			
			
			if($this->form_validation->run() == TRUE)
			{
				$this->model_user->add_address_book();
				
				$message = success("You successfully Add Address Book ");
				$this->session->set_flashdata("message",$message);
				
			}
			else
			{
				$err = validation_errors();
				$message = danger($err);
				
				$this->session->set_flashdata("message",$message);
			}
			
			redirect(site_url("profile/add_address_book"));
		}
		
		function edit_profile_process()
		{
			$this->load->library("form_validation");
			
			$contact_person = $this->input->post("contact_person",TRUE);
			$no_telp		= $this->input->post("no_telp",TRUE);
			$no_hp			= $this->input->post("no_hp",TRUE);
			$no_fax			= $this->input->post("no_fax",TRUE);
			//$billing_address = $this->input->post("billing_address",TRUE);
			//$shipping_address = $this->input->post("shipping_address",TRUE);
			
			$this->form_validation->set_rules("contact_person","Contact Person","required");
			$this->form_validation->set_rules("no_telp","No Telp","required");
			$this->form_validation->set_rules("no_hp","No Hp","required");
			//$this->form_validation->set_rules("billing_address","Billing Address","required"); 	
			//$this->form_validation->set_rules("shipping_address","Shipping Address","required");
			
			if($this->form_validation->run() == TRUE)
			{				
				$this->model_user->edit_profile_process();
				
				// ubah session 
				$this->session->set_userdata("contact_person",$contact_person);
				
				$message = success("You successfully updated your Profile");
				
				$this->session->set_flashdata("message",$message);
				
				
			}
			else
			{
				$error = validation_errors();
				$message = danger($error);
				
				$this->session->set_flashdata("message",$message);	
			}
			
			redirect(site_url("profile"));
		}
		
		function account_setting_process()
		{
			$this->load->library("form_validation");
			/*
				Array
				(
					[email] => alhusna901@gmail.com
					[new_password] => 999999
					[confirm_password] => 
					[password] => 
				)
	
			*/	
			$user_id = $this->session->userdata("user_id");
			$email 	  = $this->input->post("email",TRUE);
			$password = $this->input->post("password",TRUE);
			$new_password = $this->input->post("new_password",TRUE);
			$confirm_password = $this->input->post("confirm_password",TRUE);  			
			
			$this->form_validation->set_rules("email","Email","required|valid_email");
			$this->form_validation->set_rules("password","Old Password","required");
			
			$check_account = $this->model_user->check_account($email,$password);
			
			if(!empty($new_password))
			{
				$this->form_validation->set_rules("confirm_password","Confirm Password","matches[new_password]");	
			}
			
			$err = "";
			if($this->form_validation->run() == TRUE)
			{
				
				if(!empty($check_account))
				{
					$this->model_user->change_email($email);
					
					//change session
					$this->session->set_userdata("member_email",$email);
					
					if(!empty($new_password))
					{
						$this->model_user->change_password($password);	
					}
					
					$message = success("You Successfully Change Your Account");
					
				}
				else
				{
					$err .= "Your Password is wrong";	
					$message = danger($err);
				}
				
			}
			else
			{
				$err = validation_errors();
				$message = danger($err);
	
			}
			
			$this->session->set_flashdata("message",$message);
			redirect(site_url("profile/account_setting"));
			
		}
		
	}