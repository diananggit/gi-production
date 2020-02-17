<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartCutting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportBarChartCuttingModel');
        
    }
    public function index(){
        $this->load->view('rcutting/cutting_bar_chart_view');
    }

    public function ajax_get_qty_cutting(){
        $data=$this->ReportBarChartCuttingModel->get_all();
        echo json_encode($data);
    }
}