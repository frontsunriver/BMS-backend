<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
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
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->maintenancesModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['carried_date'] = $_POST['carried_date'];
        $arr['user_id'] = $_POST['user_id'];

        $arr['trade_licence'] = $this->uploadFile($_FILES['trade_licence']);

        if($this->maintenancesModel->add($arr)) {
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