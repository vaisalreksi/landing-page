<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {
	public $data;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Models');

	}

	public function index()
	{
		$this->data['halaman']='home';
		$this->load->view('homepage/index',$this->data);
	}

	public function contact()
	{
		$this->data['halaman']='contact';
		$this->load->view('homepage/index',$this->data);
	}

	public function ourservices()
	{
		$this->data['halaman']='service';
		$this->load->view('homepage/index',$this->data);
	}

	public function portfolio()
	{
		$this->data['halaman']='portfolio';
		$this->load->view('homepage/index',$this->data);
	}

	public function profile()
	{
		$this->data['halaman']='profile';
		$this->load->view('homepage/index',$this->data);
	}

	public function banner()
	{
			$where['status'] = 0;
		   $query = $this->Models->getData($where,'banner')->result();

			 $data = [];
			 foreach ($query as $value) {
				 $data[] = array(
					 'id' => $value->id,
					 'description' => $value->description,
					 'picture' => base_url()."assets/image/".$value->picture,
					 'status' => $value->status
				 );
			 }

			echo json_encode(['banner'=>$data]);
	}

	public function team()
	{
			$where['team.status'] = 0;
			$join= array('master_jabatan','master_jabatan.id = team.master_jabatan_id');
			$select = ['team.*','master_jabatan.description as jabatan'];
		   $query = $this->Models->getDataJoin($where,'team',$join,$select)->result();

			 $data = [];
			 foreach ($query as $value) {
				 $data[] = array(
					 'id' => $value->id,
					 'jabatan' => $value->jabatan,
					 'master_jabatan_id' => $value->master_jabatan_id,
					 'name' => $value->name,
					 'picture' => base_url()."assets/image/".$value->picture,
					 'status' => $value->status
				 );
			 }

        echo json_encode(['team'=>$data]);
	}

	public function gallery()
	{
			$where['gallery.status'] = 0;
			$join= array('master_gallery_type','master_gallery_type.id = gallery.master_gallery_type_id');
			$select = ['gallery.*','master_gallery_type.description as type'];
		   $data = $this->Models->getDataJoin($where,'gallery',$join,$select)->result();

        echo json_encode(['gallery'=>$data]);
	}

/* End of file crud.php */
/* Location: ./application/controllers/crud.php */
}
