<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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
	function __construct(){
		parent::__construct();		
		$this->load->model('model_login');
		$this->load->model("model_user"); 
		$this->load->model("model_event");
	}

	function index(){
		
		$this->authentification->logged_out();
		
		$this->load->view('admin/v_login');
		
	}

	function aksi_login(){
		
		$this->authentification->logged_out();
		
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek = $this->model_login->cek_login($username, $password);
		
			if($cek->num_rows()==1){
				foreach ($cek->result() as $data) {
					if($data->status == 1) {
						$sess_data['admin_id'] = $data->admin_id;
						$sess_data['username'] = $data->username;
						$sess_data['role_id'] = $data->role_id;
						$this->session->set_userdata($sess_data);
						redirect(base_url("admin"));		
					}
					else{
						
						$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissable">
	                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                                Maaf Account anda belum aktif
	                                            </div>');
						redirect(base_url("login"));
					}
					
				}

				

			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissable">
	                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                                Maaf username/password yang anda masukan salah.
	                                            </div>');
				redirect(base_url("login"));
			}
		
	}

	function logout(){
		$this->session->sess_destroy(); // jangan session destroy
		redirect(base_url(''));
	}

	function logout_member(){
		
		$this->authentification->logged_in();
		
		$array_items = array("user_id","contact_person","member_email");
		
		$this->session->unset_userdata($array_items);
		
		redirect(base_url('login/login_customer'));
	}

	function login_customer(){
		
		$this->authentification->logged_out();
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$data['brand'] = $this->model_event->list_brand()->result();
		$this->load->view('templates/meta');
		$this->load->view('templates/header',$data);
		$this->load->view('register',$data);
		$this->load->view('templates/footer-2');
	}
	
	function register()
	{
		$this->authentification->logged_out();
		
		$this->load->helper("form");
		$this->load->library("rajaongkir");

		$user_id = $this->session->userdata("user_id");		
		$province = $this->rajaongkir->show_province();
		$json_decode = json_decode($province,TRUE);
			
		$data["province"] = $json_decode["rajaongkir"]["results"];
		$this->load->model('model_event');
		$data['promo'] = $this->model_event->list_promo()->result();
		$data['brand'] = $this->model_event->list_brand()->result();
		$this->load->view('templates/meta');
		$this->load->view('templates/header',$data);
		$this->load->view('register',$data);
		$this->load->view('templates/footer-2');
	}
	
	function register_process()
	{
		$this->load->library("form_validation");
		$this->load->library("check_data");
		
		$contact_person = $this->input->post("contact_person",TRUE);
		$email 			= $this->input->post("email",TRUE);
		$password 		= $this->input->post("password",TRUE);
		$confirm_password = $this->input->post("confirm_password",TRUE);
		
		$no_telp 		= $this->input->post("no_telp",TRUE);
		$no_hp			= $this->input->post("no_hp",TRUE);
		$no_fax 		= $this->input->post("no_fax",TRUE);
		
		$id_province    = $this->input->post("id_province",TRUE);
		$id_city 		= $this->input->post("id_city",TRUE);
		$kecamatan		= $this->input->post("kecamatan",TRUE);
		$kode_pos		= $this->input->post("kode_pos",TRUE); 
		
		//$billing_address = $this->input->post("billing_address",TRUE);
		$shipping_address = $this->input->post("shipping_address",TRUE);
		
		$this->form_validation->set_rules("contact_person","Contact Person","required|trim");
		$this->form_validation->set_rules("email","email","required|valid_email|trim");
		$this->form_validation->set_rules("password","Password","required|min_length[6]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","required|matches[password]");
		
		$this->form_validation->set_rules("no_telp","No Telp","required|trim");
		$this->form_validation->set_rules("no_hp","No Hp","required|trim");
		
		$this->form_validation->set_rules("id_province","Province","required|trim");
		$this->form_validation->set_rules("id_city","City","required|trim");
		$this->form_validation->set_rules("kecamatan","Kecamatan","required|trim");
		$this->form_validation->set_rules("kode_pos","Kode Pos","required|trim");
		
		//$this->form_validation->set_rules("billing_address","Billing Address","required|trim");
		$this->form_validation->set_rules("shipping_address","Shipping Address","required|trim");
		
		$check_email = $this->check_data->check_email_user($email);
		
		if($this->form_validation->run() == TRUE && $check_email == TRUE)
		{
			
			$this->model_user->register_process();
			
			$message = success(" You Success fully register ");
			$this->session->set_flashdata('message',$message);
			redirect(base_url("login/login_customer"));
		}
		else
		{
			$post_data = $this->input->post();
			$this->session->set_flashdata("post_data",$post_data);
			
			$err = validation_errors();
			if($check_email == FALSE)
			{
				$err .= "<p> Your Email is already registered </p>";
			}
			$message = danger($err);
			$this->session->set_flashdata('message',$message);
			redirect($this->agent->referrer());
			
		}
				
		
	}

	function aksi_login_costumer(){
		
		$this->authentification->logged_out();
		//echo "why "; exit;
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$cek = $this->model_login->cek_login_costumer($email, $password);
		
			if($cek->num_rows()==1){
				
				foreach ($cek->result() as $data) {

				  // $sess_data['admin_id'] = $data->admin_id;
				  $sess_data["user_id"]		   = $data->user_id; 
				  $sess_data['contact_person'] = $data->contact_person;
				  $sess_data["member_email"]   = $data->email;
				  
				  $this->session->set_userdata($sess_data);
				  
				  $message = success("You Successfully Login");
				  $this->session->set_flashdata('message',$message);
				  redirect($this->agent->referrer());

				  
				}		
					
			} else{
				
				$message = danger("Maaf email / password yang anda masukan salah ");
				$this->session->set_flashdata('message',$message);
				redirect(base_url("login/login_customer"));
			}


	}


}
