<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DowntimeShimptonDaily extends CI_Controller{
    public function __construct(){
        $model = 'downtime_mechanic/ReportDowntimeShimptonDailyModel';

        parent::__construct();
        $this->load->model($model,'ReportDowntimeShimptonDailyModel');
    }
    
    public function index(){
        // $data['downtime'] = $this->ReportDowntimeModel->get_all();
        $this->load->view('rmekanik/downtime_shimpton_daily');
        // var_dump($data);
    }

    public function filter()
	{
		$rst = $this->ReportDowntimeShimptonDailyModel->get_by_daterange();

		echo json_encode($rst);
    }
    
    public function get_line(){
        $data = $this->ReportDowntimeShimptonDailyModel->get_all_line();

        echo json_encode($data);
    }

   
}