<?php

	class Checkout extends CI_Controller{
		
		function __construct()
		{
			
			parent::__construct();
			$this->load->model("model_event");	
		}
		
		/* function shipping()
		{
			
			
		}*/
		
		function index()
		{
			
			
		}
		
		function payment()
		{
			$this->load->model("bank_model");
			$this->load->model("order_model");
			
			$user_id_sess = $this->session->userdata("user_id");
			$id_order = $this->uri->segment(3);
			$check_order = $this->order_model->detail_order($id_order);
			
			if(!empty($check_order)&& !empty($user_id_sess))
			{
				//$id_order = $this->uri->segment(3); // id_order	
				$data["detail_order"]	 = $check_order;
				$data["bank"]	 = $this->bank_model->get_all();
				$data["content"] = "v_payment_confirmation";
			}
			else
			{
				$data["content"] = "404page";	
			}
			$this->load->view("templates/template",$data);
		}
		
		function payment_process()
		{
			$this->load->library("form_validation");
			$this->load->model("order_model");
			
			$no_order 		   = $this->input->post("no_order",TRUE);
			$jumlah_pembayaran = $this->input->post("jumlah_pembayaran",TRUE);
			$atas_nama		   = $this->input->post("atas_nama",TRUE);
			$user_bank 		   = $this->input->post("user_bank",TRUE);
			$user_bank_rekening = $this->input->post("user_bank_rekening",TRUE);
			$id_bank 		   = $this->input->post("id_bank",TRUE);
			
			$type_form		   = $this->input->post("type_form",TRUE);
			
			
			$document 		   = isset($_FILES["document"]) ? $_FILES["document"] : "";
			
			
			$ip_address 	   = $this->input->ip_address();
			$user_agent		   = $this->input->user_agent();
			
			$this->form_validation->set_rules("grand_total","Grand Total","required|trim");
			$this->form_validation->set_rules("no_order","No Order","required|trim");
			$this->form_validation->set_rules("jumlah_pembayaran","Jumlah Pembayaran","required|trim|matches[grand_total]"); 
			$this->form_validation->set_rules("user_bank","Your Bank","required|trim");
			$this->form_validation->set_rules("user_bank_rekening","Your Bank Account","required|trim"); 
			$this->form_validation->set_rules("atas_nama","Your Name","required|trim");
			$this->form_validation->set_rules("id_bank","Mochakids Bank","required|trim");
			
			$this->form_validation->set_rules("type_form","Type Form","required");
			
			//$check_payment = $this->order_model->check_payment_confirmation($no_order);
			$check_order = $this->order_model->detail_list_order($no_order);
			
			if($this->form_validation->run() == TRUE  && !empty($check_order))
			{
				if(!empty($document["name"]))
				{
					//uplaod gambar bukti pembayaran 
					$dest = "assets/image/payment_conf";
					$ext  = pathinfo($document["name"],PATHINFO_EXTENSION);
					$new_name = $no_order.".$ext";
					move_uploaded_file($document["tmp_name"],$new_name);
				}
				
				$arr = array(
					"id_order"=>$no_order,
					"jumlah_dana"=>$jumlah_pembayaran,
					"nama_pemilik"=>$atas_nama,
					"bank"=>$user_bank,
					"no_rekening"=>$user_bank_rekening,
					"status"=>"pending",
					"bukti_transfer"=>!empty($new_name) ? $new_name : "",
					"id_bank" => $id_bank,
					"ip_address"=>$ip_address,
					"user_agent"=>$user_agent
				
				);
				
				$id_payment = $this->order_model->insert_payment_confirmation($arr);
				
				$payment_dt = $this->order_model-> order_payment_confirmation($id_payment);
				$order_dt = $this->order_model->detail_order($no_order); 
				//email
				$dt = array("order"=>$order_dt,"payment"=>$payment_dt);
				$user = "mochakids3";
				//$message = $this->load->view("payment_conf/email_invoice", $data, true);
				$message = $this->load->view("invoice/payment_email", $dt, true);
				
				$content = array(
					
					"subject" 		=> "Mochakids Invoice - $id_order",
					"subject_title"  => WEBSITE,
					"to" 			 => array($user_detail["email"],"mochakidshop@gmail.com"), 
					"data"			=> array("hello"=>"world"),						
					"message" 		=> $message,
					"mv" 			 => FALSE,
					"alt_message"  => "users/email/email-create-alt", // buat alt nya 
					"amv" 		    => FALSE
				
				);
				
				$this->my_email2->send_email($user,$content);
				
				$suceess = success("You Successfully send a confirmation payment");
				$this->session->set_flashdata("message",$suceess);
				
				redirect(base_url("profile/order/detail/$no_order"));
			}
			else
			{
				$err = "";
				
				if(!empty($check_payment))
				{
					$err .= "<p> you already sent a payment confirmation </p>";	
				}
				
				$err .= validation_errors();
				$danger = danger($err);
				
				$post_data=$this->input->post();
				$this->session->set_flashdata("post_data",$post_data);
				$this->session->set_flashdata("message",$danger);
				
				if($type_form == "checkout")
				{
					redirect(base_url("checkout/payment/$no_order"));
				}
				else if($type_form == "profile")
				{
					redirect(base_url("profile/order/detail/$no_order"));
				}
			}
			
		}
		
	}