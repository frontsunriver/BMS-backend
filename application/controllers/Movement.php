<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  Movement Controller
*/
class Movement extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('movement_model','movementModel');
    }

    public function getList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->movementModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function getIssuesReply() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->movementModel->getIssuesReply($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['tenants_email'] = $_POST['tenants_email'];
        $arr['tenants_mobile'] = $_POST['tenants_mobile'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];

        $arr['owner_passport'] = $this->uploadFile($_FILES['owner_passport']);
        $arr['title_deed'] = $this->uploadFile($_FILES['title_deed']);
        $arr['contract'] = $this->uploadFile($_FILES['contract']);
        $arr['tenants_passport'] = $this->uploadFile($_FILES['tenants_passport']);
        $arr['tenants_visa'] = $this->uploadFile($_FILES['tenants_visa']);
        $arr['tenants_emirates_id'] = $this->uploadFile($_FILES['tenants_emirates_id']);

        if($this->movementModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
    
    public function outAdd() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        if($this->movementModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function updateMoveOut() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['id'] = $_POST['id'];
        $arr['status'] = 1;
        if($this->movementModel->update($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function maintenacneUpdate() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['status'] = 1;
        $arr['carried_content'] = $_POST['carried_content'];
        $arr['trade_licence'] = $this->uploadFile($_FILES['trade_licence']);
        $arr['id'] = $_POST['id'];
        if($this->movementModel->update($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function maintenanceAdd() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['carried_content'] = $_POST['carried_content'];
        $arr['trade_licence'] = $this->uploadFile($_FILES['trade_licence']);
        if($this->movementModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function update() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        if($this->movementModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function updateMoveIn() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['unit_id'] = $_POST['unit_id'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['tenants_email'] = $_POST['tenants_email'];
        $arr['tenants_mobile'] = $_POST['tenants_mobile'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['id'] = $_POST['id'];
        $arr['status'] = 1;

        $arr['owner_passport'] = $this->uploadFile($_FILES['owner_passport']);
        $arr['title_deed'] = $this->uploadFile($_FILES['title_deed']);
        $arr['contract'] = $this->uploadFile($_FILES['contract']);
        $arr['tenants_passport'] = $this->uploadFile($_FILES['tenants_passport']);
        $arr['tenants_visa'] = $this->uploadFile($_FILES['tenants_visa']);
        $arr['tenants_emirates_id'] = $this->uploadFile($_FILES['tenants_emirates_id']);

        if($this->movementModel->update($arr)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function reject() {
        $param = $_POST;
        if($this->movementModel->reject($param)) {
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
        if($this->movementModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}