<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingByOrc extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ReportSewingByOrcModel');

    }

    public function index(){
        $data['sewingorc']=$this->ReportSewingByOrcModel->get_all();

        $this->load->view('rsewing/sewing_by_orc_view',$data);
    }

    public function ajax_list(){
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
    }

    public function filter(){
       $rst=$this->ReportSewingByOrcModel->get_by_daterange();

        echo json_encode($rst);
    }

   
   


   

    // public function ajax_get_style_cutting(){
    //     $data=$this->ReportCuttingModel->get_all();
    //     echo json_encode($data);
    // }
}