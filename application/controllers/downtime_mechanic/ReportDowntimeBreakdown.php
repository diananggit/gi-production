<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeBreakdown extends CI_Controller{
    public function __construct(){
        $model = 'downtime_mechanic/ReportDowntimeShimptonDailyModel';

        parent::__construct();
        $this->load->model($model,'ReportDowntimeLineModel');
  

    }
    public function index(){
         
         $this->load->view('rmekanik/downtime_breakdown');
     }
 
    public function get_data_machine_breakdown(){
        $data=$this->ReportDowntimeLineModel->get_by_line_mont();
        echo json_encode($data);
    }

    // public function ajax_get_by_line_day(){
    //     $rst = $this->SewingByLineModel2->get_by_line_day();

    //     echo json_encode($rst);
    // }  
    

}