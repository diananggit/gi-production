<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('OutputSewingModel');
        $this->load->model('InputSewingModel');

        $this->load->model('LineModel');
    }

    public function index(){
        $this->load->view('sewing/operators_view');

    }

    public function ajax_list_opr(){
        
    }
}