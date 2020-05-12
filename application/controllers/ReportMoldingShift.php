<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingShift extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingShiftModel');

    }

    public function index(){
        $data=$this->ReportMoldingShiftModel->get_all();

        $this->load->view('r_molding/molding_sihft',$data);
    }

  
    public function ajax_get_all_shift(){
        $data=$this->ReportMoldingShiftModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_shift($shift){
        $result=$this->ReportMoldingShiftModel->get_by_shift($shift);
        
        echo json_encode($result);
    }
}