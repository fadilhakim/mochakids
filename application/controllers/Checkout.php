<?php

	class Checkout extends CI_Controller{
		
		function __construct()
		{
			
			parent::__construct();	
		}
		
		/* function shipping()
		{
			
			
		}*/
		
		function review()
		{
			
			
			
			$this->load->view("templates/template",$data);
		}
		
		function payment()
		{
			
		}
		
		function shipping_address_process()
		{
			//simpan di session 	
			
		}
		
	}