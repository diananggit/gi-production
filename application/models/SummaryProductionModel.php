<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryProductionModel extends CI_Model{
    var $table="v_sumary_sewing";

    public function get_all(){
        // date_default_timezone_set('Asia/Jakarta');

        // $dayOfWeek = date('w');
        // if($dayOfWeek == 1){

        //     $this->db->where('tgl_ass', date('Y-m-d', strtotime("- 2 day")));
        // }else if($dayOfWeek > 1){
        //     $this->db->where('tgl_ass', date('Y-m-d', strtotime("- 1 day")));
        // }
        $rst = $this->db->get($this->table);

        return $rst->result();
    }

    
}