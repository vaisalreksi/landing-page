<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model {

	public function getData($data,$table)
	{
		$this->db->where($data);
		$this->db->from($table);
		return $this->db->get();
	}

	public function getDataJoin($data,$table,$join,$select)
	{
		$this->db->where($data);
		$this->db->from($table);
		$this->db->join($join[0],$join[1]);
		$this->db->select($select);
		return $this->db->get();
	}

	public function getDataAll($table,$id=null)
	{
		$this->db->from($table);
		if($id){
			$this->db->where('id',$id);
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
