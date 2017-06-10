<?php

class model_user extends CI_Model

{

	function __construct()

    {

        // Call the Model constructor

        parent::__construct();

         $this->load->helper(array('form','url'));

      	 $this->load->library(array('session', 'form_validation', 'email'));

        	

    }

	

	//send verification email to user's email id

	function sendEmail($name, $subject, $from_email, $message)

	{

		$to_email = 'info@besha-analitika.co.id';

		/*$subject = 'Verify Your Email Address'; */

		$messages = 'Dear Admin Besha Analitika, You get message from :'.$name.'&nbsp;&nbsp;'.$from_email.'<br>'.$message;

		

		//configure email settings

		$config['protocol']  = 'smtp';
		$config['mailtype']  = 'html';
		$config['priority']  = '1';
		$config['charset']   = 'iso-8859-1';
		$config['newline']   = "\r\n"; //use double quotes*/
		$config['wordwrap']  = TRUE;
		$config['smtp_host'] = 'ssl://besha-analitika.co.id';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'info@besha-analitika.co.id';
		$config['smtp_pass'] = 'be=$.P!TQ6X*';

		$this->email->initialize($config);

		//send mail

		$this->email->to($to_email);

		$this->email->from($from_email , $name);

		$this->email->subject($subject);

		$this->email->message($messages);

		return $this->email->send();

	}

	

	//activate user account

	function verifyEmailID($key)

	{

		$data = array('act_status' => 1);

		$this->db->where('md5(email)', $key);

		return $this->db->update('user_tbl', $data);

	}



	//send verification to email admin id

	function sendEmailAdmin($to_email,$username)

	{

		

		$from_email = 'info@besha-analitika.co.id';

		$subject = 'Verify Your Email Address';

		$message = 'Dear Admin Besha Analitika,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.besha-analitika.co.id/login/verify/admin/'.$username.'<br /><br /><br />Thanks<br />';

		

		//configure email settings

		$config['protocol']  = 'smtp';
		$config['mailtype']  = 'html';
		$config['priority']  = '1';
		$config['charset']   = 'iso-8859-1';
		$config['newline']   = "\r\n"; //use double quotes*/
		$config['wordwrap']  = TRUE;
		$config['smtp_host'] = 'ssl://besha-analitika.co.id';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'info@besha-analitika.co.id';
		$config['smtp_pass'] = 'be=$.P!TQ6X*';

		$this->email->initialize($config);

		

		//send mail

		$this->email->from($from_email, 'Besha Analitika');

		$this->email->to($to_email);

		$this->email->subject($subject);

		$this->email->message($message);

		return $this->email->send();

	}



	function verifyEmailAdmin($key)

	{

		$data = array('status' => 1);

		$this->db->where('md5(email)', $key);

		return $this->db->update('admin_tbl', $data);

	}

	



	function list_users(){

		$stock = $this->db->get('admin_tbl');

		return $stock->result();

	}

	
	
	function list_user_member()
	{
		$str = "SELECT * FROM user_tbl ";
		$q = $this->db->query($str);
		$f = $q->result_array();
		
		return $f;	
	}
	
	function get_user_detail($user_id)
	{

		$str = "SELECT * FROM user_tbl WHERE user_id = '$user_id' ";	

		$q = $this->db->query($str);

		$f = $q->row_array();
		return $f;
	}
	
	function get_user_detail_email($email)
	{

		$str = "SELECT * FROM user_tbl WHERE email = '$email' ";	

		$q = $this->db->query($str);

		$f = $q->row_array();
		return $f;
	}
	
	function address_book_list($user_id)
	{
		$str = "SELECT * FROM user_address_tbl WHERE user_id = '$user_id' ";
		$q = $this->db->query($str);
		$f = $q->result_array();
		
		return $f;
	}
	
	function check_account($email,$password)
	{
		$password = md5($password);
		
		$str = "SELECT * FROM user_tbl WHERE email = '$email' AND password = '$password' ";
		$q = $this->db->query($str);
		$f = $q->row_array();
		
		return $f;
	}
	
	function change_password($password)
	{
		$user_id = $this->session->userdata("user_id");
		
		$dt = array(
			"password" => md5($password)
		);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user_tbl', $dt);	
	}
	
	function change_email($email)
	{
		$user_id = $this->session->userdata("user_id");
		
		$dt = array(
			"email" => $email
		);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user_tbl', $dt);
		
	}
	
	function edit_profile_process()
	{
		
		$id_user = $this->session->userdata("user_id");
		
		$contact_person = $this->input->post("contact_person",TRUE);
		$no_telp		= $this->input->post("no_telp",TRUE);
		$no_hp			= $this->input->post("no_hp",TRUE);
		$no_fax			= $this->input->post("no_fax",TRUE);
		//$billing_address = $this->input->post("billing_address",TRUE);
		//$shipping_address = $this->input->post("shipping_address",TRUE);
		
		$data = array(
		
			'contact_person' => $contact_person,
			'no_tlp' => $no_telp,
			'no_hp' => $no_hp,
			"no_fax" => $no_fax,
			//"billing_address" => $billing_address,
			//"shipping_address" => $shipping_address
			
		);
		
		$this->db->where('user_id', $id_user);
		$this->db->update('user_tbl', $data);		
	}
	
	function add_address_book()
	{
		$user_id = $this->session->userdata("user_id");
		$datetime = date("Y-m-d H:i:i");
		
		$contact_person = $this->input->post("contact_person",TRUE);
		if(empty($contact_person))
		{
			$contact_person = $this->session->userdata("contact_person");
		}
		
		$no_hp = $this->input->post("no_hp",TRUE);
		$id_province = $this->input->post("id_province",TRUE);
		$id_city = $this->input->post("id_city",TRUE);
		$kecamatan = $this->input->post("kecamatan",TRUE);
		$kode_pos = $this->input->post("kode_pos",TRUE);
		$shipping_address = $this->input->post("shipping_address",TRUE);
		//$billing_address = $this->input->post("billing_address",TRUE);	
		
		$dt = array(
		
			"user_id" => $user_id,
			"contact_person" => $contact_person,
			"no_hp" => ($no_hp != NULL) ? $no_hp : "",
			"provinsi" => $id_province,
			"kota" => $id_city,
			"kecamatan" => $kecamatan,
			"kode_pos" => $kode_pos,
			"shipping_address" => $shipping_address,
			//"billing_address" => $billing_address ,
			"create_date" => $datetime
		
		
		);
		
		//$this->db->set("");
		$this->db->insert("user_address_tbl",$dt);
	}
	
	function delete_address_book()
	{
		
		
	}
	
	function register_process()
	{
		
		$contact_person = $this->input->post("contact_person",TRUE);
		$email 			= $this->input->post("email",TRUE);
		$password 		= $this->input->post("password",TRUE);
		
		$no_telp 		= $this->input->post("no_telp",TRUE);
		$no_hp			= $this->input->post("no_hp",TRUE);
		$no_fax 		= $this->input->post("no_fax",TRUE);
		
		$id_province    = $this->input->post("id_province",TRUE);
		$id_city 		= $this->input->post("id_city",TRUE);
		$kecamatan		= $this->input->post("kecamatan",TRUE);
		$kode_pos		= $this->input->post("kode_pos",TRUE); 
		
		//$billing_address = $this->input->post("billing_address",TRUE);
		$shipping_address = $this->input->post("shipping_address",TRUE);
		
		$datetime = date("Y-m-d H:i:s");
		
		$dt_user = array(
			"contact_person"=>$contact_person,
			"no_tlp"=>$no_telp,
			"no_fax"=>$no_fax,
			"no_hp"=>$no_hp,
			"email"=>$email,
			"password"=>md5($password),
			"act_status"=>0,
			"joindate"=>$datetime,
			"discount_price"=>0
		
		);
		
		$this->db->insert("user_tbl",$dt_user);
		
		$user_detail = $this->get_user_detail_email($email);
		
		$dt_user_add = array(
			"user_id"=>$user_detail["user_id"],
			"contact_person"=>$contact_person,
			//"billing_address"=>$billing_address,
			"shipping_address"=>$shipping_address,
			"provinsi"=>$id_province,
			"kota"=>$id_city,
			"kecamatan"=>$kecamatan,
			"kode_pos"=>$kode_pos,
			"no_hp"=>$no_hp,
			"create_date"=>$datetime
		);
		
		$this->db->insert("user_address_tbl",$dt_user_add);
		
		
		
		
	}
	
	

}