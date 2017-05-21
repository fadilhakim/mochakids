<?php 
	if(empty($content))
	{
		$content = "404page";	
	}

		$this->load->view('templates/meta');
		$this->load->view('templates/header');
		$this->load->view($content);
		$this->load->view('templates/footer-2');
?>