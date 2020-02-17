<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cutting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        

        // $this->load->library('excel');
        $this->load->model('OrderModel');

        $this->load->model('ViewCuttingModel');
        $this->load->model('CuttingModel');
        $this->load->model('CuttingDetailModel');

        $this->load->model('SizeModel');
        $this->load->model('LineModel');
        $this->load->model('ViewCuttingDoneModel');
        $this->load->model('OrderModel');

    }
    
    public function index(){
        $this->load->view('cutting/cutting_view');
    }

    public function ajax_list(){
        $list = $this->CuttingModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $k) {
            $no++;
            $row = array();
            // $row[] = "";
            $row[] = $k->id_cutting;
            $row[] = $k->orc;
            $row[] = $k->style;
            $row[] = $k->color;
            $row[] = $k->buyer;
            $row[] = $k->comm;
            $row[] = $k->so;
            $row[] = $k->qty;
            $row[] = $k->boxes;
            $row[] = date('d-m-Y', strtotime($k->prepare_on));

            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Show Detail" onclick="showDetail(' . "'" . $k->id_cutting . "'" . ')"><i class="fa fa-pencil"></i> Show Detail</a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->CuttingModel->count_all(),
            "recordsFiltered" => $this->CuttingModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
        exit;        
    }

    public function add_cutting(){
        $this->load->view('cutting/add_cutting_view');
    }

    public function ajax_get_by_orc($orc){
        $result = $this->OrderModel->get_by_orc($orc);

        echo json_encode($result);
    }

    public function ajax_get_order_all(){
        $result = $this->OrderModel->get_all();

        echo json_encode($result);
    }

    public function ajax_get_order_not_to_cutting(){
        $result = $this->OrderModel->get_by_no_to_cutting();

        echo json_encode($result);
    }
    
    public function ajax_get_all_size(){
        $rst = $this->SizeModel->get_all();

        echo json_encode($rst);
    }

    public function create_barcode($code){
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

        Zend_Barcode::render('code39', 'image', array('text' => $code));
    }

    public function ajax_save_cutting(){
        $valBack = $this->CuttingModel->save();

        echo json_encode($valBack);
    }

    public function ajax_save_detail_cutting(){
        $rst = $this->CuttingDetailModel->save();

        echo json_encode($rst);
    }

    public function ajax_get_by_id_cutting($idCutting){
        $rst = $this->CuttingDetailModel->get_by_id_cutting($idCutting);

        echo json_encode($rst);
    }

    public function cutting_done(){
        $this->load->view('cutting/cutting_done_view');
    }

    public function cutting_print(){
        $this->load->view('cutting/cutting_print_view');
    }    

    public function ajax_update_tgl_cutting(){
        $rst = $this->CuttingDetailModel->update2();

        echo json_encode($rst);
    }

    public function ajax_list_cutting_done(){
        $rst = $this->ViewCuttingDoneModel->get_all();

         echo json_encode($rst);
    }

    public function ajax_get_cutting_detail_done($idCutting){
        $r = $this->CuttingDetailModel->get_cutting_done($idCutting);

        echo json_encode($r);
    }

    public function ajax_get_all(){
        $r = $this->CuttingModel->get_all();

        echo json_encode($r);
    }

    public function get_all_line(){
        $r = $this->LineModel->get_all();

        echo json_encode($r);
    }

    public function ajax_open_print_preview($data){
        $this->load->view("cutting/print_barcode_view", $data);
        
    }

    public function print_barcode($id){
        $data['cutting'] = $this->CuttingModel->get_by_id($id);
        $data['detail'] = $this->CuttingDetailModel->get_by_id_cutting($id);

        // var_dump($data);
        // echo json_encode($data);
        // $this->load->view("cutting/print_barcode_view", $data);
        $this->load->view("cutting/print_barcode_view1", $data);

    }

    public function print_barcode_molding($id){
        $data['cutting'] = $this->CuttingModel->get_by_id($id);
        $data['detail'] = $this->CuttingDetailModel->get_by_id_cutting_molding($id);

        $this->load->view("cutting/print_barcode_molding", $data);

    }

    public function ajax_update_order($orc){
        $rst = $this->OrderModel->update_by_orc($orc);

        echo json_encode($rst);

    }
    
}