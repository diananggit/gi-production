<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeMachinetype extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDowntimeMachineTypeModel');
        
    }
    public function index(){
        $this->load->view('rmekanik/downtime_machine_type');
    }

    public function get_data_machine_type($month){
        $data=$this->ReportDowntimeMachineTypeModel->get_by_month($month);
        echo json_encode($data);
    }
    
    public function get_month(){
        $data = $this->ReportDowntimeMachineTypeModel->get_month();

        echo json_encode($data);
    }

  
    
}