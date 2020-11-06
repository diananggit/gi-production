<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingAllQtyModel extends CI_Model{
    var $table="view_all_qty";
    // var $column_order = array('tgl','orc','style','color','in_cutting','order');
    
    
    

    public function get_all(){
        $this->db->select('DISTINCT(orc)');
        $query = $this->db->get('v_sewing_orc');
        return $query->result();
    }

    public function get_by_orc3($orc){
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->result();
    }
    
   
    

}