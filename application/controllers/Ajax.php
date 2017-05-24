<?php

	class Ajax extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
			
		}
		
		function city_province()
		{
			$this->load->library("rajaongkir");
			
			$id_province = $this->input->post("id_province");
			
			$aa = $this->rajaongkir->city_province($id_province);
			
			return $aa;	
		}
		
		function list_city_province()
		{
			$city_province = $this->city_province();
			$city_province = json_decode($city_province,TRUE);
			$city_province = $city_province["rajaongkir"]["results"];
			
			//var_dump($city_province); exit;
			
			foreach($city_province as $row)
			{
				echo "<option value='$row[city_id]'>$row[city_name]</option>";	
				
			}
			
		}
		
		function dt_city()
		{
			$this->load->library("rajaongkir");
			
			$id_city = $this->input->post("id_city",TRUE);
			
			$aa = $this->rajaongkir->dt_city($id_city);
			
			$aa = json_decode($aa,TRUE);
			$aa = $aa["rajaongkir"]["results"];
			
			echo json_encode($aa);	
			
			
		}
		
		function detail_cost()
		{
			$this->load->library("rajaongkir");
			
			$origin 	 = $this->input->post("origin",TRUE);
			$destination = $this->input->post("destination",TRUE);
			$weight 	 = $this->input->post("weight",TRUE);
			$courier 	 = $this->input->post("courier",TRUE);  
			
			$dt = array("origin"=>$origin,"destination"=>$destination,"weight"=>$weight,"courier"=>$courier);
			
			$result = $this->rajaongkir->cost($dt);
			$result = json_decode($result,TRUE);
			$result = $result["rajaongkir"]["results"][0];
			
			return $result;
			//echo json_encode($result);
			
			
		}
		
		function list_result_ongkir()
		{
			$dt_cost = $this->detail_cost();
			
			print_r($dt_cost);
			
			$cost = $dt_cost["costs"];
			
			foreach($cost as $row)
			{
				$ongkir = $row["cost"][0]["value"];
				$poles_ongkir = number_format($ongkir);
				echo "<option value='$ongkir'>Rp. $poles_ongkir - $row[service] - $row[description]</option>";	
				
			}
			
		}
		
		
		function check_email_user()
		{
			$this->load->library("check_data");
			
			$email = $this->input->post("email");
			
			$check_email_user = $this->check_data->check_email_user($email);	
			
			echo json_encode($check_email_user);
		}
		
		
	}