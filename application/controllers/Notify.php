<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*  Notify Controller
*/
class Notify extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('notify_model','notifyModel');
    }

    public function getList() {
        $param = $_POST;
        $result = array();
        $list = array();
        $list = $this->notifyModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        if($this->notifyModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
    
    public function update() {
        $param = $_POST;
        if($this->notifyModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function delete() {
        $param = $_POST;
        if($this->notifyModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}