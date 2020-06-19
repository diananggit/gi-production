<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SummaryMolding extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SummaryMolding_Model');
	}

	public function index()
	{
		$data['molding'] = $this->SummaryMolding_Model->get_all();
		$this->load->view('r_molding/molding_summary', $data);
	}

	public function filter()

	{
		$rst = $this->SummaryMolding_Model->get_by_daterange();

		echo json_encode($rst);
	}
}
