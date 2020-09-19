<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Machineanalisys extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportAnalisysModel');
    }
    
    public function index(){
        $data['analisys'] = $this->ReportAnalisysModel->get_all();
        $this->load->view('rmekanik/downtime_analisys',$data);
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