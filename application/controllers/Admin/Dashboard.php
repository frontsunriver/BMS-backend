<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_Controller.php");
/**
*  User Controller
*/
class Dashboard extends My_Controller
{
    public function __construct() {
        parent::__construct();
        // $userdata = $this->session->userdata(USER_INFO);
        // if(!isset($userdata)){
        //     redirect('/admin/user/signin');
        // }
        $this->load->model('user_model','userModel');
        $this->load->model('movement_model','movementModel');
        $this->load->model('notify_model', 'notifyModel');
        $this->load->model('building_model', 'buildingModel');
        $this->load->model('unit_model', 'unitModel');
    }

    public function index() {
        $data['page_title'] = 'DASHBOARD';
        $data['add_plugins'] = array('vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js',
                                    'scripts/helpers/noty-defaults.js');
        $data['add_scripts'] = array('scripts/pages/dashboard.js');
        $data['menu_item'] = 'dashboard';

        $data['admin_users'] = $this->userModel->getUserListCount(array('type' => 2));
        $data['owners'] = $this->userModel->getUserListCount(array('type' => 1));
        $data['pending_noc_move_in'] = $this->movementModel->getList(array('move_type' => 1, 'status' => 1));
        $data['approved_noc_move_in'] = $this->movementModel->getList(array('move_type' => 1, 'status' => 2));
        $data['rejected_noc_move_in'] = $this->movementModel->getList(array('move_type' => 1, 'status' => 3));
        $data['pending_noc_move_out'] = $this->movementModel->getList(array('move_type' => 2, 'status' => 1));
        $data['approved_noc_move_out'] = $this->movementModel->getList(array('move_type' => 2, 'status' => 2));
        $data['rejected_noc_move_out'] = $this->movementModel->getList(array('move_type' => 2, 'status' => 3));
        $data['pending_noc_move_maintenance'] = $this->movementModel->getList(array('move_type' => 3, 'status' => 1));
        $data['approved_noc_move_maintenance'] = $this->movementModel->getList(array('move_type' => 3, 'status' => 2));
        $data['rejected_noc_move_maintenance'] = $this->movementModel->getList(array('move_type' => 3, 'status' => 3));
        $data['issues'] = $this->notifyModel->getList(array());
        $data['building'] = $this->buildingModel->getListWithUnitCount(array());
        $data['unit'] = $this->unitModel->getListCount(array());

        $this->render('dashboard', $data);
    }
}