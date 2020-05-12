<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMoldingShiftModel extends CI_Model{
    var $table="view_molding_shift";
    
    


    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }    

    public function get_all(){
       
        $this->db->select('DISTINCT(shift)');
        $query = $this->db->get('view_molding_shift');

        return $query->result();
    }

    public function get_by_shift($shift){
        $rst = $this->db->get_where($this->table, array('shift' => $shift));
        return $rst->result();
    }

}