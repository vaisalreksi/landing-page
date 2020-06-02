<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public $url = "";

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('data')==null){
        	redirect('setup/login');
        }
        $this->load->model('m_gallery');
		$this->load->library('upload');
        
    }

	public function index()
	{
		$data = array('content' => 'team/index');
		$data['data_team'] = $this->m_gallery->getFileTeam()->result();
		
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'team/input_data');
		$data['data_jabatan'] = $this->m_gallery->getFileJabatan()->result();
		
		$this->load->view('main/home',$data);
	}

	public function add_action(){

		$nama 		 = $this->input->post('txtNama');
		$mj 		 = $this->input->post('SltJabatan'); 	
			
			$config = array(
			'upload_path' => "./assets/file/foto/",
			'allowed_types' => "jpg|png|jpeg|pdf|mp4|mp3|avi",
			'overwrite' => TRUE,
			'max_size' => "114091846000000000"
			);	
		
		$this->upload->initialize($config);
		if($this->upload->do_upload('file')){
			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];
			$data = array(
				"master_jabatan_id" => $mj,
				"name" => $nama,
				"picture" => $fileName,
				"status" => 1
			);

			$query = $this->m_gallery->saveDataTeam('team',$data);
			if($query){
				$success = "alert alert-success";
				$message = "Data has been added";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to insert";
				$icon = "icon fa fa-ban";
			}	
		}else{
			$success = "alert alert-danger";
			$message = $this->upload->display_errors();
		}

		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('administrator/team');
	}

	public function editData($id)
	{
		$data = array('content'=> 'team/edit_data',
					  'data' => $this->m_gallery->getFileTeam($id)->row()
		);
		$data['data_jabatan'] = $this->m_gallery->getFileJabatan()->result();
		
		


		$this->load->view('main/home',$data);
	}

	public function update_action()
	{	
		$param['id'] = $this->input->post('id');

		$nama 		 = $this->input->post('txtNama');
		$mj 		 = $this->input->post('SltJabatan'); 	

		if($_FILES['file']['name']!=""){
			
					$config = array(
						'upload_path' => "./assets/file/foto/",
						'allowed_types' => "jpg|png|jpeg|pdf|mkv|mp4|mp3|avi",
						'overwrite' => TRUE,
						'max_size' => "114091846000000000"
					);	
			
			
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$data = array('upload_data' => $this->upload->data());
				$fileName = $data['upload_data']['file_name'];
				$data = array(
					"master_jabatan_id" => $mj,
					"name" => $nama,
					"picture" => $fileName
					);

				$query = $this->m_gallery->updateDataTeam($param,'team',$data);
				if($query){
					$success = "alert alert-success";
					$message = "Data has been update";
					$icon = "icon fa fa-check";
				}else{
					$success = "alert alert-danger";
					$message = "Data failed to update";
					$icon = "icon fa fa-ban";
				}	
			}else{
				$success = "alert alert-danger";
				$message = $this->upload->display_errors();
			}
		}else{
			$data = array(
				"master_jabatan_id" => $mj,
				"name" => $nama
			);

			$query = $this->m_gallery->updateDataTeam($param,'team',$data);
			if($query){
				$success = "alert alert-success";
				$message = "Data has been update";
				$icon = "icon fa fa-check";
			}else{
				$success = "alert alert-danger";
				$message = "Data failed to update";
				$icon = "icon fa fa-ban";
			}	
		}
		
		$this->session->set_flashdata("k", "<div class=\"$success alert-dismissible\">
                <h4><i class=\"$icon\"></i> Alert!</h4>
                $message 
              </div>");
		redirect('administrator/team');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_gallery->deleteData($params,'team');
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
		redirect('administrator/team');

	}
}
