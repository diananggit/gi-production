<?php
defined('BASEPATH') or exit ('Direct acces script not allowed!'); 

class LineDailyChart extends CI_Controller{
    public function __construct(){
        $model = 'report_sewing/LineDailyChartModel';
        $model2 = 'report_sewing/LineMonthlyChartModel';
        $model3 = 'report_sewing/LineChartWeekModel';

        parent::__construct();
        $this->load->model($model,'LineDailyChartModel');
        $this->load->model($model2,'LineMonthlyChartModel');
        $this->load->model($model3,'LineChartWeekModel');
    }

    public function index(){
        // if(isset($_POST['']))
        $this->load->view('rsewing/line_daily_chart');
    }

   
    
    public function ajax_get_all_week(){
        if(isset($_GET['lines'])){

            $line = $_GET['lines'];

            $data = $this->LineDailyChartModel->get_all($line);
    
            echo json_encode($data);
        }

    }

    public function ajax_get_all_line(){
        $data = $this->LineDailyChartModel->get_all();

        echo json_encode($data);
    }

    public function ajax_get_by_week($week){
        // $line = $_GET['lines'];

        $result=$this->LineDailyChartModel->get_by_week($week);
        
        echo json_encode($result);
    }

    
    public function ajax_get_sewing_line(){
        $line = $_GET['lines'];
        $result=$this->LineDailyChartModel->get_by_line($line);
        
        echo json_encode($result);
    }

    public function ajax_get_by_line($line){
        $data['line'] = $this->LineDailyChartModel->get_by_line($line);
        $this->load->view('rsewing/line_per_week', $data);
    }
    

    public function ajax_get_by_line_week(){
        $r = $this->LineDailyChartModel->get_by_line_week();

        echo json_encode($r);
    }  

     public function ajax_get_by_line_week2(){
        $r = $this->LineChartWeekModel->get_by_line_week();

        echo json_encode($r);
    }  
    
    public function ajax_get_by_line_month(){
        $t = $this->LineMonthlyChartModel->get_by_line_month();

        echo json_encode($t);
    }
    
}