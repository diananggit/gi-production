<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBalancingModel extends CI_Model{
    var $table="view_balancing_sewing";

    
    public function get_by_orc($orc){
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->result();
    }
    public function get_by_line_day(){
        if(isset($_POST['orc'])){
          ;
           $orc = $_POST['orc'];
           
            $this->db->where('orc', $orc);
    
            $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            return $rst->result();
        }
      }

}