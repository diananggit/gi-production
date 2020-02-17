<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineMonthlyChartModel2 extends CI_Model{
    var $table="eff_month_week";
    var $column_order= array('orc','style','color','sam','qty','eff_coba','op');

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_month($m){
     
        $rst = $this->db->get_where($this->table, array('month' => $m));
        
        return $rst->result();
    }


    
}