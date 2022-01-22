<?php

/**
*  Apartment Model
*/
class Owner_model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_owners";
    }

	public function getList($param){
		$this->db->select("tbl_apartments.*, tbl_buildings.name as building_name");
		$this->db->join('tbl_buildings', 'tbl_apartments.building_id = tbl_buildings.id');
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