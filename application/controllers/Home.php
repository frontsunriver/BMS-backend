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
        $this->load->model('building_model', 'buildingModel');
        $this->load->model('unit_model', 'unitModel');
        $this->load->model('owner_model', 'ownerModel');
        $this->load->library('excel');
        $this->load->helper('download');
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

    public function importBuildingExcel() {
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
						$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$data = array(
							'name'		=>	$name,
							'address'	=>	$address
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

    public function importUnitExcel() {
    	$building_id = $_POST['building_id'];
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
						$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						
						$data = array(
							'unit_name'		=>	$name,
							'building_id'	=>	$building_id
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

    public function generateExcel() {
        // create file name
        $fileName = 'bms-'.time().'.xlsx';  
        // load excel library
        $listInfo = $this->ownerModel->getList(array());
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Building Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Unit Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');       
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Phone');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['building_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['unit_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['first_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list['mobile']);
            $rowCount++;
        }
        $filename = "bms". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('uploads/'.$filename);
        $result['success'] = true;
        $result['data'] = $filename;
        $this->returnVal($result);
    }

    public function generateExcel1() {
	//load xlsx library
		$headers = array('Building Name' => 'string', 'Unit Name' => 'string', 'First Name' => 'string', 'Last Name' => 'String', 'Email' => 'string');
		
		$listInfo = $this->ownerModel->getList(array());
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Sales Information for Products');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://roytuts.com');
		$writer->setCompany('https://roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for products');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($listInfo as $sf):
			$writer->writeSheetRow('Sheet1',array($sf['building_name'], $sf['unit_name'], $sf['first_name'], $sf['last_name'], $sf['email']));
		endforeach;
		
		$fileLocation = 'salesinfo.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	}

	public function download() {
		echo $_GET['url'];
        force_download(FCPATH."/".$_GET['url'], NULL);
	}

    public function testimport() {
    	echo 1;
    	$this->load->view('test');
    }

}