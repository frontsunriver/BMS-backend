<?php

/**
*  Apartment Model
*/
class Visit_model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_visit_entry";
    }

	public function getList($param){
		$this->db->select("tbl_buildings.name as building_name, tbl_units.unit_name, tbl_visit_entry.*");
		$this->db->join("tbl_buildings", "tbl_buildings.id = tbl_visit_entry.building_id", 'left');
		$this->db->join("tbl_units", "tbl_units.id = tbl_visit_entry.unit_id", 'left');

		if(isset($param['building_id'])) {
			$this->db->where('tbl_visit_entry.building_id', $param['building_id']);
		}

		if(isset($param['start'])) {
			$this->db->limit($param['limit'], $param['start']);
		}

		if(isset($param['query'])) {
			$this->db->group_start();
			$this->db->like('tbl_buildings.name', $param['query'], 'both');
			$this->db->or_like('tbl_units.unit_name', $param['query'], 'both');
			$this->db->or_like('tbl_visit_entry.name', $param['query'], 'both');
			$this->db->or_like('tbl_visit_entry.purpose', $param['query'], 'both');
			$this->db->group_end();
		}

		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function getListCount($param){
		$this->db->select("count(*) as cnt");
		$this->db->join("tbl_buildings", "tbl_buildings.id = tbl_visit_entry.building_id", 'left');
		$this->db->join("tbl_units", "tbl_units.id = tbl_visit_entry.unit_id", 'left');

		if(isset($param['building_id'])) {
			$this->db->where('tbl_visit_entry.building_id', $param['building_id']);
		}

		if(isset($param['start'])) {
			$this->db->limit($param['limit'], $param['start']);
		}

		if(isset($param['query'])) {
			$this->db->group_start();
			$this->db->like('tbl_buildings.name', $param['query'], 'both');
			$this->db->or_like('tbl_units.unit_name', $param['query'], 'both');
			$this->db->or_like('tbl_visit_entry.name', $param['query'], 'both');
			$this->db->or_like('tbl_visit_entry.purpose', $param['query'], 'both');
			$this->db->group_end();
		}

		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function add($param) {
		$dbRet = $this->db->insert($this->tbl_name, $param);
		if (!$dbRet) {
			return false;
		} else {
			return true;
		}
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