<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineDailyChartModel extends CI_Model{
    var $table="eff_line_sementara";
    var $column_order= array('line','orc','style','color','sam','qty_sewing','eff','op');

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_week($week){
        $rst = $this->db->get_where($this->table, array('week' => $week));
        return $rst->result();
    }

    public function get_by_line($line){
        $this->db->select('DISTINCT(week)');
        $resutReplace=str_replace("%20"," ",$line);

        $rst = $this->db->get_where($this->table, array('line' => $resutReplace));

        return $rst->result();
    }

    public function get_by_line_week(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $line = $dataStr['line'];
            $week = $dataStr['week'];

            // $rst = $this->db->get_where($this->table, array('line' => $line));
            $this->db->where('week', $week);
            $this->db->where('line', $line);
            $rst = $this->db->get($this->table);

            // return $this->db->last_query();

            return $rst->result();

        }
        
    }
   

    
}