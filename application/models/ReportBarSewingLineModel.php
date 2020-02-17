<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarSewingLineModel extends CI_Model{
    var $table="view_sewing_line_bar";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }

    // public function get_all($hr){

    //     $this->db->where('tgl', $hr );
    //     // $this->db->where('line', $hr );            
        
    //     $rst = $this->db->get($this->table);

    //     // return $this->db->last_query();
    //     return $rst->row();
    // }

}