<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportBarChartMoldingModel');
        
    }
    public function index(){
        $this->load->view('r_molding/molding_bar_chart');
    }

    public function ajax_get_qty_molding(){
        $data=$this->ReportBarChartMoldingModel->get_all();
        echo json_encode($data);
    }
}