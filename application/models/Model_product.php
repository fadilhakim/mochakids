<?php 

class Model_product extends CI_Model {

		public function __construct() {
 		$this->load->database();
 		}

		public function list_product() {

			// $product = $this->db->get('product_tbl');
			// return $product;

			$this->db->select("*");
		    $this->db->from("product_tbl");
		    $this->db->order_by("product_id", "desc");
		    $query = $this->db->get();
		    return $query;
		}

		public function list_category() {

			$category = $this->db->get('category_tbl');
			return $category;
		}

		public function info_po() {

			$category = $this->db->get('information_tbl');
			return $category;
		}

		public function list_category_po() {

			$category = $this->db->get('category_po_tbl');
			return $category;
		}

		public function list_category_brand() {

			$category = $this->db->get('manufacturer_tbl');
			return $category;
		}


		public function list_category_po_by_id($id) {

			$category = $this->db->get_where('category_po_tbl',array('category_po_id' => $id));
			return $category;
		}

		public function list_category_po_active() {

			$category = $this->db->get('category_po_tbl');
			return $category;
		}

		public function get_stock_status() {

			$stock = $this->db->get('product_stock_status');
			return $stock;
		}

		public function getimagefromID($product_id){

		$getimageId = $this->db->get_where('product_image_tbl',array('product_id' => $product_id));

		return $getimageId;

		}

		public function getproductfromID($id){

			//$this->db->get_where('product_tbl',array('product_id' => $id));
			$this->db->select('*');
			$this->db->from('product_tbl');
			$this->db->where('product_id = '.$id.'');
			$query = $this->db->get();
		
			if($query)
			{
				return $query->row();	
			}
			else
			{
				return false;
			}
		}
		
		function get_detail_product($id)
		{
			$this->db->select('*');
			$this->db->from('product_tbl');
			$this->db->where('product_id = '.$id.'');
			$query = $this->db->get();
			
			return $query->row_array();
			
		}

		public function getproductfromSLUGandcat($slug,$cat){

		$getslugproduct = $this->db->get_where('product_tbl',array('category_url' => $slug , 'product_slug' => $cat ));

		return $getslugproduct;

		}

		public function slugCat($id, $slug,$cat){

		$getslugproduct = $this->db->get_where('product_tbl',array('product_id' => $id ,'category_url' => $slug , 'product_slug' => $cat ));

		return $getslugproduct;

		}

		public function getproductfromSLUG($slug){

		$getslugproduct = $this->db->get_where('product_tbl',array('product_slug' => $slug));

		return $getslugproduct;

		}

		public function list_po_category() {

			$event = $this->db->get('category_po_tbl');
			echo $this->db->last_query();
			exit();
			return $event;
		}

		public function list_po_category_active() {

			//$event = $this->db->get_where('category_po_tbl',array('status' => '1'));
	        $this ->db-> select('*');
	        $this ->db-> from('category_po_tbl');
	        $this->db->order_by("category_po_id", "desc");
	        $query = $this->db->get();
	        return $query ->result();

			// return $event;
		}


		public function getcategory($cat){

			$getcate = $this->db->get_where('product_tbl',array('category_url' => $cat));
			// echo $this->db->last_query();
			// exit();
			return $getcate;

		}
		
		public function getcategory_limit($cat,$start=0,$limit=10)
		{
			$getcate = $this->db->get_where('product_tbl',array('category_url' => $cat),$limit,$start);
			// echo $this->db->last_query();
			// exit();
			return $getcate;
		}

		public function getbrand_limit($cat,$start=0,$limit=10)
		{
			$getcate = $this->db->get_where('product_tbl',array('manu_id' => $cat),$limit,$start);
			// echo $this->db->last_query();
			// exit();
			return $getcate;
		}

		public function getfeatured(){

		$getfeatured = $this->db->get_where('product_tbl',array('featured' => '1'));

		return $getfeatured;

		}

		public function searchProduct($keyword){

			$this->db->like('product_title',$keyword);
        	$query  =   $this->db->get('product_tbl');
        	return $query->result();

		}

		public function count_product() {
			return $this->db->count_all("product_tbl");
		}

		public function count_product_po($category_po) {
			// echo $category_po;
			// die();
			$query = $this->db-> where('category_po_url', $category_po) -> get('product_tbl');
      		  //  echo $this->db->last_query(); 
      	// echo $status;
        	$query -> num_rows();
		}


		public function count_product_ready_stock($status) {

        $query = $this->db-> where('product_availability', $status) -> get('product_tbl');
       //  echo $this->db->last_query(); 
      	// echo $status;
        $query -> num_rows();
        //exit();
    }

	public function fetch_product($limit, $start = 0) {
		$qry= $this->db->get("product_tbl", $limit, $start);
		return $qry->result();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

   	 public function fetch_product_by_status($status, $limit, $start = 0) {

        $this ->db-> select('*');
        $this ->db-> from('product_tbl');
        if ($status) {
            $this ->db->where('product_availability', $status);
            $this->db->order_by("product_id", "desc");
        }

        $this ->db->limit($limit, $start);

        $query = $this->db->get();

        return $query ->result();

    }
	
	public function all_fetch_product_by_status($status) {

        $this ->db-> select('*');

        $this ->db-> from('product_tbl');

        if ($status) {

            $this ->db-> where('product_availability', $status);
            $this->db->order_by("product_id", "desc");
        }

        //$this ->db-> limit($limit, $start);

        $query = $this ->db-> get();

        return $query -> result();

    }

    public function fetch_product_by_status_po($category_po, $limit, $start = 0) {

        $this ->db-> select('*');

        $this ->db-> from('product_tbl');

        if ($category_po) {

            $this ->db-> where('category_po_url', $category_po);
            $this->db->order_by("product_id", "desc");

        }

        $this ->db-> limit($limit, $start);

        $query = $this ->db-> get();

        return $query -> result();

    }		


}