<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingBalancing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingBalancingModel');

    }

    public function index(){
        $data['moldingorc']=$this->ReportMoldingBalancingModel->get_all();

        $this->load->view('r_molding/moldingcoba',$data);
    }

  
    public function ajax_get_all_orc(){
        $data = $this->ReportMoldingBalancingModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportMoldingBalancingModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}