<?php

/**
*  Users Model
*/
class User_Model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_users";
    }

	public function getUserList($param){
		$this->db->select("*");
		if(isset($param['email'])) {
			$this->db->where('email', $param['email']);	
		}
		if(isset($param['building_id'])) {
			$this->db->where('building_id', $param['building_id']);		
		}
		// if(isset($param['type'])) {
		// 	$this->db->where('type', $param['type']);		
		// }
		if(isset($param['query'])) {
			$this->db->like('first_name', $param['query'], 'both');
			$this->db->or_like('last_name', $param['query'], 'both');
			$this->db->or_like('email', $param['query'], 'both');
			$this->db->or_like('mobile', $param['query'], 'both');
		}
		$this->db->where('type =',2);
		$query = $this->db->get($this->tbl_name);
		$data = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach ($result as $key => $value) {
				$sql = "SELECT tbl_buildings.id, tbl_buildings.name from (select * from tbl_owners where user_id = ".$value['id']." GROUP BY building_id) a left join tbl_buildings on tbl_buildings.id = a.building_id";
				$sub_query = $this->db->query($sql);
				if($sub_query->num_rows() > 0){
					$value['building_list'] = $sub_query->result_array();
					array_push($data, $value);
				}else{
					$value['building_list'] = [];
					array_push($data, $value);
				}
			}
			return $data;
		}else {
			return array();
		}
	}

	public function login($param) {
		return $this->getUserList($param);
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

	public function updateByEmail($param)
	{
		$this->db->set($param);
		$this->db->where('email', $param['email']);
		$this->db->update($this->tbl_name);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function register($param) {
		$this->db->insert($this->tbl_name, $param);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function add($param) {
		$this->db->insert($this->tbl_name, $param);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function delete($param)
	{
		$this->db->where('id', $param['id']);
		$this->db->delete($this->tbl_name);
		$this->db->where('user_id', $param['id']);
		$this->db->delete('tbl_owners');
		return true;
	}

	public function deleteByEmail($param)
	{
		$this->db->where('email', $param['email']);
		$this->db->delete($this->tbl_name);
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function Check_Old_Password($user_id, $old_password){

		$this->db->where('is_active', 1);
		$this->db->where('id', $user_id);
		$this->db->where('password', $old_password);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	public function searchResult($param) {
		$this->db->select("*");
		if(isset($param['query'])){
			$this->db->like('first_name', $param['query'], 'both');
			$this->db->like('last_name', $param['query'], 'both');
			$this->db->or_like('email', $param['query'], 'both');
			$this->db->or_like('mobile', $param['query'], 'both');
			$this->db->or_like('address', $param['query'], 'both');
		}
		if(isset($param['id'])) {
			$this->db->where('id', $param['id']);
		}
		$data = array();
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach ($result as $key => $value) {
				$this->db->select('tbl_owners.*, tbl_units.unit_name, tbl_buildings.name as building_name, tbl_users.first_name, tbl_users.last_name, tbl_users.email');
				$this->db->join('tbl_buildings', 'tbl_owners.building_id = tbl_buildings.id', 'left');
				$this->db->join('tbl_units', 'tbl_owners.unit_id = tbl_units.id', 'left');
				$this->db->join('tbl_users', 'tbl_owners.user_id = tbl_users.id', 'left');
				$this->db->where('tbl_owners.user_id', $value['id']);
				$sub_query = $this->db->get('tbl_owners');
				if($sub_query->num_rows() > 0){
					array_push($data, array('user_info' => $value, 'building_info' => $sub_query->result_array()));
				}else{
					array_push($data, array('user_info' => $value, 'building_info' => []));
				}
			}
			return $data;
		}else {
			return array();
		}
	}
}