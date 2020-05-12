<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBundle extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportSewingBundleModel');

    }

    public function index(){
        $data['sewingbundle']=$this->ReportSewingBundleModel->get_all();

        $this->load->view('rsewing/sewing_bundle',$data);
    }


}