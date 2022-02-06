<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class Pending extends My_Controller
{
    public function __construct() {
        parent::__construct();
        //$this->load->model('user_model','userModel');
    }

    public function index() {
        $data['page_title'] = 'pending_request';
        $data['add_plugins'] = array();
        $data['add_scripts'] = array('scripts/pages/pending.js');

        $this->render('pending/list', $data);
    }

    public function ajax_load_data()
    {
        
    }
}