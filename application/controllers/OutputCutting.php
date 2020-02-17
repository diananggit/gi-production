<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputCutting extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // $this->load->library('excel');

        $this->load->model('LineModel');

        $this->load->model('InputSewingModel');
        $this->load->model('ViewCuttingModel');
    }
    
    public function index(){
        $this->load->view('cutting/output_cutting_view');
    }

    public function ajax_list(){
        $list = $this->InputSewingModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_input_sewing;
            $row[] = $k->line;
            $row[] = date('d-m-Y', strtotime($k->tgl));
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->no_bundle;
            $row[] = $k->size;
            $row[] = $k->qty_pcs;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->InputSewingModel->count_all(),
            "recordsFiltered" => $this->InputSewingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        // exit;        
    }
    
    public function ajax_get_by_barcode($barcode){
        $rst = $this->ViewCuttingModel->get_by_barcode($barcode);

        echo json_encode($rst);
    }

    public function ajax_save(){
        $rst = $this->InputSewingModel->save();

        echo json_encode($rst);
    }
    
    public function ajax_get_all_line(){
        $rst = $this->LineModel->get_all();

        echo json_encode($rst);
    }
}