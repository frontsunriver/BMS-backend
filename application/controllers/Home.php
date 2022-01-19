<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../core/My_controller.php");
/**
*  User Controller
*/
class Home extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model','userModel');
        $this->load->library('excel');
    }

    public function index() {
        $result['success'] = true;
        $result['message'] = 'Server is running';
        echo json_encode($result);
    }

    public function importExcel() {
		$list = array();
    	$result = array();
    	$result['success'] = false;
        $result['message'] = 'something went wrong.';

	  	if(isset($_FILES["importexcel"]["name"]))
		{
			$path = $_FILES["importexcel"]["tmp_name"];
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
						$type = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$flag = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$data = array(
							'first_name'		=>	$first_name,
							'last_name'			=>	$last_name,
							'email'				=>	$email,
							'password'			=>	md5($password),
							'mobile'			=>	$mobile,
							'address'			=>	$address,
							'type'				=>	$type
						);
						if(intval($flag) == 1) {
							$this->userModel->add($data);
						}else if(intval($flag) == 2) {
							$this->userModel->updateByEmail($data);
						}else if(intval($flag) == 3) {
							$this->userModel->deleteByEmail($data);
						}
					}
				}

		        $result['success'] = true;
			}catch (Exception $e){
				$result['success'] = false;
		        $result['message'] = 'something went wrong.';
			}
		}	
		$this->returnVal($result);
    }

    public function testimport() {
    	echo 1;
    	$this->load->view('test');
    }

}