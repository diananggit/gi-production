<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportWipMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportWipMoldingModel');

    }

    public function index(){
        $data['moldingwip']=$this->ReportWipMoldingModel->get_all();

        $this->load->view('r_molding/molding_by_wip_view',$data);
    }


}