<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryProduction extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('SummaryProductionModel');
     

    }

    public function index(){
        $data['summary'] = $this->SummaryProductionModel->get_all();


        $this->load->view('sumarry/summary_view',$data);
    }

    
}