<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDailyModel extends CI_Model{
    var $table="eff_c";

    public function get_all($hr){

        $this->db->where('tgl', $hr );            
        
        $rst = $this->db->get($this->table);

        // return $this->db->last_query();
        return $rst->row();
    }

    
}