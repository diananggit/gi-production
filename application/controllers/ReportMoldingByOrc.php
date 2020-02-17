<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingByOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportMoldingByOrcModel');

    }

    public function index(){
        $data['moldingorc']=$this->ReportMoldingByOrcModel->get_all();

        $this->load->view('r_molding/molding_by_orc_view',$data);
    }

  
    public function filter(){
       $rst=$this->ReportMoldingByOrcModel->get_by_daterange();

        echo json_encode($rst);
    }


}