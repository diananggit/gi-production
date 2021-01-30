<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportMoldingDetailShift2 extends CI_Controller
{
	public	function __construct()
	{
		$model = 'report_molding/ReportMoldingShiftModel';
		parent::__construct();
		$this->load->model($model,'ReportMoldingShiftModel');
	}

	public function index()
	{
		$data['moldshift'] = $this->ReportMoldingShiftModel->get_all_detail_shift2();

		$this->load->view('r_molding/molding_detail2', $data);
	}

	public function vieworc($no_molding)
	{
		
		$data['moldshift'] = $this->ReportMoldingShiftModel->get_all_detail_shift2($no_molding);

		$this->load->view('r_molding/molding_detail2', $data);
	}
 
	
}
