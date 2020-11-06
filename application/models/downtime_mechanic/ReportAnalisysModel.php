<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportAnalisysModel extends CI_Model{
    var $table="V_Breackdown_Analysis";

    public function get_all(){

       $query = $this->db->get($this->table);
       return $query->result_array();
        // return $this->db->last_query();
    }
    // public function get_all_start($hr){

    //     $this->db->where('tgl', $hr );            
        
    //     $rst = $this->db->get($this->table);

    //     // return $this->db->last_query();
    //     return $rst->row();
    // }
}