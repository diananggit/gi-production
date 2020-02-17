<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPackingByStyle extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportPackingByStyleModel');

    }

    public function index(){
        $data['packingstyle']=$this->ReportPackingByStyleModel->get_all();
        $this->load->view('rpacking/packing_by_style',$data);
    }

    public function filter(){
        $rst = $this->ReportPackingByStyleModel->get_by_daterange();
        echo json_encode($rst);
    }

    
}