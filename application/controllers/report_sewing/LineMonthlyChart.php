<?php
defined('BASEPATH') or exit ('Direct acces script not allowed!'); 

class LineMonthlyChart extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/SewingByLineModel';
        $model2 = 'report_sewing/SewingByLineModel2';
        parent::__construct();

        $this->load->model($model,'LineMonthlyChartModel');
        $this->load->model($model2,'LineMonthlyChartModel2');
    }

    public function index(){
        $this->load->view('rsewing/line_monthly_chart');
    }

    public function ajax_get_by_line($line){
        $data['line'] = $this->LineMonthlyChartModel->get_by_line($line);


        $this->load->view('rsewing/line_month_chart', $data);

    }
    
    public function ajax_get_all_month(){
        $data = $this->LineMonthlyChartModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_all_month2(){
        $data = $this->LineMonthlyChartModel2->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_line_month(){
        $r = $this->LineMonthlyChartModel->get_by_line_month();

        echo json_encode($r);
    }  
    public function ajax_get_by_line_month2(){
        $r = $this->LineMonthlyChartModel2->get_by_line_month();

        echo json_encode($r);
    } 

    public function ajax_get_by_month($month){
        // $line = $_GET['lines'];

        $result=$this->LineMonthlyChartModel2->get_by_month($month);
        
        echo json_encode($result);
    }

    



}