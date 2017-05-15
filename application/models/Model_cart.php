<?php 
 
class model_cart extends CI_Model { 
     
	public function __construct() {
 		$this->load->database();
 		$this->load->library('cart');
	}

    // Function to retrieve an array with all product information
    function retrieve_products(){
        $query = $this->db->get('product_tbl'); // Select the table products
        return $query->result_array(); // Return the results in a array.
    }

    function validate_add_cart_item(){
 
	    $id = $this->input->post('product_id'); // Assign posted product_id to $id
		
	    $this->db->from('product_tbl');
	    $this->db->where('product_id = '.$id.''); // Select where id matches the posted id
	    $this->db->limit(1);
		$query = $this->db->get(); // Select the products where a match is found and limit

		// Check if a row has matched our product id
		return $query->row_array();
	     
	}

	// Updated the shopping cart
	function validate_update_cart(){
     	
	   
	    // Get the total number of items in cart
	    $total = $this->cart->total_items();
	   
	    // Retrieve the posted information
	    $item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');
	 	/*echo $qty;
	 	die();*/
	    // Cycle true all items and update them
	    for($i=0;$i < $total;$i++)
	    {
	        // Create an array with the products rowid's and quantities. 
	        $data = array(
	           'rowid' => $item[$i],
	           'qty'   => $qty[$i]
	        );
	        //echo $item[$i];

	        // Update the cart with the new information
	        //$this->cart->update($data);
	    }
	}

	public function getproductfromIdandCode($id, $code) {

        $this -> db -> select('*');

        $this -> db -> from('product_tbl');

        $this -> db -> where('product_id = '.$id.'');

        $this -> db -> like('product_code', ''.$code.''); // Select where id matches the posted id

        $query = $this -> db -> get();

        return $query;

	}     
	
	function clear_all()
	{
		$this->cart->destroy();	
		
	}
 
}
     	