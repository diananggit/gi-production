<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDailyModelMolding extends CI_Model{
    var $table="daili_molding";

    public function get_all($hr){

        $this->db->where('tgl', $hr );            
        
        $rst = $this->db->get($this->table);

        // return $this->db->last_query();
        return $rst->row();
    }
} 