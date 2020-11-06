<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SewingByLineModel2 extends CI_Model{
    var $table="view_sewing_by_line";
    var $column_order= array('orc','style','color','total_sam','qty','op','eff_cp','eff_bw','eff_cup','eff_ass','tgl');
    
    public function get_by_line_day(){
        if(isset($_POST['line'])){
          ;
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
   