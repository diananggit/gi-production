<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPackingByOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportPackingByOrcModel');

    }

    public function index(){
        $data['packingorc']=$this->ReportPackingByOrcModel->get_all();

        $this->load->view('rpacking/packing_by_orc',$data);
    }

  
    public function filter(){
       $rst=$this->ReportPackingByOrcModel->get_by_daterange();

        echo json_encode($rst);
    }


}