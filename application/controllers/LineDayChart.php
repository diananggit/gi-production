<?php
defined('BASEPATH') or exit ('Direct acces script not allowed!'); 

class LineDayChart extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('LineDayChartModel');
    }

    public function index(){
        $this->load->view('rsewing/line_day_chart');
    }

    public function ajax_get_by_line($line){
        $data['line'] = $this->LineDayChartModel->get_by_line($line);


        $this->load->view('rsewing/line_day_chart', $data);

    }
    // public function ajax_get_by_month($month){
    //     $result=$this->LineMonthlyChartModel->get_by_month($month);
        
    //     echo json_encode($result);
    // }
    public function ajax_get_all_day(){
        $data = $this->LineDayChartModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_line_day(){
        $r = $this->LineDayChartModel->get_by_line_day();

        echo json_encode($r);
    }  
}