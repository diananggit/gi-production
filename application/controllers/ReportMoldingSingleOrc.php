<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingSingleOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingSingleOrcModel');

    }

    public function index(){
        $data['moldingorc']=$this->ReportMoldingSingleOrcModel->get_all();

        $this->load->view('r_molding/molding_by_single_orc_view',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportMoldingSingleOrcModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportMoldingSingleOrcModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}