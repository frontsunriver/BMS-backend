<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__."/../../core/My_controller.php");
/**
*  User Controller
*/
class Report extends My_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
        $this->load->helper('download');
        $this->load->model('owner_model', 'ownerModel');
    }

    public function index() {
        $data['page_title'] = 'SMARTOA | REPORT';
        $data['menu_item'] = 'report';
        $this->render('report/report', $data);
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
        $objWriter->save('php://output');
    }
}