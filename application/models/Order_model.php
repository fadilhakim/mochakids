<?php

	class Order_model extends CI_Model{
		
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
			$f = $q->result_array();
			
			return $f;
			
		}
		
		function change_status($id_order,$status)
		{
			
			$str = "UPDATE order_tbl SET status = '$status' WHERE id_order = '$id_order' ";
			return $q = $this->db->query($str);
			
		}
		
		function generate_order_code()
		{
			$str = "SELECT id_order W";
			
		}
		
		function insert_order()
		{
			$new_code = generate_order_code();
			
			$str  = "INSERT INTO order_tbl SET 			 ";
			$str .= "id_order 			= '$new_code'	,";
			$str .= "id_user			= '$id_user'	,";
			
			
		}
		
		function update_order()
		{
			
			
		}
		
	}