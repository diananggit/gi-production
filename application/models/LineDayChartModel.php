<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineDayChartModel extends CI_Model{
    var $table="eff_day_line";
    var $column_order= array('orc','style','color','sam','qty','eff_coba','op','eff_cp','eff_bw','eff_cups','eff_ass');

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_day($m){
     
        $rst = $this->db->get_where($this->table, array('tgl' => $m));
        
        return $rst->result();
    }

    public function get_by_line($l){
        $rst = $this->db->get_where($this->table, array('line' => $l));
        return $rst->result();
    }

    public function get_by_line_day(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $line = $dataStr['line'];
            $tgl = $dataStr['tgl'];

            // $rst = $this->db->get_where($this->table, array('line' => $line));
            $this->db->where('tgl', $tgl);
            $this->db->where('line', $line);
            $rst = $this->db->get($this->table);

            // return $this->db->last_query();

            return $rst->result();

        }
    }
   

    
}