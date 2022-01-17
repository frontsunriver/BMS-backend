<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*  User Controller
*/
class Home extends My_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $result['success'] = true;
        $result['message'] = 'Server is running';
        echo json_encode($result);
    }

}