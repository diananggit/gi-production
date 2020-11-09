<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSummaryDowntime extends CI_Controller{
    public function __construct(){
        $model = 'downtime_mechanic/ReportDowntimeModel';
        $model2 = 'downtime_mechanic/ReportutilizeModel';
        parent::__construct();
        $this->load->model($model,'ReportDowntimeModel');
        $this->load->model($model2,'ReportutilizeModel');
    }
    
    public function index(){
        $this->load->view('rmekanik/summary_daily_downtime');
    }

   

    public function get_datas($tgl_waiting){
        $result=$this->ReportDowntimeModel->get_by_tgl($tgl_waiting);
        
        echo json_encode($result);
    }

    public function get_utilize($tgl_waiting){
		$data=$this->ReportutilizeModel->get_all($tgl_waiting);
		echo json_encode($data);
    }
    public function filter()
	{
		$rst = $this->ReportDowntimeModel->get_by_daterange();

		echo json_encode($rst);
    }

}