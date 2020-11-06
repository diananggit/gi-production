<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPackingSingleOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportPackingBySingleOrcModel');

    }

    public function index(){
        $data['packingorc']=$this->ReportPackingBySingleOrcModel->get_all();

        $this->load->view('rpacking/packing_by_single_orc',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportPackingBySingleOrcModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportPackingBySingleOrcModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}