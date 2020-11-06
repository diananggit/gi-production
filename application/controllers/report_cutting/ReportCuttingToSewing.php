<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingToSewing extends CI_Controller{
    public function __construct(){
        $model = 'report_cutting/ReportCuttingToSewingModel';
        parent::__construct();
        $this->load->model($model,'ReportCuttingToSewingModel');

    }

    public function index(){
        $data['sewing']=$this->ReportCuttingToSewingModel->get_all();
        $this->load->view('rcutting/cutting_to_sewing_view',$data);
    }

    public function filter(){
        $rst = $this->ReportCuttingToSewingModel->get_by_daterange();
        echo json_encode($rst);
    }


}