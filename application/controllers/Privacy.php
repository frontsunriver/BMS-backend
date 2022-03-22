<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  Apartment Controller
*/
class Privacy extends My_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('privacy');
    }

}