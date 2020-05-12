<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanSewing extends CI_Controller
{
	public	function __construct()
	{
		parent::__construct();
		$this->load->model('UnscanSewingModel');
	}

	public function index()
	{
		$data['unsewing'] = $this->UnscanSewingModel->get_all();

		$this->load->view('rsewing/unscan_sewing', $data);
	}

	public function vieworc($id)
	{
		//print_r($id); die();
		
		$data['unsewing'] = $this->UnscanSewingModel->get_all($id);

		$this->load->view('rsewing/unscan_sewing', $data);
	}

}
