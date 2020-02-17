<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputCutting extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // $this->load->library('excel');

        $this->load->model('CuttingModel');
        $this->load->model('CuttingDetailModel');

        $this->load->model('InputCuttingModel');
        $this->load->model('ViewCuttingDoneModel');
    }    

    public function index(){
        $this->load->view('inputcutting/scan_bundle_view');
    }

    public function ajax_list(){
        $list = $this->InputCuttingModel->get_datatables();
        // print_r($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_input_cutting;
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->no_bundle;
            $row[] = $k->size;
            $row[] = $k->qty_pcs;
            $row[] = date('d-m-Y', strtotime($k->tgl));

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->InputCuttingModel->count_all(),
            "recordsFiltered" => $this->InputCuttingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }
    
    public function ajax_get_by_barcode($barcode){
        $rst = $this->ViewCuttingDoneModel->get_by_barcode($barcode);

        echo json_encode($rst);
    }

    public function ajax_save(){
        $rst = $this->InputCuttingModel->save();

        echo json_encode($rst);
    }
}