<?php 

class Model_event extends CI_Model {


		function list_event() {

			$event = $this->db->get('event_tbl');
			return $event;
		}

		function list_promo() {

			$event = $this->db->get('promo_tbl');
			// echo $this->db->last_query();
			// exit();
			return $event;
		}

		function list_brand() {

			$event = $this->db->get('manufacturer_tbl');
			// echo $this->db->last_query();
			// exit();
			return $event;
		}

		function list_po_category() {

			$event = $this->db->get('category_po_tbl');
			// echo $this->db->last_query();
			// exit();
			return $event;
		}

		function list_po_info() {

			$event = $this->db->get('information_tbl');
			return $event;
		}

		function return_list() {

			$event = $this->db->get('return_tbl');
			return $event;
		}

		function about_list() {

			$event = $this->db->get('about_tbl');
			return $event;
		}

		function htb_list() {

			$event = $this->db->get('htb_tbl');
			return $event;
		}

		function htb() {

			$event = $this->db->get('htb_tbl');
			return $event;
		}

		function about() {

			$event = $this->db->get('about_tbl');
			return $event;
		}

		function list_event_limit() {

			$this->db->select('*');
			$this->db->from('event_tbl');			
			$this->db->order_by('createdate','desc');
			$this->db->limit(3);

			$query = $this->db->get();
			return $query->result();
		}

		function geteventHighLight(){

			//$this->db->get_where('product_tbl',array('product_id' => $id));
			$this->db->select('*');
			$this->db->from('event_tbl');
			$this->db->where('event_status = 1 ');
			
			$this->db->order_by('createdate','desc');
			$this->db->limit(1);

			$query = $this->db->get();
			return $query->result();
		}

		function getEventById($id_event){

			$getidproduct = $this->db->get_where('event_tbl',array('news_id' => $id_event));
			return $getidproduct;
		}
}