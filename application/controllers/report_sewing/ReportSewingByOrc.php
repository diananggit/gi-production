<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingByOrc extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/ReportSewingByOrcModel';

        parent::__construct();
        $this->load->model($model,'ReportSewingByOrcModel');

    }

    public function index(){
        $data['sewingorc']=$this->ReportSewingByOrcModel->get_all();

        $this->load->view('rsewing/sewing_by_orc_view',$data);
    }

    public function filter(){
       $rst=$this->ReportSewingByOrcModel->get_by_daterange();

        echo json_encode($rst);
    }

   
   


   

    // public function ajax_get_style_cutting(){
    //     $data=$this->ReportCuttingModel->get_all();
    //     echo json_encode($data);
    // }
}