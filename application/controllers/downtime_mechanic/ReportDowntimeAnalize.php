<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeAnalize extends CI_Controller{
    public function __construct(){
        $model = 'downtime_mechanic/ReportDowntimeAnalizeModel';
        parent::__construct();
        $this->load->model($model,'ReportDowntimeAnalizeModel');
    }

    public function index(){
        $this->load->view('rmekanik/downtime_analise_machine');
    }

    public function get_datas($month){
        $data=$this->ReportDowntimeAnalizeModel->get_by_month($month);
        echo json_encode($data);
    }
    
    public function get_month(){
        $data = $this->ReportDowntimeAnalizeModel->get_month();
        echo json_encode($data);
    }

  
    
}