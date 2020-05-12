<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDaily extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ReportDailyModel');
		$this->load->model('ReportDailySewingModel');
		$this->load->model('ReportDailyPackingModel');
		$this->load->model('ReportDailyModelMolding');
	}


	public function index()
	{
		$this->load->view('rcutting/daily_cutting_view');
	}

	public function ajax_get_cutting($hr){
		$data=$this->ReportDailyModel->get_all($hr);
		echo json_encode($data);
	}

	public function ajax_get_sewing($hr){
		$data=$this->ReportDailySewingModel->get_all($hr);
		echo json_encode($data);
	}

	public function ajax_get_packing($hr){
		$data=$this->ReportDailyPackingModel->get_all($hr);
		echo json_encode($data);
	}

	public function ajax_get_molding($hr){
		$data=$this->ReportDailyModelMolding->get_all($hr);
		echo json_encode($data);
	}
}
