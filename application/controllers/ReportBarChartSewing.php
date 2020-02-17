<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportBarChartSewingModel');
        
    }
    public function index(){
        $this->load->view('rsewing/sewing_bar_chart_view');
    }

    public function ajax_get_qty_sewing(){
        $data=$this->ReportBarChartSewingModel->get_all();
        echo json_encode($data);
    }
}