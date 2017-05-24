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
			$this->authentification->logged_in();
			
			$cart_content =  $this->cart->contents();
			
			if(!empty($cart_content))
			{
				$this->order_model->insert_order();
				
				//hapus cart 
				$this->cart->destroy();
				
				echo $suceess = success("You Successfully save Order");
				$this->session->set_flashdata("message",$suceess);
				
				//redirect();
			}
			else
			{
				echo $danger = danger("Your Cart is empty");
				$this->session->set_flashdata("message",$danger);
				
				//redirect("cart/show_cart");	
			}
			
		}
		
		function update_order()
		{
			
			
			
		}
		
		function test()
		{
			$sess = $this->session->all_userdata();
			print_r($sess);
			
		}
		
	}