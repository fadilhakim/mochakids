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
	}