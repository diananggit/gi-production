<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanTrimstore extends CI_Controller
{
	public	function __construct()
	{
		$model = 'report_cutting/UnscanTrimstoreModel';
		parent::__construct();
		$this->load->model($model,'UnscanTrimstoreModel');
	}

	public function index()
	{
		$data['untrimstore'] = $this->UnscanTrimstoreModel->get_all();

		$this->load->view('rcutting/unscan_trimstore', $data);
	}

	public function vieworc($id)
	{
		//print_r($id); die();
		
		$data['untrimstore'] = $this->UnscanTrimstoreModel->get_all($id);

		$this->load->view('rcutting/unscan_trimstore', $data);
	}

	public function ajax_get_orc(){
        $rst = $this->UnscanTrimstoreModel->get_orc();

        echo json_encode($rst);
    }  
}
