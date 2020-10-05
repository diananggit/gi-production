<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportutilizeModel extends CI_Model{
    var $table="v_sum_breakdown";
    
    // public function get_all(){
    //     $this->db->from($this->table);
    //     $query = $this->db->get();

    //     return $query->result();
    // }
    public function get_all($tgl_waiting){
        $rst = $this->db->get_where($this->table, array('tgl_waiting' => $tgl_waiting));
        return $rst->result();
    }

   

}