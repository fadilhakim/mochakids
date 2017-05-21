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
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

	function logout_member(){
		
		$this->authentification->logged_in();
		
		$array_items = array("user_id","contact_person","member_email");
		
		$this->session->unset_userdata($array_items);
		
		redirect(base_url('login/login_costumer'));
	}

	function login_customer(){
		
		$this->authentification->logged_out();
		$data["content"] = "login";
		$this->load->view("templates/template",$data);
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
					  redirect(base_url("login/login_costumer"));
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
				redirect(base_url("login/login_costumer"));
			}


	}


}
