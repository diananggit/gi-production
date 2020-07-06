<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarSewingLineModel extends CI_Model{
    var $table="view_sewing_bar_line";

    public function get_all(){
        date_default_timezone_set('Asia/Jakarta');

        $dayOfWeek = date('w');
        if($dayOfWeek == 1){

            $this->db->where('tgl', date('Y-m-d', strtotime("- 3 day")));
        }else if($dayOfWeek > 1){
            $this->db->where('tgl', date('Y-m-d', strtotime("- 1 day")));
        }
        $rst = $this->db->get($this->table);
        // return $this->db->last_query();
        return $rst->result();
    }
   


   
}