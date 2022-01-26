<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
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
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->notifyModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function getDetailList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->notifyModel->getDetailList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        $arr = array();
        $arr['content'] = $_POST['content'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['submit_date'] = date('Y-m-d');
        $arr['type'] = $_POST['type'];

        if(!empty($_FILES['photofile']['name'])){
            $arr['photofile'] = $this->uploadFile($_FILES['photofile']);    
        }
        

        if($this->notifyModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function addDetail() {
        $param = $_POST;
        $arr = array();
        $arr['content'] = $_POST['content'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['submit_date'] = date('Y-m-d');
        $arr['notify_id'] = $_POST['notify_id'];

        if($this->notifyModel->addDetail($arr)) {
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