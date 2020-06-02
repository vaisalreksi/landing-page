<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_gallery extends CI_Controller {

	public $url = "";

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_elearning');
        $this->load->model('m_gallery');
		$this->load->library('upload');
        
    }

	public function index()
	{
		$data = array('content' => 'master_gallery/index');
		$data['data_master_gallery'] = $this->m_gallery->getFileMasterGallery()->result();
		
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'master_gallery/input_data');
		
		$this->load->view('main/home',$data);
	}

	public function add_action(){

		$data = array(
				"description" => $this->input->post('txtDeskripsi'),
				"type" => $this->input->post('RdoType'),
				"status" => 1
			);

		$query = $this->m_gallery->saveDataMasterGallery('master_gallery_type',$data);

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
		redirect('administrator/master_gallery');
	}

	public function editData($id)
	{
		$data = array('content'=> 'master_gallery/edit_data',
					  'data' => $this->m_gallery->getFileMasterGallery($id)->row()
					  );
		
		


		$this->load->view('main/home',$data);
	}

	public function update_action()
	{	
		$param['id'] = $this->input->post('id');
		
				$data = array(
					"description" => $this->input->post('txtDeskripsi'),
					"type" => $this->input->post('RdoType')
				);

				$query = $this->m_gallery->updateDataMasterGallery($param,'master_gallery_type',$data);
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
		redirect('administrator/master_gallery');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_gallery->deleteData($params,'master_gallery_type');
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
		redirect('administrator/master_gallery');

	}
}
