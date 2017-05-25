<?php

	class Checkout extends CI_Controller{
		
		function __construct()
		{
			
			parent::__construct();	
		}
		
		/* function shipping()
		{
			
			
		}*/
		
		function index()
		{
			
			
		}
		
		function payment()
		{
			//$id_order = $this->uri->segment(3); // id_order	
			
			$data["content"] = "v_payment_confirmation";
			$this->load->view("templates/template",$data);
		}
		
		
	}