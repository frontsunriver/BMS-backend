<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_Controller.php");
/**
*  User Controller
*/
class Acmaintenance extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('acmaintenance_model','acmaintenanceModel');
        $this->load->model('building_model', 'buildingModel');
    }

    public function dashboard() {
    	$data['page_title'] = "AC MAINTENANCE";
        $data['add_scripts'] = array('scripts/pages/ac_maintenance.js');
		$data['menu_item'] = 'ac_maintenance';
        $this->render('ac_maintenance/index', $data);
    }

    public function getList() {
        $param = $_GET;
        $list = array();
        $list = $this->acmaintenanceModel->getAdminList($param);
        $result['data'] = $list;
        $result['total'] = $this->acmaintenanceModel->getAdminListCount($param)[0]['cnt'];
        $this->returnVal($result);
    }

    public function getBuildingComboList() {
        $data['data'] = $this->buildingModel->getBuildingComboList($_GET);
        $this->returnVal($data);
    }
}