<?php
defined('BASEPATH') or exit('Direct access script not allowed!');

class LineWeekChart extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->library('excel');
        $this->load->model('DailyChartSewingLineModel');
    }

    public function index(){
       // $result = $_GET['line'];
        // die();
      //  print_r($result);
        //die();
        
        $this->load->view('rsewing/week_chart_coba');
    }

    public function ajax_get_daily_sewing_line(){
        //$line='DIENG';
        
        // $line = $_GET['lines'];
        $result=$this->DailyChartSewingLineModel->get_by_line();
        
        echo json_encode($result);
    }

    public function ajax_get_sewing_line($line){
        print_r('dfdf');
        die();
        $data=$this->DailyChartSewingLineModel->get_by_line(); 
        echo json_encode($data);
     }

     public function ajax_get_by_line_21(){
         print_r($_GET['datas']);
         $line = $_GET['datas'];
  // die();
       $result=$this->DailyChartSewingLineModel->get_by_sewing_line($line);
        
       echo json_encode($result);
    }


}