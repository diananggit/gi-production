<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportMoldingDetailShift3 extends CI_Controller
{
	public	function __construct()
	{
		$model = 'report_molding/ReportMoldingShiftModel';
		parent::__construct();
		$this->load->model($model,'ReportMoldingShiftModel');
	}

	public function index()
	{
		$data['moldshift'] = $this->ReportMoldingShiftModel->get_all_detail_shift3();

		$this->load->view('r_molding/molding_detail3', $data);
	}

	public function vieworc()
	{
        if(isset($_POST['dataMold'])){
            $dataMold = $_POST['dataMold'];
            $no_molding = $dataMold['noMesin'];
            $style = $dataMold['style'];
            $orc = $dataMold['orc'];
            $size = $dataMold['size'];           

            // $data = $this->ReportMoldingShiftModel->get_all_detail_shift3($no_molding , $style, $size);
            // $data['moldshift'] = $this->ReportMoldingShiftModel->get_all_detail_shift3($no_molding , $style, $size);

            // $this->moldingDetail3($data);

            // echo json_encode($data);
            // $arrDataMold = explode("-",$dataMold);
            // $no_molding = $arrDataMold[0];
            // $style = $arrDataMold[1];
            // $orc = $arrDataMold[2];
            // $size = $arrDataMold[3];
            $data = $this->ReportMoldingShiftModel->get_all_detail_shift3($no_molding , $style, $orc, $size);

            return json_encode($data);

            // $this->load->view('r_molding/molding_detail3', $data);

        }
            
    
    }
    
    public function moldingDetail3($data){
        $this->load->view('r_molding/molding_detail3', $data);
    }
 
	
}
