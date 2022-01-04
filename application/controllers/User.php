<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $param = $_POST;
        $result = array();
        $userList = array();
        if(isset($param['email'])) {
            $userList = $this->userModel->getUserList($param);
        }
        $result['success'] = true;
        $result['data'] = $userList;
        $this->returnVal($result);
    }

    public function login() {
        $param = $_POST;
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

    public function update() {
        $param = $_POST;
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
        $param = $_POST;
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