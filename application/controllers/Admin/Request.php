<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class Request extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('movement_model','movementModel');
    }

    public function pendingRequest() {
        $data['page_title'] = "SMARTOA | PENDING REQUEST";
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
    	$data['page_title'] = "SMARTOA | PENDING DETAIL";
		$data['menu_item'] = 'pending';
    	$data['add_scripts'] = array('scripts/pages/pending_detail.js');
		$data['list'] = $this->movementModel->getList($param);
        $this->render('pending/pending_detail', $data);
    }

    public function reject() {
    	$param = $_POST;
    	$this->movementModel->reject($param);
    	redirect('/admin/request/pendingRequest');
    }

    public function approve() {
    	$param = $_POST;
    	$this->movementModel->update($param);
    	redirect('/admin/request/pendingRequest');
    }

    public function archivedRequest() {
    	$data['page_title'] = "SMARTOA | ARCHIVED REQUEST";
        $data['add_scripts'] = array('scripts/pages/archived.js');
		$data['menu_item'] = 'archived';
        $this->render('archived/archived_request', $data);
    }

    public function getArchivedRequest() {
    	$param = array('notStatus' => 1);
        $list = array();
        $list = $this->movementModel->getList($param);
        $result['data'] = $list;
        echo json_encode($result);
    }

   public function archivedDetail() {
    	$param = array('id' => $_GET['id']);
    	$data['page_title'] = "SMARTOA | ARCHIVED DETAIL";
    	$data['menu_item'] = 'archived';
		$data['list'] = $this->movementModel->getList($param);
        $this->render('archived/archived_detail', $data);
    }
}