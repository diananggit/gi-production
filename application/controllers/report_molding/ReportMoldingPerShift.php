<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingPerShift extends CI_Controller{
    public function __construct(){
        $model = 'report_molding/ReportMoldingShiftModel';
        parent::__construct();
        $this->load->model($model,'ReportMoldingShiftModel');
        
    }
    public function index(){
        $this->load->view('r_molding/molding_mesin_shift');
    }

    public function getDataShiftSatu(){
        $data=$this->ReportMoldingShiftModel->get_all();
        echo json_encode($data);
    }

    public function getTotal(){
        $data=$this->ReportMoldingShiftModel->get_Total();
        echo json_encode($data);
    }
}