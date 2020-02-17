<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDetailSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDetailSewingModel');

    }

    public function index(){
        $data['sewingorc']=$this->ReportDetailSewingModel->get_all();

        $this->load->view('rsewing/sewing_detail_sewing_view',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportDetailSewingModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportDetailSewingModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
}