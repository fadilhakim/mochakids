<?php 
	if(empty($content))
	{
		$content = "404page";	
	}

		$this->load->view('templates/meta');
		$this->load->view('templates/header');
		$this->load->model('model_home');
		$this->load->view($content);

		$data['contact_header'] = $this->model_home->contact_header_1()->result();
		$data['contact_footer_1'] = $this->model_home->contact_footer_1()->result();
		$data['contact_admin_1'] = $this->model_home->contact_admin_1()->result();
		$data['contact_admin_2'] = $this->model_home->contact_admin_2()->result();
		$data['contact_admin_3'] = $this->model_home->contact_admin_3()->result();
		$data['contact_saran_1'] = $this->model_home->contact_saran_1()->result();
		$data['contact_saran_2'] = $this->model_home->contact_saran_2()->result();
		$data['bbm'] = $this->model_home->pin_bbm()->result();
		$this->load->view('templates/footer-2',$data);
?>