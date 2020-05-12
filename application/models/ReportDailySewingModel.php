<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDailySewingModel extends CI_Model{
    var $table="view_sewing_daily_assembly";

    public function get_all($hr){

        $this->db->where('tgl', $hr );            
        
        $rst = $this->db->get($this->table);

        // return $this->db->last_query();
        return $rst->row();
    }
}
