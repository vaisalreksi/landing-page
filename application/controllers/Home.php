<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('admin');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_administrator');
        $this->load->model('m_murid');
        $this->load->model('m_gallery');
    }

	public function index()
	{
		$idUser = $this->session->userdata('data')['id'];
		$data = array(
			'content' => 'main/dashboard',
			'title'=>'Dashboard',
			'href'=>'Dashboard',
			'url_home'=>''
			);
		
		$this->load->view('main/home',$data);
	}
}
