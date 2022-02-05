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
        //$this->load->model('user_model','userModel');
    }

    public function index() {
        $data['page_title'] = 'dashboard';
        $data['add_plugins'] = array('vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js',
                                    'scripts/helpers/noty-defaults.js');
        $data['add_scripts'] = array('scripts/pages/dashboard.js');

        $this->render('dashboard', $data);
    }
}