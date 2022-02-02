<?php

/**
*  Movement Model
*/
class Movement_Model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_noc_move";
    }

	public function getList($param){
		$this->db->select("tbl_noc_move.*, tbl_units.unit_name, tbl_buildings.name as building_name, tbl_users.first_name, tbl_users.last_name");
		$this->db->join('tbl_buildings', 'tbl_noc_move.building_id = tbl_buildings.id');
		$this->db->join('tbl_units', 'tbl_units.id = tbl_noc_move.unit_id');
		$this->db->join('tbl_users', 'tbl_noc_move.user_id = tbl_users.id');
		if(isset($param['move_type'])) {
			$this->db->where('tbl_noc_move.move_type', $param['move_type']);
		}
		if(isset($param['user_id'])) {
			$this->db->where('tbl_noc_move.user_id', $param['user_id']);
		}
		if(isset($param['status'])) {
			$this->db->where('tbl_noc_move.status', $param['status']);
		}
		if(isset($param['notStatus'])) {
			$this->db->where('tbl_noc_move.status !=', $param['notStatus']);
		}
		
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function getIssuesReply($param){
		$this->db->select("*");
		if(isset($param['move_id'])) {
			$this->db->where('tbl_move_opinions.move_id', $param['move_id']);
		}
		$query = $this->db->get('tbl_move_opinions');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function add($param) {
		$this->db->insert($this->tbl_name, $param);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function update($param)
	{
		$this->db->set($param);
		$this->db->where('id', $param['id']);
		$this->db->update($this->tbl_name);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function reject($param)
	{
		$array['id'] = $param['id'];
		$array['status'] = $param['status'];
		$this->db->set($array);
		$this->db->where('id', $array['id']);
		$this->db->update($this->tbl_name);
		if($this->db->affected_rows() > 0){
			$arr['move_id'] = $param['id'];
			$arr['content'] = $param['reply'];
			$arr['reg_date'] = date('Y-m-d');
			$this->db->insert('tbl_move_opinions', $arr);
			if($this->db->affected_rows() > 0)
				return true;
			else
				return false;
		} else
			return false;
	}

	public function delete($param)
	{
		$this->db->where('id', $param['id']);
		$this->db->delete($this->tbl_name);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
}