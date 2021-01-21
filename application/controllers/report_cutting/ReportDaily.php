<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDaily extends CI_Controller {
	public function __construct(){
		$model = 'report_cutting/ReportDailyModel';
        $model2 = 'report_sewing/ReportDailySewingModel';
		$model3 = 'report_packing/ReportDailyPackingModel';
		$model4 = 'report_molding/ReportDailyModelMolding';
	
		parent::__construct();
		$this->load->model($model,'ReportDailyModel');
		$this->load->model($model2,'ReportDailySewingModel');
		$this->load->model($model3,'ReportDailyPackingModel');
		$this->load->model($model4,'ReportDailyModelMolding');
	}


	public function index()
	{
		$this->load->view('rcutting/daily_cutting_view');
	}

	public function ajax_get_cutting(){
		$data=$this->ReportDailyModel->get_all();
		$datas = json_encode($data);
		echo $datas;
	}

	public function ajax_get_sewing(){
		$data=$this->ReportDailySewingModel->get_all();
		$datas = json_encode($data);
		echo $datas;
	}

	public function ajax_get_packing($hr){
		$data=$this->ReportDailyPackingModel->get_all($hr);
		echo json_encode($data);
	}

	public function ajax_get_molding(){
		$data=$this->ReportDailyModelMolding->get_all();
		$datas =  json_encode($data);
		echo $datas;
	}
}
