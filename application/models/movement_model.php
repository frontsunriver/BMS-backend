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
		$this->db->select("tbl_noc_move.*, tbl_buildings.name as building_name");
		$this->db->join('tbl_buildings', 'tbl_noc_move.building_id = tbl_buildings.id');
		
		if(isset($param['move_type'])) {
			$this->db->where('tbl_noc_move.move_type', $param['move_type']);
		}
		if(isset($param['user_id'])) {
			$this->db->where('tbl_noc_move.user_id', $param['user_id']);
		}
		
		$query = $this->db->get($this->tbl_name);
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