<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_Controller.php");
/**
*  User Controller
*/
class Visit extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('building_model','buildingModel');
        $this->load->model('unit_model','unitModel');
        $this->load->model('visit_model', 'visitModel');
    }

    public function visitentry() {
        $data['page_title'] = 'VIEW ENTRY';
        $data['menu_item'] = 'view_entry';
        $data['add_scripts'] = array('scripts/pages/visit_entry.js');
        $this->render('visit_entry/index', $data);
    }

    public function getBuildingComboList() {
        $data['data'] = $this->buildingModel->getBuildingComboList($_GET);
        $this->returnVal($data);
    }

    public function getUnitComboList() {
        $param = $_GET;
        $data['data'] = $this->unitModel->getComboList($param);
        $this->returnVal($data);
    }

    public function getVisitList() {
        $param = $_GET;
        $data['data'] = $this->visitModel->getList($param);
        $data['total'] = $this->visitModel->getListCount($param)[0]['cnt'];
        $this->returnVal($data);
    }

    public function buildingUpdate() {
        $param = $_POST;
        if($this->buildingModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function visitAdd() {
        $param = $_POST;
        if(isset($_FILES["file"]["name"])) {
            $param['emirates_id'] = $this->uploadFile($_FILES['file']);
        }
        if($this->visitModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Add error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function visitUpdate() {
        $param = $_POST;
        if(isset($_FILES["file"]["name"])) {
            $param['emirates_id'] = $this->uploadFile($_FILES['file']);
        }
        if($this->visitModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function visitDelete() {
        $param = $_POST;
        if($this->visitModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

}