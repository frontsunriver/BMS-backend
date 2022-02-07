<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*  Welcome Controller
*/
class Welcome extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect('/admin/dashboard');
    }
}