<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_event');	
	}
	 
	public function index()
	{

		$this->load->view('under');
		
	}

	public function view_2()
	{
		$this->load->view('templates/meta');
		
		//$data['promo'] = $this->model_event->list_promo()->result();
		//$data['brand'] = $this->model_event->list_brand()->result();
		
		//print_r($data["brand"]); exit;
		
		$this->load->view('templates/header',$data=array());

		$this->load->model('model_home');
		$this->load->model('model_product');
		
		$data['category'] = $this->model_product->list_category()->result();
		$data['slider'] = $this->model_home->list_slider()->result();
		
		$this->load->view('home-2',$data);

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

	public function besha404()
	{
		
		$data["content"] = "404page";
		$this->load->view("templates/template");
	}

	public function htb()
	{ 
		$this->load->view('templates/meta');
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$data['brand'] = $this->model_event->list_brand()->result();
		$this->load->view('templates/header',$data);

		$this->load->view('htb');
		$this->load->model('model_home');
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

	public function returns()
	{
		$this->load->view('templates/meta');
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$data['brand'] = $this->model_event->list_brand()->result();
		$this->load->view('templates/header',$data);

		$this->load->view('return');
		$this->load->model('model_home');
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
