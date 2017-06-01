<?php

	class Order_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
			
			$this->load->model("model_product");	
			
		}
		
		function list_order()
		{
			$str = "SELECT * FROM order_tbl";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
		}
		
		function list_order_member($id_user)
		{
			$str = "SELECT * FROM order_tbl WHERE id_user = '$id_user' ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;
			
		}
		
		function detail_list_order($id_order)
		{
			$str = "SELECT * FROM order_detail_tbl WHERE id_order = '$id_order' ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;
			
		}
		
		function detail_order($id_order)
		{
			$str = "SELECT * FROM order_tbl WHERE id_order = '$id_order' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
			
		}
		
		function change_status($id_order,$status)
		{
			
			$str = "UPDATE order_tbl SET status = '$status' WHERE id_order = '$id_order' ";
			return $q = $this->db->query($str);
			
		}
		
		function generate_order_code()
		{
			date_default_timezone_set("Asia/jakarta");
			
			$mk = "MK";
			$date = date("d");
			$hour = date("H");
			
			//echo date("H:i:s"); exit;	
			
			$str = "SELECT id_order,create_date FROM order_tbl ORDER BY create_date LIMIT 1";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			if(empty($f))
			{
				$int = 1;
				$str = sprintf("%05d",$int);
				
				$new_code = $mk.$date.$hour.$str;
			}
			else
			{
				$substr = substr($f["id_order"],-5);
				$int = (int)$substr;	
				$int++;
				$str = sprintf("%05d",$int);
				
				$new_code = $mk.$date.$hour.$str;
			}
			
			return $new_code;
		}
		
		function insert_order()
		{
			$this->load->model("model_user");
			$this->load->library("cart");
			
			$user_id 	  = $this->session->userdata("user_id");
			
			$new_code 	  = $this->generate_order_code();
			
			$ip_address   = $this->input->ip_address();
			$user_agent   = $this->agent->agent_string();
			$cart_content = $this->cart->contents();
			$subtotal 	  = $this->cart->total();
			$create_date  = date("Y-m-d H:i:s");
			$status 	  = "pending";
			
			$user_add_id  = $this->input->post("address_book",TRUE);
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
			
			$shipping_address = $this->input->post("shipping_address",TRUE);
			$billing_address = $this->input->post("billing_address",TRUE);
			
			$grand_total_session = $this->session->userdata("grand_total");
			
			// tambah data address book
			if(empty($user_add_id))
			{
				$this->model_user->add_address_book();
				$user_add_id = $this->db->insert_id();
			}
			
			$arr = array(
			
				"id_order" => $new_code,
				"id_user" => $user_id,
				
				"subtotal" => $subtotal,
				"ongkir" => $ongkir,
				"tax"    => TAX,
				"grand_total" => $grand_total_session,
				
				"kurir" => $kurir,
				"total_berat" => $total_weight,
				"kurir_service" => $layanan_kurir,
				"user_add_id"=>$user_add_id,
				
				/*"user_add_id" => $user_add_id,
				"id_province" => $id_province,
				"id_city"	  => $id_city,
				"kecamatan"	  => $kecamatan,
				"kode_pos"	  => $kode_pos,*/
				
				"status" 	  => $status,
				"create_date" => $create_date,
				"ip_address"  => $ip_address,
				"user_agent"  => $user_agent
				
			
			);
			
			$this->db->insert("order_tbl",$arr);
			  
			  foreach($cart_content as $row)
			  {
				  $product = $this->model_product->getproductfromID($row["id"]);
				  
				  $sub_total = $row["qty"] * $product->price;
				  $now = date("Y-m-d H:i:s");
				  
				  $str2  = "INSERT INTO order_detail_tbl SET			 ";
				  $str2 .= "id_order			= '$new_code'			,";
				  $str2 .= "product_id		= '$row[id]'			,";
				  $str2 .= "qty				= '$row[qty]'			,";
				  $str2 .= "sub_total			= '$sub_total'			,";
				  $str2 .= "create_date		= '$now'				,";
				  $str2 .= "ip_address		= '$ip_address'			,";
				  $str2 .= "user_agent		= '$user_agent'			 ";
				  
				  $q = $this->db->query($str2);
				  
			  }
			  
			 return array("id_order"=>$new_code);
			
		}
		
		function check_payment_confirmation($no_order)
		{
			$str = "SELECT * FROM payment_confirm WHERE id_order = '$no_order' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
		}
		
		function insert_payment_confirmation($order)
		{
			
			return $this->db->insert("payment_confirm",$order);
			
		}
		
		function list_payment_confirmation()
		{
			
			
		}
		
		function order_payment_confirmation($id_order)
		{
			
			return $this->db->get("payment_confirm",array("id_order"=>$id_order));
		}
		
		function update_order()
		{
			
			
		}
		
	}