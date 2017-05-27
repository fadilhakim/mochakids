<?php
	$this->load->view('templates/meta-admin');
	$this->load->view('templates/menu-admin');
	$this->load->view('templates/leftsidemenu');
	$this->load->view($content);
	$this->load->view('templates/footer-admin'); 
?>