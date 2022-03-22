<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_Controller.php");
/**
*  Visit Controller
*/
class Visit extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('visit_model','visitModel');
    }

    public function getList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->visitModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function accessAdd() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['reg_date'] = date('Y-m-d');
        $arr['user_id'] = $_POST['user_id'];

        if($this->visitModel->accessAdd($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        
        if($this->visitModel->add($param)) {
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
        if($this->visitModel->update($param)) {
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
        if($this->visitModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function getUnitList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->visitModel->getUnitList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }
}