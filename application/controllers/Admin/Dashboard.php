<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
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
        //$this->load->model('user_model','userModel');
    }

    public function index() {
        $data['page_title'] = 'DASHBOARD';
        $data['add_plugins'] = array('vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js',
                                    'scripts/helpers/noty-defaults.js');
        $data['add_scripts'] = array('scripts/pages/dashboard.js');
        $data['menu_item'] = 'dashboard';
        $this->render('dashboard', $data);
    }
}