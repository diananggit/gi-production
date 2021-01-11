<?php
defined('BASEPATH') or exit ('Direct acces script not allowed!'); 

class LineDayChart extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/LineDayChartModel';
        $model2 = 'report_sewing/LineDailyChartModel';
        parent::__construct();

        $this->load->model($model,'LineDayChartModel');
        $this->load->model($model2,'LineDailyChartModel');
    }

    public function index(){
        $this->load->view('rsewing/line_day_chart');
    }

    public function ajax_get_by_line($line){

       
        $data['line'] = $this->LineDailyChartModel->get_by_line($line);


        $this->load->view('rsewing/week_chart_coba', $data);

    }
   
    public function ajax_get_all_day(){
        $data = $this->LineDayChartModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_line_day(){
        $rst = $this->LineDayChartModel->get_by_line_day();

        echo json_encode($rst);
    }  
}