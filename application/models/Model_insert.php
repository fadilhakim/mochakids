<?php 

class Model_insert extends CI_Model {


	public function __construct() {
 		
 		$this->load->database();
 	}

	function list_product() {

		$product = $this->db->get('product_tbl');

		return $product;
	}

	function insert($data,$table){

		return $this->db->insert($table,$data);

		;
	}

	function insertAdmin($data)
    {
		return $this->db->insert('admin_tbl', $data);
	}

	function insertByUsername($data,$username)
    {
		$this->db->where('username', $username);
		$this->db->update('admin_tbl', $data);
	
	}

		

}