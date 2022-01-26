<?php

/**
*  Messages Model
*/
class Messages_Model extends CI_Model
{
	public $tbl_name;
	public function __construct() {
        parent::__construct();
		$this->tbl_name = "tbl_messages";
    }

	public function getList($param){
		$this->db->select("tbl_messages.*, tbl_users.first_name, tbl_users.last_name, tbl_users.email, tbl_users.mobile");
		$this->db->join('tbl_users', 'tbl_messages.user_id = tbl_users.id', 'left');

		if(isset($param['user_id'])) {
			$this->db->where('tbl_messages.user_id', $param['user_id']);
		}
		$query = $this->db->get($this->tbl_name);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return array();
		}
	}

	public function getDetailList($param){
		$this->db->select("tbl_message_detail.*, tbl_users.first_name, tbl_users.last_name, tbl_users.email, tbl_users.mobile");
		$this->db->join('tbl_users', 'tbl_message_detail.user_id = tbl_users.id', 'left');

		if(isset($param['user_id'])) {
			$this->db->where('tbl_message_detail.user_id', $param['user_id']);
		}
		if(isset($param['message_id'])) {
			$this->db->where('tbl_message_detail.message_id', $param['message_id']);
		}
		$query = $this->db->get('tbl_message_detail');
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

	public function addDetail($param) {
		$this->db->insert('tbl_message_detail', $param);
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