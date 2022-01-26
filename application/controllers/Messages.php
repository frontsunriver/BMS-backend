<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  Messages Controller
*/
class Messages extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('messages_model','messagesModel');
    }

    public function getList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->messagesModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function getDetailList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->messagesModel->getDetailList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        $arr = array();
        $arr['title'] = $_POST['title'];
        $arr['messages'] = $_POST['messages'];
        $arr['user_id'] = $_POST['user_id'];
        $arr['reg_date'] = date('Y-m-d');
        if($this->messagesModel->add($arr)) {
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
        $arr['reg_date'] = date('Y-m-d');
        $arr['message_id'] = $_POST['message_id'];

        if($this->messagesModel->addDetail($arr)) {
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
        if($this->messagesModel->update($param)) {
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
        if($this->messagesModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}