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
    	$data['page_title'] = "ISSUE DETAIL";
		$data['menu_item'] = 'issue';
    	$data['add_scripts'] = array('scripts/pages/issue_detail.js');
		$data['list'] = $this->notifyModel->getList($param);
        $this->render('issue/issue_detail', $data);
    }
}