<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingSingleOrc extends CI_Controller{
    public function __construct(){
        $model = 'report_molding/ReportMoldingSingleOrcModel';
        $model2 = 'report_sewing/ReportSewingAllQtyModel';
        $model3 = 'report_molding/ReportMoldingBalancingModel';

        parent::__construct();
        $this->load->model($model,'ReportMoldingSingleOrcModel');
        $this->load->model($model2,'ReportSewingAllQtyModel');
        $this->load->model($model3,'ReportMoldingBalancingModel');

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
    public function ajax_get_by_orc2($orc){
        $result=$this->ReportMoldingBalancingModel->get_by_orc($orc);
        
        echo json_encode($result);
    }
    public function ajax_get_by_orc3($orc){
        $result=$this->ReportSewingAllQtyModel->get_by_orc3($orc);
        
        echo json_encode($result);
    }
}