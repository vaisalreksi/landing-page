<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_elearning');
    }

	public function index()
	{
		$data = array('content' => 'setup/login','role' => 'admin');
		$this->load->view('setup/index',$data);
	}

	public function login()
	{
		$data = array('username'=>$this->input->post('email'),'password'=>$this->input->post('password'),'status'=>1);

		$query = $this->m_elearning->getData($data,'users');
		if($query->num_rows() > 0){
			foreach ($query->result() as $value) {
				 $sessionArray['data'] = array('id'=>$value->id,
                                        'nama'=>$value->nama,
                                        'username'=>$value->username,
                                    );

                    $this->session->set_userdata($sessionArray);
                    redirect('home');
			}
		}else{
				$success = "alert alert-danger";
				$message = "Invalid User";
				$icon = "icon fa fa-ban";

				$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\" style=\"width:80%;\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message
              </div>");

			redirect('admin');
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('data');
		$this->session->sess_destroy();
		redirect('admin','refresh');
	}

	public function sendEmail()
	{

		$config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'contact.paramata@gmail.com',
        'smtp_pass' => 'vlzfewwrhdrmcbju',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
    );
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($this->input->post('email'), 'admin');
    $this->email->to('vaisalreksi@gmail.com, aldihardiansyah.12@gmail.com');
    $this->email->subject($this->input->post('subject'));
    $message = "<table><tr><td>Name</td><td>:</td><td>".$this->input->post('name')."</td></tr><tr><td>Email</td><td>:</td><td>".$this->input->post('email')."</td></tr><tr><td>Message</td><td>:</td><td>".$this->input->post('message')."</td></tr></table>";
    $this->email->message($message);
    if ( ! $this->email->send()) {
        return json_encode(['success'=>false,'message'=>$this->email->print_debugger()]);
    }

    return json_encode(['success'=>true,'message'=>'Berhasil']);
	}

}
