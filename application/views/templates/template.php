<?php 
	if(empty($content))
	{
		$content = "404page";	
	}

		$this->load->view('templates/meta');
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$this->load->view('templates/header',$data);
		$this->load->view($content);
		$this->load->view('templates/footer-2');
?>