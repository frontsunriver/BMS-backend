<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*  Maintenances Controller
*/
class Maintenances extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('maintenances_model','maintenancesModel');
    }

    public function getList() {
        $param = $_POST;
        $result = array();
        $list = array();
        $list = $this->maintenancesModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        if($this->maintenancesModel->add($param)) {
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
        if($this->maintenancesModel->update($param)) {
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
        if($this->maintenancesModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}