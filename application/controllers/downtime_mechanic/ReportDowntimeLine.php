<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeLine extends CI_Controller{
    public function __construct(){
        $model = 'downtime_mechanic/ReportDowntimeMachineLineModel';
        $model2 = 'downtime_mechanic/ReportDowntimeLineModel';
        
        parent::__construct();
        $this->load->model($model,'ReportDowntimeMachineLineModel');
        $this->load->model($model2,'ReportDowntimeLineModel');
    }
    public function index(){
        $this->load->view('rmekanik/downtime_machine_line');
    }

    public function get_data_machine_line($month){
        $data=$this->ReportDowntimeMachineLineModel->get_by_line($month);
        echo json_encode($data);
    }
    
    public function get_data_machine_breakdown($month){
        $data=$this->ReportDowntimeLineModel->get_by_line_mont2($month);
        echo json_encode($data);
    }

    public function get_line(){
        $data = $this->ReportDowntimeMachineLineModel->get_line();

        echo json_encode($data);
    }

  
    
}