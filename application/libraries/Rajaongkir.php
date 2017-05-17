<?php 

	class Rajaongkir{
		
		private $api_key = "7cb3f80934b05e2488a412d0d221ac1f";
		
		
		function general($url)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"key:".$this->api_key
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
			  return "cURL Error #:" . $err;
			} else {
			  return $response;
			}	
			
		}
		
		function detail_province($id)
		{
			return $this->general("http://api.rajaongkir.com/starter/province?id=$id");
		}
		
		function show_province()
		{
			return $this->general("http://api.rajaongkir.com/starter/province");	
		}
		
		function detail_city($id_city,$id_province)
		{
			return $this->general("http://api.rajaongkir.com/starter/city?id=$id_city&province=$id_province");	
		}
		
		function city_province($id_province)
		{
			return $this->general("http://api.rajaongkir.com/starter/city?province=$id_province");	
			
		}
		
		function cost()
		{
			return $this->general("http://api.rajaongkir.com/starter/cost");	
		}
		
		
		
	}