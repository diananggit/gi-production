<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBySingleOrc extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/ReportSewingBySingleOrcModel';
        $model2 = 'report_sewing/ReportSewingBalancingModel';
        $model3 = 'report_sewing/ReportSewingAllQtyModel';
        
        parent::__construct();
        $this->load->model($model,'ReportSewingBySingleOrcModel');
        $this->load->model($model2,'ReportSewingBalancingModel');
        $this->load->model($model3,'ReportSewingAllQtyModel');

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

    public function ajax_get_by_orc2($orc){
        $result=$this->ReportSewingBalancingModel->get_by_orc($orc);
        
        echo json_encode($result);
 
           }

           public function ajax_get_by_orc3($orc){
            $result=$this->ReportSewingAllQtyModel->get_by_orc3($orc);
            
            echo json_encode($result);
        }
        //   
}