<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportOutputMolding extends CI_Controller
{
	public function __construct()
	{
		$model = 'report_molding/ReportOutputMoldingModel';
		parent::__construct();
		$this->load->model($model,'ReportOutputMoldingModel');
	}

	public function index()
	{
		$data['moldingmc'] = $this->ReportOutputMoldingModel->get_all();

		$this->load->view('r_molding/molding_output', $data);
	}


	public function filter()
	{
		$rst = $this->ReportOutputMoldingModel->get_by_daterange();

		echo json_encode($rst);
	}

	public function machine_no()
	{
		$rst = $this->ReportOutputMoldingModel->get_mesin();

		echo json_encode($rst);
    }
    public function get_machine(){
        $data = $this->ReportOutputMoldingModel->get_all_machine();

        echo json_encode($data);
    }
}
