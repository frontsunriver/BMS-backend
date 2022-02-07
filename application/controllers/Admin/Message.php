<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class Message extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('messages_model','messageModel');
    }

    public function index() {
        $data['page_title'] = 'MESSAGE';
        $data['add_scripts'] = array('scripts/pages/message.js');
        $data['menu_item'] = 'message';
        $data['message_chanel'] = '';
        $array = array();
        if(isset($_POST['query'])) {
            $array = array('query' => $_POST['query']);
            $data['message_chanel'] = $_POST['query'];
        }
        $data['list'] = $this->messageModel->getList($array);
        $this->render('message/message', $data);
    }

    public function getMessageDetails() {
        $param = $_GET;
        $data['list'] = $this->messageModel->getDetailList(array('message_id' => $param['id']));
        echo json_encode($data['list']);
    }

    public function sendMessage() {
        $param = $_GET;
        $arr = array();
        $arr['content'] = $param['content'];
        $arr['user_id'] = $param['user_id'];
        $arr['reg_date'] = date('Y-m-d');
        $arr['message_id'] = $param['message_id'];

        if($this->messageModel->addDetail($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}