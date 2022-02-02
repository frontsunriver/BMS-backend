<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  User Controller
*/
class User extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model','userModel');
    }

    public function getUserList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $userList = array();
        $userList = $this->userModel->getUserList($param);
        $result['success'] = true;
        $result['data'] = $userList;
        $this->returnVal($result);
    }

    public function search() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        // $param = $_GET;
        $result = array();
        $userList = array();
        $userList = $this->userModel->searchResult($param);
        $result['success'] = true;
        $result['data'] = $userList;
        $this->returnVal($result);
    }

    public function login() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        if(!isset($param['email']) && !isset($param['password'])) {
            $result['message'] = "Please insert email or password";
            $result['success'] = false;
        } else {
            $userList = $this->userModel->login($param);
            if(count($userList) > 0) {
                if ($userList[0]['password'] == md5($param['password'])) {
                    $result['message'] = "Login Success";
                    $result['success'] = true;
                    $result['data'] = $userList[0];
                }else {
                    $result['message'] = "Password not correct. Please try again.";
                    $result['success'] = false;
                }
            }else {
                $result['message'] = "User does not exist";
                $result['success'] = false;
            }
        }
        $this->returnVal($result);
    }

    public function register() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $param['password'] = md5($param['password']);
        if($this->userModel->register($param)) {
            $result['message'] = "Register Successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function update() {
        $param = $_POST;
        if(isset($param['password'])) {
            $param['password'] = md5($param['password']);
        }
        if(!empty($_FILES['passport']['name'])){
            $param['passport'] = $this->uploadFile($_FILES['passport']);
        }
        if($this->userModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        if(isset($param['password'])) {
            $param['password'] = md5($param['password']);
        }
        if(!empty($_FILES['passport']['name'])){
            $param['passport'] = $this->uploadFile($_FILES['passport']);
        }
        if($this->userModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function delete() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        if($this->userModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}