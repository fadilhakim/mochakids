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
	public function index()
	{

		$this->load->view('under');
	}

	public function view_2()
	{
		$this->load->view('templates/meta');
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$this->load->view('templates/header',$data);

		$this->load->model('model_home');
		$this->load->model('model_product');
		
		$data['category'] = $this->model_product->list_category()->result();
		$data['slider'] = $this->model_home->list_slider()->result();
		
		$this->load->view('home-2',$data);

		$this->load->view('templates/footer-2');
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
		$this->load->view('templates/header',$data);

		$this->load->view('htb');

		$this->load->view('templates/footer-2');
	}

	public function returns()
	{
		$this->load->view('templates/meta');
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$this->load->view('templates/header',$data);

		$this->load->view('return');

		$this->load->view('templates/footer-2');
	}

}
