<?php

/**
*  Maintenances Model
*/
class Maintenances_Model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_maintenances";
    }

	public function getList($param){
		$this->db->select("tbl_maintenances.*, tbl_buildings.name as building_name, tbl_units.unit_name");
		$this->db->join('tbl_buildings', 'tbl_maintenances.building_id = tbl_buildings.id');
		$this->db->join('tbl_units', 'tbl_maintenances.unit_id = tbl_units.id');

		if(isset($param['user_id'])) {
			$this->db->where('tbl_maintenances.user_id', $param['user_id']);
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