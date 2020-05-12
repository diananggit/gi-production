<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailyChartSewingLineModel extends CI_Model{
    var $table="eff_line2";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }

    public function get_by_line(){
        if(isset($_POST['line'])){
            $line = $_POST['line'];
            $this->db->where('line', $line);
    
            $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            return $rst->result();
        }
    }
    
    public function get_by_sewing_line($line){
        $rst = $this->db->get_where($this->table, array('line' => $line));
        return $rst->result();
    }

   
}