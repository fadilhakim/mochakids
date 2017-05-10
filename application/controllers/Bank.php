<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bank_model');
        $this->load->library('form_validation');
		$this->load->helper("alert");
    }

    public function index()
    {
        $bank = $this->Bank_model->get_all();

        $data = array(
            'bank_data' => $bank,
			"content"=>"admin/v_bank"
        );
		
        $this->load->view('admin/template', $data);
    }

    /*public function read($id) 
    {
        $row = $this->Bank_model->get_by_id($id);
        if ($row) {
			
            $data = array(
			  'id_bank' => $row->id_bank,
			  'nama_bank' => $row->nama_bank,
			  'rekening_bank' => $row->rekening_bank,
			  'nama_pemilik' => $row->nama_pemilik,
			  'logo_bank' => $row->logo_bank,
			);
			
            $this->load->view('bank_ms_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Bank'));
        }
    }*/

    /* public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Bank/create_action'),
	    'id_bank' => set_value('id_bank'),
	    'nama_bank' => set_value('nama_bank'),
	    'rekening_bank' => set_value('rekening_bank'),
	    'nama_pemilik' => set_value('nama_pemilik'),
	    'logo_bank' => set_value('logo_bank'),
	);
        $this->load->view('bank_ms_form', $data);
    }*/
    
    public function create_action() 
    {
        $this->_rules();
		
		$file = $_FILES["logo_bank"];
		$file_name = $file["name"];
		$file_type = $file["type"];
		$file_tmp = $file["tmp_name"];
		$file_size = $file["size"];
		
        if ($this->form_validation->run() == FALSE && empty($file_name)) {
			
			
			$err  = validation_errors();
			
			$alert = danger($err);

            $this->session->set_flashdata('message', $alert);
			redirect(site_url("bank"));
			//$this->index();
			
        } else {
			
			
			$nama_bank = $this->input->post('nama_bank',TRUE);
			
			$path = "assets/image/bank/";
			$ext = pathinfo($file_name);
			$new_name = $nama_bank.".$ext[extension]";
			$new_path = $path.$new_name; 
			
			//echo $new_path; exit;
			
			$data_bank = array(
			
			  'nama_bank' => $this->input->post('nama_bank',TRUE),
			  'rekening_bank' => $this->input->post('rekening_bank',TRUE),
			  'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
			  "logo_bank" => $new_name
			  
	    	);
            
			
			$upload = move_uploaded_file($file_tmp,$new_path);
			
			if($upload)
			{
			
           	 	$this->Bank_model->insert($data_bank);
			
				$alert = success("Insert Bank Success");
			
            	
			}
			else
			{
				$alert = danger("Upload image error");	
			}
			
			$this->session->set_flashdata('message', $alert);
            redirect(site_url('bank'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bank_model->get_by_id($id);
		$bank_data = $this->Bank_model->get_all();

        if ($row) {
            $bank = array(
			
               
				'id_bank' => set_value('id_bank', $row->id_bank),
				'nama_bank' => set_value('nama_bank', $row->nama_bank),
				'rekening_bank' => set_value('rekening_bank', $row->rekening_bank),
				'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
				"logo_bank" => $row->logo_bank
				
			);
			
			$data["content"] = "admin/v_edit_bank";
			$data["bank"] = $bank;
			$data["bank_data"] = $bank_data;
		
            $this->load->view('admin/template', $data);
			
        } else {
			
			$alert = danger("Data not found ");
			
            $this->session->set_flashdata('message', $alert);
            redirect(site_url('Bank')); // karena gak ada datanya 
        }
    }
    
    public function update_action() 
    {
        
		
		$id_bank = $this->input->post("id_bank",TRUE);
		$row = $this->Bank_model->get_by_id($id_bank);
		
		$file = $_FILES["logo_bank"];
		$file_name = $file["name"];
		$file_type = $file["type"];
		$file_tmp = $file["tmp_name"];
		$file_size = $file["size"];
		
		//$this->_rules();
		$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
		$this->form_validation->set_rules('rekening_bank', 'rekening bank', 'trim|required');
		$this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
		//$this->form_validation->set_rules('logo_bank', 'logo bank', 'required');
	
		$this->form_validation->set_rules('id_bank', 'id_bank', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
        if ($this->form_validation->run() == FALSE) {
			
			$err  = validation_errors();
			
			$alert = danger($err);

            $this->session->set_flashdata('message', $alert);
			redirect(site_url("bank/update/$id_bank"));
			
            //$this->update($this->input->post('id_bank', TRUE));
			
        } else {
			
			$logo_bank = $row->logo_bank;
			if(!empty($file_name))
			{
				$path = "assets/image/bank/";
				$ext = pathinfo($file_name);
				$new_name = $nama_bank.".$ext[extension]";;
				$new_path = $path.$new_name; 
				$upload = move_uploaded_file($file_tmp,$new_path);
				$logo_bank = $new_name;
			}
			
            $data_bank = array(
			
			  'nama_bank' 	  => $this->input->post('nama_bank',TRUE),
			  'rekening_bank' => $this->input->post('rekening_bank',TRUE),
			  'nama_pemilik'  => $this->input->post('nama_pemilik',TRUE),
			  'logo_bank' 	  => $logo_bank
			  
			);

           	$this->Bank_model->update($this->input->post('id_bank', TRUE), $data_bank);
			$alert = success("Update Bank Success");
		
            $this->session->set_flashdata('message', $alert);
            redirect(site_url("bank/update/$id_bank"));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bank_model->get_by_id($id);

        if ($row) {
            $this->Bank_model->delete($id);
			
			// hapus image 
			$path = "assets/image/bank/".$row->logo_bank;
			if(file_exists($path))
			{
				unlink($path);
			}
			
			$alert = success("Delete Bank Success");
			
            $this->session->set_flashdata('message', $alert);
            redirect(site_url('bank'));
        } else {
			
			$alert = danger("Data Not Found");
			
            $this->session->set_flashdata('message', $alert);
            redirect(site_url('bank'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
		$this->form_validation->set_rules('rekening_bank', 'rekening bank', 'trim|required');
		$this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
		$this->form_validation->set_rules('logo_bank', 'logo bank', 'required');
	
		$this->form_validation->set_rules('id_bank', 'id_bank', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-08 18:37:49 */
/* http://harviacode.com */