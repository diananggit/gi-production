<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingPerShift extends CI_Controller{
    public function __construct(){
        $model = 'report_molding/ReportMoldingShiftModel';
        parent::__construct();
        $this->load->model($model,'ReportMoldingShiftModel');
        
    }
    public function index(){
        $data['moldshift']=$this->ReportMoldingShiftModel->get_all();

        $this->load->view('r_molding/molding_mesin_shift',$data);
    }
    

    public function getDataShiftSatu(){
        $data=$this->ReportMoldingShiftModel->get_all();
        echo json_encode($data);
    }

    public function getTotal(){
        $data=$this->ReportMoldingShiftModel->get_Total();
        echo json_encode($data);
    }

    public function getTotalMoldingPeriode(){
        $data=$this->ReportMoldingShiftModel->getTotalMoldingPeriode();
        echo json_encode($data);
    }

    public function getDataMoldingShift1(){
        $list = $this->ReportMoldingShiftModel->get_all();
        $data = [];
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $field->tgl;
            $row[] = $field->no_mesin;
            $row[] = $field->style;
            $row[] = $field->orc;                        
            $row[] = $field->color;                        
            $row[] = $field->size;                        
            $row[] = $field->firsts_outer;
            $row[] = $field->second_outer;
            $row[] = $field->third_outer;
            $row[] = $field->fourth_outer;
            $row[] = $field->five_outer;
            $row[] = $field->six_outer;
            $row[] = $field->seven_outer;
            $row[] = $field->firsts_midlinning;
            $row[] = $field->second_midlinning;
            $row[] = $field->third_midlinning;
            $row[] = $field->fourt_midlinning;
            $row[] = $field->five_midlinning;
            $row[] = $field->six_midlinning;
            $row[] = $field->seven_linning;
            $row[] = $field->firsts_linning;
            $row[] = $field->second_linning;
            $row[] = $field->third_linning;
            $row[] = $field->fourt_linning;
            $row[] = $field->five_linning;
            $row[] = $field->six_linning;
            $row[] = $field->seven_linning;

            $data[] = $row;
        }        
        $output = array(
            "draw" => $_POST['draw'],
            // "recordsTotal" => $this->User_model->count_all(),
            // "recordsFiltered" => $this->User_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}