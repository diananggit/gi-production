<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SewingByLineModel extends CI_Model{
    var $table="sewing_by_line";
    var $column_order = array('tgl','orc','style','color','qty_out','qty_order','balance','qty_cutting');
    
    public function get_by_line(){
        if(isset($_POST['line'])){
            $line = $_POST['line'];
            $dayOfWeek = date('w');
            if($dayOfWeek == 1){
                $this->db->where('tgl', date('Y-m-d', strtotime("- 2 day")));
            }else if($dayOfWeek > 1){
                $this->db->where('tgl', date('Y-m-d', strtotime("- 1 day")));
            }
            $this->db->where('line', $line);
    
            $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            return $rst->result();
        }

    }


}