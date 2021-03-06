<?php

	class Test extends CI_Controller{
		
		
		function __construct()
		{
			parent::__construct();	
		}
		
		function index()
		{
			echo "<form method='post'
			 action='".base_url("test/process")."' enctype='multipart/form-data'> 
					
					<input type='file' name='file' >
					
					
					<input type='submit'>
				</form>	
			";	
			
		}
		
		function weight_total()
		{
			$this->load->model("model_cart");	
			
			
			echo $weight_total = $this->model_cart->weight_total();
		}
		
		function cetak()
		{
			$this->load->library("rajaongkir");
			
			$id_city = $this->uri->segment(3);
			
			$a = $this->rajaongkir->dt_city($id_city);
			
			$result = json_decode($a,TRUE);
			
			print_r($result);
		}
		
		function ci_process()
		{
			error_reporting(E_ALL);
			
			  $config['upload_path']          = 'assets/image';
			  $config['allowed_types']        = 'gif|jpg|png';
			  //$config['max_size']             = 100;
			  //$config['max_width']            = 1024;
			  //$config['max_height']           = 768;
  
			  $this->load->library('upload', $config);
  			  
			  $a = $this->upload->do_upload('file');
			   
			   exit("test");
			  
			  if ( !$a )
			  {
					  $error = array('error' => $this->upload->display_errors());
  					  
					  print_r($error);
					  
					  //$this->load->view('upload_form', $error);
			  }
			  else
			  {
					  $data = array('upload_data' => $this->upload->data());
  					  print_r($data);
					  //$this->load->view('upload_success', $data);
			  }
			
		}
		
		function api_rajaongkir()
		{
			error_reporting(E_ALL);
			
			$this->load->library("rajaongkir");
			
			$province = $this->rajaongkir->show_province();
			
		    $json_decode = json_decode($province,TRUE);
			
			$data["province"] = $json_decode["rajaongkir"]["results"];
			
			$this->load->view("test/rajaongkir",$data);
			
		}
		
		function numberGrouping()
		{
			$arr = array(1,2,3,4,5,6,7,8,9);
			
			$count_group = 3;
			$str_angka = "";
			
			for($i=1 ; $i<=count($arr); $i++)
			{
				$str_angka .= "$i";
				if($i%3 == 0)
				{
					$str_angka .= "-";
				}
				// mendeteksi sisa 4 angka dibelakang 
				
			}
		}
		
		function checkbox()
		{
			$str = "
			
				<form action='".base_url("test/checkbox")."' method='post'>
					<input type='checkbox' name='test' > 
					<input type='submit' value='submit' > 
				</form>
				
			";	
			
			echo $str;
			
			if(!empty($_POST["test"]))
			{
				echo $this->input->post("test");
			}
			
		}
		
		function invoice()
		{
			$this->load->library("rajaongkir");
			
			$this->load->model("model_user");
			$this->load->model("order_model");
			$this->load->model("model_product");
			$this->load->model("bank_model");
			
			$order_id     = "MK021400001";
			$user_sess_id = $this->session->userdata("user_id");
			
			$user_detail = $this->model_user->get_user_detail($user_sess_id);
			$order 		 = $this->order_model->detail_order($order_id);
			$order_detail= $this->order_model->detail_list_order($order_id);
			$address_tr  = $this->order_model->address_tr_detail($order["user_addtr_id"]);
			
			$data["user_detail"] = $user_detail;
			$data["order"]		 = $order;
			$data["order_detail"]= $order_detail;
			$data["address_tr"]  = $address_tr;
 			
			//$this->load->view("invoice/invoice-fancy-page-inline",$data);	
			$this->load->view("invoice/new_invoice",$data);
		}
		
		function payment()
		{
			$this->load->library("rajaongkir");
			
			$this->load->model("model_user");
			$this->load->model("order_model");
			$this->load->model("bank_model");
			
			$order_id     = "MK040000005";
			$user_sess_id = $this->session->userdata("user_id");
			
			$user_detail = $this->model_user->get_user_detail($user_sess_id);
			$order 		 = $this->order_model->detail_order($order_id);
			$payment 	 = $this->order_model->order_payment_confirmation($order_id);
			
			$data["user_detail"] = $user_detail;
			$data["order"]		 = $order;
			$data["payment"]	 = $payment;
			
 			
			//$this->load->view("invoice/invoice-fancy-page-inline",$data);	
			$this->load->view("invoice/payment_email",$data);
			
			
		}
		
		function view_session()
		{
			$sess = $this->session->all_userdata();
			print_r($sess);
			echo "<hr>";
				
		}
	}