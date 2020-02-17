<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingToSewing extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportCuttingToSewingModel');

    }

    public function index(){
        $data['sewing']=$this->ReportCuttingToSewingModel->get_all();
        $this->load->view('rcutting/cutting_to_sewing_view',$data);
    }

    // public function ajax_list(){
		// $list=$this->ReportCuttingModel->get_datatables();
		// $data=array();
		// $no=$_POST['start'];
		// foreach($list as $k){
		// 	$no++;
        //     $row=array();
            
		// 	$row[]=$k->style;
        //     $row[]=$k->qty;
        //     $row[]= date('d-m-y', strtotime($k->prepare_on));
			
		// 	$data[]=$row;

        // }
        // $output=array(
		// 	"draw"=>$_POST['draw'],
		// 	"recordsTotal"=>$this->ReportCuttingModel->get_all(),
		// 	"recordsFiltered"=>$this->ReportCuttingModel->count_filtered(),
		// 	"data"=>$data,
		// );
        // echo json_encode($output);
        // exit;   
    // }

    public function filter(){
        // $this->load->model('ReportCuttingModel');
        // $data['v_style_cutting']=$this->ReportCuttingModel->
        $rst = $this->ReportCuttingToSewingModel->get_by_daterange();
        
        // get_by_daterange();
        // $this->load->view('cutting_by_style_view',$data);
        echo json_encode($rst);
    }

   
   




   

    // public function ajax_get_style_cutting(){
    //     $data=$this->ReportCuttingModel->get_all();
    //     echo json_encode($data);
    // }
}