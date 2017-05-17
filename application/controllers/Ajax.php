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
		
	}