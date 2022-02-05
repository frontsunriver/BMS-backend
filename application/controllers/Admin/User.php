<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class User extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model','userModel');

        $userdata = $this->session->userdata();
        if(!isset($userdata)){
            redirct('/admin/dashboard');
        }

    }

    public function signin() {
        $data['page_title'] = 'signin';
        $data['add_scripts'] = array('scripts/pages/signin.js');

        $this->load->view('user/signin', $data);
    }

    public function signin_action() {
    	$param = $_POST;

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
                        $this->session->set_userdata(USER_INFO, $userList[0]);
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

    public function signup() {
        $data['page_title'] = 'signup';
        $data['add_scripts'] = array('scripts/pages/signup.js');
        $this->load->view('user/signup' ,$data);
    }

    public function signup_action() {
        $param = $_POST;
        $result = array();
        $param['password'] = md5($param['password']);
        $userList = $this->userModel->login($param);
        if (count($userList) > 0) {
            $result['message'] = "Email exist.";
            $result['success'] = false;
        }else{
            if($this->userModel->register($param)) {
                $result['message'] = "Register Successfully.";
                $result['success'] = true;
            }else {
                $result['message'] = "Something error.";
                $result['success'] = false;
            }
        }
        
        $this->returnVal($result);        
    }

}