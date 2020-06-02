<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public $url = "";

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_gallery');
		
    }

	public function index()
	{
		$data = array('content' => 'jabatan/index');
		$data['data_jabatan'] = $this->m_gallery->getFileJabatan()->result();
		
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'jabatan/input_data');
		
		$this->load->view('main/home',$data);
	}

	public function add_action(){

		$data = array(
				"description" => $this->input->post('txtDeskripsi'),
				"status" => 1
			);

		$query = $this->m_gallery->saveDataJabatan('master_jabatan',$data);

		if($query){
			$success = "alert alert-success";
			$message = "Data has been added";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to insert";
			$icon = "icon fa fa-ban";
		}	
			

		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('administrator/jabatan');
	}

	public function editData($id)
	{
		$data = array('content'=> 'jabatan/edit_data',
					  'data' => $this->m_gallery->getFileJabatan($id)->row()
					  );
		
		


		$this->load->view('main/home',$data);
	}

	public function update_action()
	{	
		$param['id'] = $this->input->post('id');
		
				$data = array(
					"description" => $this->input->post('txtDeskripsi')
					
				);

				$query = $this->m_gallery->updateDataJabatan($param,'master_jabatan',$data);
				if($query){
					$success = "alert alert-success";
					$message = "Data has been update";
					$icon = "icon fa fa-check";
				}else{
					$success = "alert alert-danger";
					$message = "Data failed to update";
					$icon = "icon fa fa-ban";
				}	
			
		
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('administrator/jabatan');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_gallery->deleteData($params,'master_jabatan');
		if($query){
			$success = "alert alert-warning";
			$message = "Data has been deleted";
			$icon = "icon fa fa-check";
		}else{
			$success = "alert alert-danger";
			$message = "Data failed to deleted";
			$icon = "icon fa fa-ban";
		}	
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
            <h4><i class=\"$icon\"></i> Alert!</h4>
            $message 
          </div>");
		redirect('administrator/jabatan');

	}
}
