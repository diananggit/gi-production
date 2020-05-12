<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportWipPacking extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportWipPackingModel');

    }

    public function index(){
        $data['packingwip']=$this->ReportWipPackingModel->get_all();

        $this->load->view('rpacking/packing_by_wip',$data);
    }


}