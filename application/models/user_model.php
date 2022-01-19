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
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
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
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
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
}