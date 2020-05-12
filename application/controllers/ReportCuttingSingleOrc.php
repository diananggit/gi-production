<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingSingleOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportCuttingSingleOrcModel');
        $this->load->model('ReportSewingBalancingModel');
        $this->load->model('ReportSewingAllQtyModel');

    }

    public function index(){
        $data['cuttingorc']=$this->ReportCuttingSingleOrcModel->get_all();

        $this->load->view('rcutting/cutting_by_single_orc_view',$data);
    }

    public function ajax_get_all_orc(){
        $data = $this->ReportCuttingSingleOrcModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_orc($orc){
        $result=$this->ReportCuttingSingleOrcModel->get_by_orc($orc);
        
        echo json_encode($result);
    }

    public function ajax_get_by_orc2($orc){
        $result=$this->ReportSewingBalancingModel->get_by_orc($orc);
        
        echo json_encode($result);
 
           }

    public function ajax_get_by_orc3($orc){
    $result=$this->ReportSewingAllQtyModel->get_by_orc3($orc);
    
    echo json_encode($result);
}
}