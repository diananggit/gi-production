<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingDetail extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingDetailModel');

    }

    public function index(){
        $data['moldingorc']=$this->ReportMoldingDetailModel->get_all();

        $this->load->view('r_molding/molding_detail_view',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportMoldingDetailModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportMoldingDetailModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}