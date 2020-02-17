<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputMolding extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // $this->load->library('excel');

        $this->load->model('InputMoldingModel');
        $this->load->model('CuttingDetailModel');
        $this->load->model('ViewCuttingModel');

        $this->load->model('InputCuttingModel');
    }
    
    public function index(){
        $this->load->view('molding/input_molding_view');
    }

    public function ajax_list(){
        $list = $this->InputMoldingModel->get_datatables();
        // var_dump($list);
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_input_molding;
            $row[] = date('d-m-Y',strtotime($k->tgl));
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->no_bundle;
            $row[] = $k->size;  
            $row[] = $k->qty_pcs;
            $row[] = $k->outer_mold;
            $row[] = $k->mid_mold;
            $row[] = $k->linning_mold;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->InputMoldingModel->count_all(),
            "recordsFiltered" => $this->InputMoldingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }
    
    public function ajax_get_by_barcode($barcode){
        $rst = $this->ViewCuttingModel->get_by_barcode($barcode);

        // print_r($rst);
        echo json_encode($rst);
    }

    public function ajax_save(){
        $rst = $this->InputMoldingModel->save();

        echo json_encode($rst);
    }    
}