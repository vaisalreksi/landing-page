<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

	public function getFileGallery($params=null)
	{
		return $this->db->get('gallery');

	}

	public function getFileTeam($params=null)
	{
		return $this->db->get('team');

	}

	public function getFileBanner($params=null)
	{
		return $this->db->get('banner');

	}
	
	public function getFileMasterGallery($params=null)
	{
		return $this->db->get('master_gallery_type');

	}

	public function getFileJabatan($params=null)
	{
		return $this->db->get('master_jabatan');

	}

	public function getSum($id)
	{
		$this->db->where('id_guru',$id);
		$this->db->from('rating');
		$query = $this->db->select('SUM(rating) as sum_rating');
		return $query->get();
	}

	
	public function updateDataMasterGallery($params,$table,$data)
	{
		
		$this->db->where($params);
		return $this->db->update($table,$data);
	}

	public function updateDataJabatan($params,$table,$data)
	{
		
		$this->db->where($params);
		return $this->db->update($table,$data);
	}

	public function updateDataGallery($params,$table,$data)
	{
		
		$this->db->where($params);
		return $this->db->update($table,$data);
	}

	public function updateDataTeam($params,$table,$data)
	{
		
		$this->db->where($params);
		return $this->db->update($table,$data);
	}

	public function deleteData($params,$table)
	{
		
		$this->db->where($params);
		return $this->db->delete($table);
	}

	public function saveDataMasterGallery($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function saveDataJabatan($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function saveDataGallery($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function saveDataTeam($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function saveDataBanner($table,$data)
	{
		return $this->db->insert($table,$data);
	}

}
