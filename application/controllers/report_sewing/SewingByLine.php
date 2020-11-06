<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SewingByLine extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/SewingByLineModel';
        $model2 = 'report_sewing/SewingByLineModel2';
        $model3 = 'report_sewing/ReportSewingBySingleOrcModel';
        $model4 = 'report_sewing/ReportSewingBalancingModel';
        $model5 = 'report_sewing/RemakByLineModel';
        parent::__construct();
        $this->load->model($model,'SewingByLineModel');
        $this->load->model($model2,'SewingByLineModel2');
        $this->load->model($model3,'ReportSewingBySingleOrcModel');
        $this->load->model($model4,'ReportSewingBalancingModel');
        $this->load->model($model5,'RemakByLineModel');

    }
    public function index(){
         
         $this->load->view('rsewing/sewing_by_line');
     }
 
     public function ajax_get_daily_sewing_line(){
         $result=$this->SewingByLineModel->get_by_line();
         
         echo json_encode($result);
     }

     public function ajax_get_by_line_day(){
        $rst = $this->SewingByLineModel2->get_by_line_day();

        echo json_encode($rst);
    }  
    
    public function ajax_get_by_line(){
        $rst = $this->ReportSewingBySingleOrcModel->get_by_line();

        echo json_encode($rst);
    }  

    public function ajax_update(){
        $data=array(
            'tanggal'=>date('Y-m-d', strtotime($this->input->post('tglInput'))),
            'name_remarks'=>$this->input->post('remaksInput'),
            'line'=>$this->input->post('lineName'),
        );
        $rst = $this->RemakByLineModel->save($data);
        // print_r($data);
        // die();
        echo json_encode($rst);
    }

    public function ajax_get_remaks_by_line($line){
        $rst = $this->RemakByLineModel->get_by_line_day($line);

        echo json_encode($rst);
    }
    

}