<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_Controller.php");
/**
*  User Controller
*/
class Card extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('card_model','cardModel');
        $this->load->model('building_model', 'buildingModel');
    }

    public function pendingRequest() {
        $data['page_title'] = "PENDING REQUEST";
        $data['add_scripts'] = array('scripts/pages/pending.js');
        $data['menu_item'] = 'pending';
        $this->render('pending/pending_request', $data);
    }

    public function getPendingRequest() {
    	$param = array('status' => 1);
        $list = array();
        $list = $this->movementModel->getList($param);
        $result['data'] = $list;
        echo json_encode($result);
    }

    public function pendingDetail() {
    	$param = array('id' => $_GET['id']);
    	$data['page_title'] = "PENDING DETAIL";
		$data['menu_item'] = 'pending';
    	$data['add_scripts'] = array('scripts/pages/pending_detail.js');
		$data['list'] = $this->movementModel->getList($param);
        $this->render('pending/pending_detail', $data);
    }

    public function reject() {
    	$param = $_POST;
    	$this->movementModel->reject($param);
        unset($param['status']);
        $list = $this->movementModel->getList($param);
        if(count($list) > 0) {
            $tokens = $this->movementModel->getTokenList($list[0]['user_id']);
            if(count($tokens) > 0) {
                foreach ($tokens as $val) {
                    $body = "Your Request [".$list[0]['building_name']."] is Rejected by manager. Please check Issues";
                    $title = "Request Rejected";
                    $token = $val['token'];
                    $this->sendNotification($token, $title, $body);
                }
            }
        }
    	redirect('/admin/request/pendingRequest');
    }

    public function approve() {
    	$param = $_POST;
    	$this->movementModel->update($param);
        unset($param['status']);
        $list = $this->movementModel->getList($param);
        if(count($list) > 0) {
            $tokens = $this->movementModel->getTokenList($list[0]['user_id']);
            if(count($tokens) > 0) {
                foreach ($tokens as $val) {
                    $body = "Your Request [".$list[0]['building_name']."] is Approved by manager.";
                    $title = "Request Approved";
                    $token = $val['token'];
                    $this->sendNotification($token, $title, $body);
                }
            }
        }
    	redirect('/admin/request/pendingRequest');
    }

    public function accessCard() {
    	$data['page_title'] = "ACCESS CARD";
        $data['add_scripts'] = array('scripts/pages/access_card.js');
		$data['menu_item'] = 'access_card';
        $this->render('card/access_card', $data);
    }

    public function getAccessCardList() {
        $param = $_GET;
        $list = array();
        $list = $this->cardModel->getAdminList($param);
        $result['data'] = $list;
        $result['total'] = $this->cardModel->getAdminListCount($param)[0]['cnt'];
        $this->returnVal($result);
    }

    public function getBuildingComboList() {
        $data['data'] = $this->buildingModel->getBuildingComboList($_GET);
        $this->returnVal($data);
    }

    public function archivedDetail() {
    	$param = array('id' => $_GET['id']);
    	$data['page_title'] = "ARCHIVED DETAIL";
    	$data['menu_item'] = 'archived';
		$data['list'] = $this->movementModel->getList($param);
        $this->render('archived/archived_detail', $data);
    }

}