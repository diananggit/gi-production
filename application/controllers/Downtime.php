<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDowntimeModel');
    }
    
    public function index(){
        $data['downtime'] = $this->ReportDowntimeModel->get_all();
        $this->load->view('rmekanik/downtime_by_machine',$data);
        // var_dump($data);
    }

    // public function filter(){
    //     // $this->load->model('ReportCuttingModel');
    //     // $data['v_style_cutting']=$this->ReportCuttingModel->
    //     $rst = $this->ReportCuttingModel->get_by_daterange();
    //     // print_r($rst);
    //     // die();
    //     // get_by_daterange();
    //     // $this->load->view('cutting_by_style_view',$data);
    //     echo json_encode($rst);
    // }
}