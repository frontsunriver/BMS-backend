<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  Building Controller
*/
class Building extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('building_model','buildingModel');
    }

    public function getList() {
        $param = $_POST;
        $result = array();
        $list = array();
        $list = $this->buildingModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function getListWithUnit() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->buildingModel->getListWithUnit($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        if($this->buildingModel->add($param)) {
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
        if($this->buildingModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function delete() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        if($this->buildingModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function search() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->buildingModel->searchResult($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }
}