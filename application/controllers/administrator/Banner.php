<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

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
		$data = array('content' => 'banner/index');
		$data['data_banner'] = $this->m_gallery->getFileBanner()->result();
		
		$this->load->view('main/home',$data);
	}

	public function inputData()
	{
		$data = array('content' => 'banner/input_data');
		
		$this->load->view('main/home',$data);
	}

	public function add_action(){

		$description = $this->input->post('txtDeskripsi');
		
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
				"description" => $description,
				"picture" => $fileName,
				"status" => 1
			);

			$query = $this->m_gallery->saveDataBanner('banner',$data);
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
		redirect('administrator/banner');
	}

	public function editData($id)
	{
		$data = array('content'=> 'banner/edit_data',
					  'data' => $this->m_gallery->getFileBanner($id)->row()
		);
		
		


		$this->load->view('main/home',$data);
	}

	public function update_action()
	{	
		$param['id'] = $this->input->post('id');

		$description = $this->input->post('txtDeskripsi');
		
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
					"description" => $description,
					"picture" => $fileName
					);

				$query = $this->m_elearning->updateData($param,'banner',$data);
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
				"description" => $description
			);

			$query = $this->m_gallery->updateDataGallery($param,'banner',$data);
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
		redirect('administrator/banner');
	}

	public function deleteData($id)
	{
		$params['id'] = $id;
		$query = $this->m_elearning->deleteData($params,'banner');
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
		redirect('administrator/banner');

	}
}
