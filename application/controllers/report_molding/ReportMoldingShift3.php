<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingShift3 extends CI_Controller{
    public function __construct(){
        $model = 'report_molding/ReportMoldingShiftModel';
        parent::__construct();
        $this->load->model($model,'ReportMoldingShiftModel');
        
    }
    public function index(){
        $this->load->view('r_molding/molding_shift_3');
    }

    public function getDataShiftTiga(){
        $data=$this->ReportMoldingShiftModel->get_shift_tiga();
        echo json_encode($data);
    }
    public function getDataTotalShift3(){
        $data=$this->ReportMoldingShiftModel->get_Total_shift3();
        echo json_encode($data);
    }
}