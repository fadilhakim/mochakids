<?php 

class Model_home extends CI_Model {


		function list_clients() {

			$clients = $this->db->get('client_tbl');
			return $clients;
		}

		function list_slider() {

			// $slider = $this->db->get('slider_tbl');
			// return $slider;

			$this->db->select("*");
		    $this->db->from("slider_tbl");
		    $this->db->order_by("slider_id", "desc");
		    $query = $this->db->get();
		    return $query;
		}

		function list_manufacturer() {

			$slider = $this->db->get('manufacturer_tbl');
			return $slider;
		}

		function list_news() {
			$news = $this->db->get('news_tbl');
			return $news;
		}

		function list_subscriber() {
			$subs = $this->db->get('subscriber_tbl');
			return $subs;
		}

		function list_member() {
			$subs = $this->db->get('user_tbl');
			return $subs;
		}

		function list_brand() {
			$subs = $this->db->get('manufacturer_tbl');
			return $subs;
		}

		function list_discount() {

			return $this->db->get('discount_tbl');
		}

		function contact_header_1() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'header_1'));
			return $getcate;
		}

		function contact_footer_1() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'footer_1'));
			return $getcate;
		}

		function contact_admin_1() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'admin_1'));
			return $getcate;
		}

		function contact_admin_2() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'admin_2'));
			return $getcate;
		}

		function contact_admin_3() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'admin_3'));
			return $getcate;
		}

		function contact_saran_1() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'saran_1'));
			return $getcate;
		}

		function contact_saran_2() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'saran_2'));
			return $getcate;
		}
		function pin_bbm() {

			$getcate = $this->db->get_where('contact_tbl',array('title_contact' => 'pin_bbm'));
			return $getcate;
		}


}