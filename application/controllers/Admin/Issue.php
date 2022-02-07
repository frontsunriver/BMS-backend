<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class Issue extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('notify_model','notifyModel');
    }

    public function repairRequest() {
        $data['page_title'] = "ISSUE REQUEST";
        $data['add_scripts'] = array('scripts/pages/issue.js');
        $data['menu_item'] = 'issue';
        $this->render('issue/issue_list', $data);
    }

    public function getIssue() {
    	$param = array('status' => 1);
        $list = array();
        $list = $this->notifyModel->getList($param);
        $result['data'] = $list;
        echo json_encode($result);
    }

    public function repairDetail() {
    	$param = array('id' => $_GET['id']);
        $data['notify_id'] = $param['id'];
    	$data['page_title'] = "ISSUE DETAIL";
		$data['menu_item'] = 'issue';
    	$data['add_scripts'] = array('scripts/pages/issue_detail.js');
		$data['list'] = $this->notifyModel->getDetailList(array('notify_id' => $param['id']));
        $data['userid'] = $this->session->userdata(USER_INFO)['id'];

        //print_r($data['list']);exit();
        $this->render('issue/issue_detail', $data);
    }

    public function sendNotify() {
        $param = $_GET;
        $arr = array();
        $arr['content'] = $param['content'];
        $arr['user_id'] = $this->session->userdata(USER_INFO)['id'];
        $arr['submit_date'] = date('Y-m-d');
        $arr['notify_id'] = $param['notify_id'];

        if($this->notifyModel->addDetail($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}