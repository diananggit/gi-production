<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingModel');
    }

    public function index(){
        $data['moldingstyle']=$this->ReportMoldingModel->get_all();
        $this->load->view('r_molding/molding_by_style_view',$data);
    }
    public function filter(){
        $rst = $this->ReportMoldingModel->get_by_daterange();
        echo json_encode($rst);
    }
    
}