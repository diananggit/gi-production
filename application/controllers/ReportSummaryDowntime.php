<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSummaryDowntime extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDowntimeModel');
    }
    
    public function index(){
        $this->load->view('rmekanik/summary_daily_downtime');
    }

   

    public function get_datas($tgl_waiting){
        $result=$this->ReportDowntimeModel->get_by_tgl($tgl_waiting);
        
        echo json_encode($result);
    }

}