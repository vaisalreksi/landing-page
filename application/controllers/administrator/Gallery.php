<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
		$data = array('content' => 'gallery/index');
		$data['data_gallery'] = $this->m_gallery->getFileGallery()->result();
		
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'gallery/input_data');
		$data['data_master_gallery'] = $this->m_gallery->getFileMasterGallery()->result();
		
		$this->load->view('main/home',$data);
	}

	public function add_action(){

		$description = $this->input->post('txtDeskripsi');
		$mgt 		 = $this->input->post('SltMasterGallery'); 	
		$tgl         = addslashes(date("Y-m-d"));
		$hasil 		 = $this->db->query("select type from master_gallery_type")->row();

		if($hasil->type == 0){
			
			$config = array(
			'upload_path' => "./assets/file/foto/",
			'allowed_types' => "jpg|png|jpeg|pdf|mp4|mp3|avi",
			'overwrite' => TRUE,
			'max_size' => "114091846000000000"
			);	
		}else{
			$config = array(
			'upload_path' => "./assets/file/video/",
			'allowed_types' => "jpg|png|jpeg|pdf|mp4|mp3|avi",
			'overwrite' => TRUE,
			'max_size' => "114091846000000000"
			);	
		}
		

		$this->upload->initialize($config);
		if($this->upload->do_upload('file')){
			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];
			$data = array(
				"master_gallery_type_id" => $mgt,
				"date" => $tgl,
				"description" => $description,
				"media" => $fileName,
				"status" => 1
			);

			$query = $this->m_gallery->saveDataGallery('gallery',$data);
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
		redirect('administrator/gallery');
	}

	public function editData($id)
	{
		$data = array('content'=> 'gallery/edit_data',
					  'data' => $this->m_gallery->getFileGallery($id)->row()
		);
		$data['data_master_gallery'] = $this->m_gallery->getFileMasterGallery()->result();
		
		


		$this->load->view('main/home',$data);
	}

	public function update_action()
	{	
		$param['id'] = $this->input->post('id');

		$description = $this->input->post('txtDeskripsi');
		$mgt 		 = $this->input->post('SltMasterGallery'); 	
		$tgl         = addslashes(date("Y-m-d"));
		$hasil 		 = $this->db->query("select type from master_gallery_type")->row();

		if($_FILES['file']['name']!=""){
			if($hasil->type == 0){
					$config = array(
						'upload_path' => "./assets/file/foto/",
						'allowed_types' => "jpg|png|jpeg|pdf|mkv|mp4|mp3|avi",
						'overwrite' => TRUE,
						'max_size' => "114091846000000000"
					);	
			}else{
				$config = array(
					'upload_path' => "./assets/file/video/",
					'allowed_types' => "jpg|png|jpeg|pdf|mkv|mp4|mp3|avi",
					'overwrite' => TRUE,
					'max_size' => "114091846000000000"
				);	
			}
			
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$data = array('upload_data' => $this->upload->data());
				$fileName = $data['upload_data']['file_name'];
				$data = array(
					"master_gallery_type_id" => $mgt,
					"date" => $tgl,
					"description" => $description,
					"media" => $fileName
					);

				$query = $this->m_gallery->updateDataGallery($param,'gallery',$data);
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
				"master_gallery_type_id" => $mgt,
				"date" => $tgl,
				"description" => $description
			);

			$query = $this->m_gallery->updateDataGallery($param,'gallery',$data);
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
		redirect('administrator/gallery');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_gallery->deleteData($params,'gallery');
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
		redirect('administrator/gallery');

	}
}
