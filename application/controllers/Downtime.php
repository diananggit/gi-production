<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportDowntimeModel');
    }
    
    public function index(){
        // $data['downtime'] = $this->ReportDowntimeModel->get_all();
        $this->load->view('rmekanik/downtime_by_machine');
        // var_dump($data);
    }

    public function filter()
	{
		$rst = $this->ReportDowntimeModel->get_by_daterange();

		echo json_encode($rst);
    }
    
    public function get_line(){
        $data = $this->ReportDowntimeModel->get_all_line();

        echo json_encode($data);
    }

   
}