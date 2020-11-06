<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingWip extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/ReportWipSewingModel';
        parent::__construct();
        $this->load->model($model,'ReportWipSewingModel');

    }

    public function index(){
        $data['sewingwip']=$this->ReportWipSewingModel->get_all();

        $this->load->view('rsewing/sewing_wip_view',$data);
    }


}