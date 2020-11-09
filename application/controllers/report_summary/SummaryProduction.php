<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryProduction extends CI_Controller{
    public function __construct(){
        $model = 'report_summary/SummaryProductionModel';
        parent::__construct();
        $this->load->model($model,'SummaryProductionModel');
     

    }

    public function index(){
        $data['summary'] = $this->SummaryProductionModel->get_all();


        $this->load->view('sumarry/summary_view',$data);
    }

    
}