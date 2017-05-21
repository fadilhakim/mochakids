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
			
			
		}
		
		function account_setting_process()
		{
			
			
		}
		
		function payment_confirmation_process()
		{
			
			
		}
	}