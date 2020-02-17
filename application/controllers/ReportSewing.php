<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportSewingModel');
    }

    public function index(){
        $data['sewingstyle']=$this->ReportSewingModel->get_all();
        $this->load->view('rsewing/sewing_by_style_view',$data);
    }

    public function filter(){
        // $this->load->model('ReportCuttingModel');
        // $data['v_style_cutting']=$this->ReportCuttingModel->
        $rst = $this->ReportSewingModel->get_by_daterange();
        
        // get_by_daterange();
        // $this->load->view('cutting_by_style_view',$data);
        echo json_encode($rst);
    }

   
   




   

    // public function ajax_get_style_cutting(){
    //     $data=$this->ReportCuttingModel->get_all();
    //     echo json_encode($data);
    // }
}