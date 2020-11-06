<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarSewingLine extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/ReportBarSewingLineModel';
        parent::__construct();
        $this->load->model($model,'ReportBarSewingLineModel');
        
    }
    public function index(){
        $this->load->view('rsewing/sewing_line_chart_view');
    }

    public function ajax_get_qty_sewing_line(){
        $data=$this->ReportBarSewingLineModel->get_all();
        echo json_encode($data);
    }
    // public function ajax_get_qty_sewing_line($hr){
    //     $data=$this->ReportBarSewingLineModel->get_all($hr);
    //     echo json_encode($data);
    // }
}