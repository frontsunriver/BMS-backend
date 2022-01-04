<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*  Apartment Controller
*/
class Apartment extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('apartment_model','apartmentModel');
    }

    public function getList() {
        $param = $_POST;
        $result = array();
        $list = array();
        $list = $this->apartmentModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        if($this->apartmentModel->add($param)) {
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
        if($this->apartmentModel->update($param)) {
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
        if($this->apartmentModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}