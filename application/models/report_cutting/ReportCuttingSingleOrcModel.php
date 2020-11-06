<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingSingleOrcModel extends CI_Model{
    var $table="v_single_orc_cutting";
    // var $column_order = array('orc','style','color','cut_date','cut_qty','qty_order','etd');
    
    
   

    public function get_all(){
        // $this->db->distinct();
        $this->db->select('DISTINCT(orc)');
        $query = $this->db->get('v_single_orc_cutting');
        // $query= $this->db->get_where($this->table, array('orc' => $orc));


        return $query->result();
    }

    public function get_by_orc($orc){
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->result();
    }

}