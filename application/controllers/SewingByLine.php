<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SewingByLine extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('SewingByLineModel');
        $this->load->model('SewingByLineModel2');
        $this->load->model('ReportSewingBySingleOrcModel');
        $this->load->model('ReportSewingBalancingModel');
        $this->load->model('RemakByLineModel');

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

    public function ajax_update($line){
        $rst = $this->RemakByLineModel->update($line);

        echo json_encode($rst);
    }

    public function ajax_get_remaks_by_line($line){
        $rst = $this->RemakByLineModel->get_by_line_day($line);

        echo json_encode($rst);
    }

}