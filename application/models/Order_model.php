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
		
		function detail_order($id_order)
		{
			$str = "SELECT * FROM order_detail_tbl WHERE id_order = '$id_order' ";
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
			$this->load->library("cart");
			
			$new_code 	= $this->generate_order_code();
			$ip_address = $this->input->ip_address();
			$user_agent = $this->agent->agent_string();
			$cart_content = $this->cart->contents();
			$grand_total = $this->cart->total();
			$status = "pending";
			$id_user = 1;
			
			
			
			
			  $str  = "INSERT INTO order_tbl SET 			 ";
			  $str .= "id_order 			= '$new_code'	,";
			  $str .= "id_user			= '$id_user'	,";
			  $str .= "grand_total		= '$grand_total',";
			  $str .= "status				= '$status'		,";
			  $str .= "create_date		= now()			,";
			  $str .= "ip_address			= '$ip_address'	 ";
			  
			  $this->db->query($str);
			  
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
		  
		  	
			
			
			
		}
		
		function insert_payment_confirmation($order)
		{
			$str  = "INSERT INTO payment_confirm SET ";
			$str .= "";
			
		}
		
		function list_payment_confirmation()
		{
			
			
		}
		
		function order_payment_confirmation($id_order)
		{
			
			
		}
		
		function update_order()
		{
			
			
		}
		
	}