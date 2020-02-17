<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartPacking extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportBarChartPackingModel');
        
    }
    public function index(){
        $this->load->view('rpacking/packing_bar_chart_view');
    }

    public function ajax_get_qty_packing(){
        $data=$this->ReportBarChartPackingModel->get_all();
        echo json_encode($data);
    }
}