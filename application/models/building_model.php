<?php

/**
*  Building Model
*/
class Building_Model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_buildings";
    }

	public function getList($param){
		$this->db->select("*");
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function getListWithUnit($param) {

		$this->db->select("*");

		if(isset($param['query'])) {
			$this->db->like('name', $param['query'], 'both');
		}
		
		$query = $this->db->get($this->tbl_name);
		$data = array();
		if ($query->num_rows() > 0) {
			$rows = $query->result_array();
			foreach ($rows as $key => $value) {
				$query = "SELECT tbl_buildings.id, IFNULL(a.cnt, 0) as cnt  from tbl_buildings left join (SELECT IFNULL(count(*),0) as cnt, building_id FROM `tbl_units` group by building_id ) a on a.building_id = tbl_buildings.id where tbl_buildings.id = ".$value['id'];
				$sub_result = $this->db->query($query)->result_array();
				$value['cnt'] = $sub_result[0]['cnt'];
				array_push($data, $value);
			}
			return $data;
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

	public function searchResult($param) {
		$this->db->select("*");
		$this->db->like('name', $param['query'], 'both');
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}
}