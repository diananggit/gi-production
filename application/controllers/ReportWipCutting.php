<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportWipCutting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportWipCuttingModel');

    }

    public function index(){
        $data['cuttingwip']=$this->ReportWipCuttingModel->get_all();

        $this->load->view('rcutting/cutting_by_wip_view',$data);
    }


}