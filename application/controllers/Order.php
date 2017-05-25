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
			
			/*
				Array
				(
					[address_book] => 1 // id_user_add
					[id_province] => 6
					[id_city] => 151
					[kecamatan] => 
					[kode_pos] => 80351
					[kurir] => tiki
					[total_weight] => 200
					[layanan_kurir] => 9000 // price ongkir
					[shipping_address] => 
					[billing_address] => 
					[result_ongkir] => 
				)			
			
			
			*/

			//print_r($_POST); 
			echo "Under Development Process, thank you .... ";
			exit;
			
			$id_add_user  = $this->input->post("address_book",TRUE);
			$id_province  = $this->input->post("id_province",TRUE);
			$id_city	  = $this->input->post("id_city",TRUE);
			$kecamatan	  = $this->input->post("kecamatan",TRUE);
			$kode_pos	  = $this->input->post("kode_pos",TRUE);
			
			$kurir 		  = $this->input->post("kurir",TRUE);
			$total_weight = $this->input->post("total_weight",TRUE);
			$layanan_kurir= $this->input->post("layanan_kurir",TRUE);
			
			$exp		  = explode("&",$layanan_kurir);
			$layanan_kurir= $exp[0];
			$ongkir 	  = $exp[1];
			
			$shipping_address = 
						
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