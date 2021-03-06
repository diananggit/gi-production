<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingShift2 extends CI_Controller{
    public function __construct(){
        $model = 'report_molding/ReportMoldingShiftModel';
        parent::__construct();
        $this->load->model($model,'ReportMoldingShiftModel');
        
    }
    public function index(){
        $data['moldshift']=$this->ReportMoldingShiftModel->get_shift_dua();

        $this->load->view('r_molding/molding_shift_2',$data);
    }
    
    public function getTotalMoldingPeriode(){
        $data=$this->ReportMoldingShiftModel->getTotalMoldingPeriode2();
        echo json_encode($data);
    }

    public function getDataShiftSatu(){
        $data=$this->ReportMoldingShiftModel->get_shift_dua();
        echo json_encode($data);
    }

    public function getDataTotalShift2(){
        $data=$this->ReportMoldingShiftModel->get_Total_shift2();
        echo json_encode($data);
    }
}