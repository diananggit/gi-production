<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeAnalizeModel extends CI_Model{
    var $table="v_sn_breakdown";

    public function get_month(){
        $this->db->select('DISTINCT(month)');
        $query = $this->db->get('v_sn_breakdown');
        return $query->result();
    }

    public function get_by_month($month){
        $rst = $this->db->get_where($this->table, array('month' => $month));
        return $rst->result();
    }
   


   
}