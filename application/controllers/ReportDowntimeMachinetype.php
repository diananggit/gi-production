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

    public function get_data_machine_type(){
        $data=$this->ReportDowntimeMachineTypeModel->get_all();
        echo json_encode($data);
    }
    
}