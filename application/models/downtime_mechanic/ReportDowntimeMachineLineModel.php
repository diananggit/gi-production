<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeMachineLineModel extends CI_Model{
    var $table="v_breakdown_line";

    public function get_all(){
        date_default_timezone_set('Asia/Jakarta');

        $dayOfWeek = date('w');
        if($dayOfWeek == 1){

            $this->db->where('tgl_waiting', date('Y-m-d', strtotime("- 3 day")));
        }else if($dayOfWeek > 1){
            $this->db->where('tgl_waiting', date('Y-m-d', strtotime("- 1 day")));
        }
        $rst = $this->db->get($this->table);
        // return $this->db->last_query();
        return $rst->result();
    }

    public function get_line(){
        $this->db->select('DISTINCT(month)');
        $query = $this->db->get('v_breakdown_line');
        return $query->result();
    }

    public function get_by_line($month){
        // $resutReplace=str_replace("%20"," ",$line);
        $rst = $this->db->get_where($this->table, array('month' => $month ));
        return $rst->result();
    }

   
}