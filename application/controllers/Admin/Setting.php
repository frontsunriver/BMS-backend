<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_Controller.php");
/**
*  User Controller
*/
class Setting extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('building_model','buildingModel');
        $this->load->model('unit_model','unitModel');
        $this->load->model('user_model', 'userModel');
        $this->load->model('owner_model', 'ownerModel');
        $this->load->library('excel');
    }

    public function index() {
        $data['page_title'] = 'SETTING';
        $data['menu_item'] = 'setting';
        $data['sub_menu'] = 'building';
        $data['add_scripts'] = array('scripts/pages/manage_building.js');
        $this->render('setting/building', $data);
    }

    public function getBuildingList() {
        $data['data'] = $this->buildingModel->getListWithUnit($_GET);
        $data['total'] = $this->buildingModel->getListWithUnitCount($_GET)[0]['cnt'];
        $this->returnVal($data);
    }

    public function getUnitList() {
        $param = $_GET;
        $data['data'] = $this->unitModel->getList($param);
        $data['total'] = $this->unitModel->getListCount($_GET)[0]['cnt'];
        $this->returnVal($data);
    }

    public function buildingUpdate() {
        $param = $_POST;
        if($this->buildingModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function buildingAdd() {
        $param = $_POST;
        if($this->buildingModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function buildingDelete() {
        $param = $_POST;
        if($this->buildingModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function importBuildingFile() {
        $list = array();
        $result = array();
        $result['success'] = false;
        $result['message'] = 'something went wrong.';

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            try{
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $data = array(
                            'name'      =>  $name,
                            'address'   =>  $address
                        );
                        $this->buildingModel->add($data);
                    }
                }

                $result['success'] = true;
                $result['message'] = 'Success.';
            }catch (Exception $e){
                $result['success'] = false;
                $result['message'] = 'something went wrong.';
            }
        }   
        $this->returnVal($result);
    }

    public function unitAdd() {
        $param = $_POST;
        if($this->unitModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }
    
    public function unitUpdate() {
        $param = $_POST;
        if($this->unitModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Update error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function unitDelete() {
        $param = $_POST;
        if($this->unitModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function importUnitFile() {
        $building_id = $_POST['building_id'];
        $list = array();
        $result = array();
        $result['success'] = false;
        $result['message'] = 'something went wrong.';

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            try{
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        
                        $data = array(
                            'unit_name'     =>  $name,
                            'building_id'   =>  $building_id
                        );
                        $this->unitModel->add($data);
                    }
                }

                $result['success'] = true;
                $result['message'] = 'Success.';
            }catch (Exception $e){
                $result['success'] = false;
                $result['message'] = 'something went wrong.';
            }
        }   
        $this->returnVal($result);
    }

    public function owner() {
        $data['page_title'] = 'SETTING';
        $data['menu_item'] = 'setting';
        $data['sub_menu'] = 'owner';
        $data['add_scripts'] = array('scripts/pages/manage_owner.js');
        $this->render('setting/owner', $data);
    }

    public function getUserList() {
        $param = $_GET;
        // $param['type'] = 1;
        $data['data'] = $this->userModel->getUserList($param);
        $data['total'] = $this->userModel->getUserListCount($param)[0]['cnt'];
        $this->returnVal($data);
    }

    public function getOwnerList() {
        $param = $_GET;
        $data['data'] = $this->ownerModel->getList($param);
        $data['total'] = $this->ownerModel->getListCount($param)[0]['cnt'];
        $this->returnVal($data);
    }

    public function userAdd() {
        $param = $_POST;
        $param['password'] = md5('123456789');
        if($this->userModel->add($param)) {
            $result['message'] = "Add successfully. Password is created with 123456789";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function adminAdd() {
        $param = $_POST;
        $param['type'] = 2;
        $param['password'] = md5('123456789');
        if($this->userModel->add($param)) {
            $result['message'] = "Add successfully. Password is created with 123456789";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userUpdate() {
        $param = $_POST;
        if($this->userModel->update($param)) {
            $result['message'] = "User updated Successfully";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userDelete() {
        $param = $_POST;
        if($this->userModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        } else {
            $result['message'] = "Delete error. Please check update information and try again.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userResetPassword() {
        $param = $_POST;
        $param['password'] = md5('123456789');
        if($this->userModel->update($param)) {
            $result['message'] = "Password is changed with 123456789";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userOwnerAdd() {
        $param = $_POST;
        if($this->ownerModel->add($param)) {
            $result['message'] = "Add successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userOwnerUpdate() {
        $param = $_POST;
        if($this->ownerModel->update($param)) {
            $result['message'] = "Update successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function userOwnerDelete() {
        $param = $_POST;
        if($this->ownerModel->delete($param)) {
            $result['message'] = "Delete successfully.";
            $result['success'] = true;
        }else {
            $result['message'] = "Something error.";
            $result['success'] = false;
        }
        $this->returnVal($result);
    }

    public function importUserFile() {
        $list = array();
        $result = array();
        $result['success'] = false;
        $result['message'] = 'something went wrong.';

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            try{
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $password = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $mobile = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $address = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $data = array(
                            'first_name'        =>  $first_name,
                            'last_name'         =>  $last_name,
                            'email'             =>  $email,
                            'password'          =>  md5($password),
                            'mobile'            =>  $mobile,
                            'address'           =>  $address,
                            'type'              =>  '1'
                        );
                        $this->userModel->add($data);
                        // if(intval($flag) == 1) {
                        //     $this->userModel->add($data);
                        // }else if(intval($flag) == 2) {
                        //     $this->userModel->updateByEmail($data);
                        // }else if(intval($flag) == 3) {
                        //     $this->userModel->deleteByEmail($data);
                        // }
                    }
                }

                $result['success'] = true;
                $result['message'] = 'File import successfully.';
            }catch (Exception $e){
                $result['success'] = false;
                $result['message'] = 'something went wrong.';
            }
        }   
        $this->returnVal($result);
    }

    public function manager() {
        $data['page_title'] = 'SETTING';
        $data['menu_item'] = 'setting';
        $data['sub_menu'] = 'manager';
        $data['add_scripts'] = array('scripts/pages/manage_manager.js');
        $this->render('setting/manager', $data);
    }

    public function importManagerFile() {
        $list = array();
        $result = array();
        $result['success'] = false;
        $result['message'] = 'something went wrong.';

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            try{
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $password = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $mobile = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $address = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $data = array(
                            'first_name'        =>  $first_name,
                            'last_name'         =>  $last_name,
                            'email'             =>  $email,
                            'password'          =>  md5($password),
                            'mobile'            =>  $mobile,
                            'address'           =>  $address,
                            'type'              =>  '2'
                        );
                        $this->userModel->add($data);
                        // if(intval($flag) == 1) {
                        //     $this->userModel->add($data);
                        // }else if(intval($flag) == 2) {
                        //     $this->userModel->updateByEmail($data);
                        // }else if(intval($flag) == 3) {
                        //     $this->userModel->deleteByEmail($data);
                        // }
                    }
                }

                $result['success'] = true;
                $result['message'] = 'File import successfully.';
            }catch (Exception $e){
                $result['success'] = false;
                $result['message'] = 'something went wrong.';
            }
        }   
        $this->returnVal($result);
    }

}