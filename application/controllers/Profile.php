<?php

	class Profile extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
			$this->authentification->logged_in();
			$this->load->model("model_user");
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
	
			$order = $this->order_model->list_order();
			
			$data["list_order"] = $order;
			
			$data["content"] = "profile/content";
			$data["subcontent"] = "profile/order_list";
			$this->load->view("templates/template",$data);
			
		}
		
		function detail_order()
		{
			$this->load->model("order_model");
			
			$id_order = $this->uri->segment(4);
			
			$order_detail = $this->order_model->detail_order($id_order);
			
			//print_r($order_detail); exit;
			
			$data["order_detail"] = $order_detail;
			$data["content"]    = "profile/content";
			$data["subcontent"] = "profile/order_detail";
			
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
		
		function edit_profile_process()
		{
			$this->load->library("form_validation");
			
			$contact_person = $this->input->post("contact_person",TRUE);
			$no_telp		= $this->input->post("no_telp",TRUE);
			$no_hp			= $this->input->post("no_hp",TRUE);
			$no_fax			= $this->input->post("no_fax",TRUE);
			$billing_address = $this->input->post("billing_address",TRUE);
			$shipping_address = $this->input->post("shipping_address",TRUE);
			
			$this->form_validation->set_rules("contact_person","Contact Person","required");
			$this->form_validation->set_rules("no_telp","No Telp","required");
			$this->form_validation->set_rules("no_hp","No Hp","required");
			$this->form_validation->set_rules("billing_address","Billing Address","required"); 	
			$this->form_validation->set_rules("shipping_address","Shipping Address","required");
			
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
		
		function payment_confirmation_process()
		{
			
			
		}
	}