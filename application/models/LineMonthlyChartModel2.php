<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineMonthlyChartModel2 extends CI_Model{
    var $table="eff_line_month3";
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
    public function get_by_line_month(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $line = $dataStr['line'];
            $month = $dataStr['month'];

            // $rst = $this->db->get_where($this->table, array('line' => $line));
            $this->db->where('month', $month);
            $this->db->where('line', $line);
            $rst = $this->db->get($this->table);

            // return $this->db->last_query();

            return $rst->result();

        }
    }


    
}