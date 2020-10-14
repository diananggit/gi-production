<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeSymton extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDowntimeSymtonModel');
        
    }
    public function index(){
        $this->load->view('rmekanik/downtime_by_shymton');
    }

    public function get_data_machine_sympton($month){
        $data=$this->ReportDowntimeSymtonModel->get_by_sympton($month);
        echo json_encode($data);
    }
    
    public function get_sympton(){
        $data = $this->ReportDowntimeSymtonModel->get_sympton();

        echo json_encode($data);
    }

  
    
}