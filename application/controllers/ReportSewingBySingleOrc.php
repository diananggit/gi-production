<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBySingleOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportSewingBySingleOrcModel');

    }

    public function index(){
        $data['sewingorc']=$this->ReportSewingBySingleOrcModel->get_all();

        $this->load->view('rsewing/sewing_by_single_orc',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportSewingBySingleOrcModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportSewingBySingleOrcModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}