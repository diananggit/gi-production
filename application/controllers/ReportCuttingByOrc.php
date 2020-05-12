<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingByOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportCuttingByOrcModel');

    }

    public function index(){
        $data['cuttingorc']=$this->ReportCuttingByOrcModel->get_all();

        $this->load->view('rcutting/cutting_by_orc_view',$data);
    }

    public function filter(){
       $rst=$this->ReportCuttingByOrcModel->get_by_daterange();

        echo json_encode($rst);
    }

   
   


   

    // public function ajax_get_style_cutting(){
    //     $data=$this->ReportCuttingModel->get_all();
    //     echo json_encode($data);
    // }
}