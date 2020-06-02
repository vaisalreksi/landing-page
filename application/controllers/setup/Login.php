<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_elearning');
    $this->load->library(array('email')); 

    }

	public function index()
	{
		$data = array('content' => 'setup/login','role' => 'user');
		$this->load->view('setup/index',$data);
	}

	public function login()
	{
		$data = array('email'=>$this->input->post('email'),'password'=>$this->input->post('password'));

		if($this->input->post('type') == "member"){
			$table = "murid";
			$status = "";
		}else{
			$table = "guru";
			$data['status !='] = 2;
		}

		$query = $this->m_elearning->getData($data,$table);
		if($query->num_rows() > 0){
			$foto = "";
			foreach ($query->result() as $value) {
				if($this->input->post('type') == "instruktur"){
					$status = $value->status;
					$foto = $value->foto;
				}
				 $sessionArray['data'] = array('id'=>$value->id,                    
                                        'nama'=>$value->nama,
                                        'email'=>$value->email,
                                        'type'=>$this->input->post('type'),
                                        'foto' => $foto,
                                        'status' =>$status
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                    if($this->input->post('type') == "member"){
                    	redirect('murid/pelajaran');
                    }else{
                    	redirect('guru/profile/data/'.$value->id);
                    }
			}
		}else{
			$success = "alert alert-danger";
			$message = "Invalid User";
			$icon = "icon fa fa-ban";

			$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
		    <h4><i class=\"$icon\"></i> Alert!</h4>
		    $message 
		  </div>");

		redirect('setup/login');
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('data');
		$this->session->sess_destroy();
		redirect('setup/login','refresh'); 
	}
}
