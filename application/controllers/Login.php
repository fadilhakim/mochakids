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
		$data["content"] = "login";
		$this->load->view("templates/template",$data);
	}
	
	function register()
	{
		$this->authentification->logged_out();
		
		$this->load->library("rajaongkir");

		$user_id = $this->session->userdata("user_id");		
		$province = $this->rajaongkir->show_province();
		$json_decode = json_decode($province,TRUE);
			
		$data["province"] = $json_decode["rajaongkir"]["results"];
		
		$data["content"] = "register";
		$this->load->view("templates/template",$data);
	}
	
	function register_process()
	{
		$this->load->library("form_validation");
		$this->load->library("check_data");
		
		/*Array
		(
			[contact_person] => 
			[password] => 
			[email] => 
			[confirm_password] => 
			[no_telp] => 
			[no_hp] => 
			[no_fax] => 
			[billing_address] => 
			[shipping_address] => 
		)
		*/	
		
		$contact_person = $this->input->post("contact_person",TRUE);
		$email 			= $this->input->post("email",TRUE);
		$password 		= $this->input->post("password",TRUE);
		
		$no_telp 		= $this->input->post("no_telp",TRUE);
		$no_hp			= $this->input->post("no_hp",TRUE);
		$no_fax 		= $this->input->post("no_fax",TRUE);
		
		$billing_address = $this->input->post("billing_address",TRUE);
		$shipping_address = $this->input->post("shipping_address",TRUE);
		
		$this->form_validation->set_rules("contact_person","Contact Person","required");
		$this->form_validation->set_rules("email","email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required|matches[confirm_password]");
		
		$this->form_validation->set_rules("no_telp","No Telp","required");
		$this->form_validation->set_rules("no_hp","No Hp","required");
		
		$this->form_validation->set_rules("billing_address","Billing Address","required");
		$this->form_validation->set_rules("Shipping Address","Shipping Address","required");
		
		$check_email = $this->check_data->check_email_user($email);
		
		if($this->form_validation->run() == TRUE && $check_email == TRUE)
		{
			
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

				  if($data->act_status != 1) {
					  
					  $message = danger("Silahkan konfirmasi email terlebih dahulu");
					  $this->session->set_flashdata('message',$message);
					  redirect(base_url("login/login_customer"));
				  }

				  else {

					  // $sess_data['admin_id'] = $data->admin_id;
					  $sess_data["user_id"]		   = $data->user_id; 
					  $sess_data['contact_person'] = $data->contact_person;
					  $sess_data["member_email"]   = $data->email;
					  
					  $this->session->set_userdata($sess_data);
					  
					  $message = success("You Successfully Login");
					  $this->session->set_flashdata('message',$message);
					  redirect($this->agent->referrer());
				  
				  }	
				}		
					
			} else{
				
				$message = danger("Maaf email / password yang anda masukan salah ");
				$this->session->set_flashdata('message',$message);
				redirect(base_url("login/login_customer"));
			}


	}


}
