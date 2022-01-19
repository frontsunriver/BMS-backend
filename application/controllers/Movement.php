<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  Movement Controller
*/
class Movement extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('movement_model','movementModel');
    }

    public function getList() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        $result = array();
        $list = array();
        $list = $this->movementModel->getList($param);
        $result['success'] = true;
        $result['data'] = $list;
        $this->returnVal($result);
    }

    public function add() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['apartment_id'] = $_POST['apartment_id'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['tenants_email'] = $_POST['tenants_email'];
        $arr['tenants_mobile'] = $_POST['tenants_mobile'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['tenants_name'] = $_POST['tenants_name'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];

        $arr['owner_passport'] = $this->uploadFile($_FILES['owner_passport']);
        $arr['title_deed'] = $this->uploadFile($_FILES['title_deed']);
        $arr['contract'] = $this->uploadFile($_FILES['contract']);
        $arr['tenants_passport'] = $this->uploadFile($_FILES['tenants_passport']);
        $arr['tenants_visa'] = $this->uploadFile($_FILES['tenants_visa']);
        $arr['tenants_emirates_id'] = $this->uploadFile($_FILES['tenants_emirates_id']);

        if($this->movementModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
        // if($this->movementModel->add($param)) {
        //     $result['message'] = "Add successfully.";
        //     $result['success'] = true;
        // }else {
        //     $result['message'] = "Something error.";
        //     $result['success'] = false;
        // }
        // $this->returnVal($result);
        // if(!empty($_FILES['owner_passport']['name'])) {
        //     $res        = array();
        //     $name       = 'owner_passport';
        //     $imagePath  = 'uploads/file_attachment';
        //     $temp       = explode(".",$_FILES['owner_passport']['name']);
        //     $extension  = end($temp);
        //     $filenew    = str_replace(
        //                     $_FILES['owner_passport']['name'],
        //                     $name,
        //                     $_FILES['owner_passport']['name']) . 
        //                     '_' . time() . '' . "." . $extension;       
        //     $config['file_name']   = $filenew;
        //     $config['upload_path'] = $imagePath;
        //     $this->upload->initialize($config);
        //     $this->upload->set_allowed_types('*');
        //     $this->upload->set_filename($config['upload_path'],$filenew);
        //     if(!$this->upload->do_upload('owner_passport')) {
        //       $data = array('msg' => $this->upload->display_errors());
        //     } else {
        //       $data = $this->upload->data();    
        //       if(!empty($data['file_name'])){
        //         $res['image_url'] = 'uploads/file_attachment/' .
        //                             $data['file_name']; 
        //       }
        //       if (!empty($res)) {
        //     echo json_encode(
        //           array(
        //             "status" => 1,
        //             "data" => array(),
        //             "msg" => "upload successfully",
        //             "base_url" => base_url(),
        //             "count" => "0"
        //           )
        //         );
        //       }else{
        //     echo json_encode(
        //           array(
        //             "status" => 1,
        //             "data" => array(),
        //             "msg" => "not found",
        //             "base_url" => base_url(),
        //             "count" => "0"
        //           )
        //         );
        //       }
        //     }
        // }
        // if(!empty($_FILES['owner_passport']['name']))
        //   {
        //     $this->uploadFile($_FILES['owner_passport']);
        //   }
    }
    
    public function outAdd() {
        $param = $_POST;
        $arr = array();
        $arr['building_id'] = $_POST['building_id'];
        $arr['apartment_id'] = $_POST['apartment_id'];
        $arr['move_type'] = $_POST['move_type'];
        $arr['move_date'] = $_POST['move_date'];
        $arr['user_id'] = $_POST['user_id'];
        if($this->movementModel->add($arr)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function update() {
        $request_body = file_get_contents('php://input');
        $param = json_decode($request_body, true);
        if($this->movementModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function delete() {
        $param = $_POST;
        if($this->movementModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
}