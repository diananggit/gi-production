<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeLineModel extends CI_Model{
    var $table="v_line_mont_duration";


    public function get_by_line_mont(){

        $month = $_POST['month'];
           
            $this->db->where('month', $month);
    
            $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            return $rst->result();
        // $resutReplace=str_replace("%20"," ",$line);
        // $rst = $this->db->get_where($this->table, array('month' => $month ));
        // return $rst->result();
    }
    // public function get_by_line_day(){
       
    //        $line = $_POST['line'];
           
    //         $this->db->where('line', $line);
    
    //         $rst = $this->db->get($this->table);
    //         // return $this->db->last_query();
    //         return $rst->result();
        
    //   }

    public function get_by_line_mont2($month){
        // $resutReplace=str_replace("%20"," ",$line);
        $rst = $this->db->get_where($this->table, array('month' => $month ));
        return $rst->result();
    }

   
}