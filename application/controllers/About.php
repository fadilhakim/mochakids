<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view()
	{
		$this->load->view('templates/meta');
			$this->load->model('model_event');
			$this->load->model('model_home');
			$data['promo'] = $this->model_event->list_promo()->result();
			$data['brand'] = $this->model_event->list_brand()->result();
		    $this->load->view('templates/header',$data);

		$data['about'] = $this->model_event->about_list()->result();
		$this->load->view('about',$data);
		$data['contact_header'] = $this->model_home->contact_header_1()->result();
		$data['contact_footer_1'] = $this->model_home->contact_footer_1()->result();
		$data['contact_admin_1'] = $this->model_home->contact_admin_1()->result();
		$data['contact_admin_2'] = $this->model_home->contact_admin_2()->result();
		$data['contact_admin_3'] = $this->model_home->contact_admin_3()->result();
		$data['contact_saran_1'] = $this->model_home->contact_saran_1()->result();
		$data['contact_saran_2'] = $this->model_home->contact_saran_2()->result();
		$data['bbm'] = $this->model_home->pin_bbm()->result();
		$this->load->view('templates/footer-2',$data);
	}

}
