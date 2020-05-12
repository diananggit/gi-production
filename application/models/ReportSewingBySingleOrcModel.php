<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBySingleOrcModel extends CI_Model{
    var $table="v_sewing_orc";
   

    public function get_all(){
        $this->db->select('DISTINCT(orc)');
        $query = $this->db->get('v_sewing_orc');
        return $query->result();
    }

    public function get_by_orc($orc){
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->result();
    }
    public function get_by_orc3($orc){
        $this->db->from($this->table);
        $this->db->where('orc', $orc);
        $rst= $this->db->get();
        return $rst->row();
    }
   
    public function get_by_line(){
        if(isset($_POST['line'])){
            $line = $_POST['line'];
            // $orc = $_POST['orc'];
            $dayOfWeek = date('w');
            if($dayOfWeek == 1){
                $this->db->where('tgl_ass', date('Y-m-d', strtotime("- 2 day")));
            }else if($dayOfWeek > 1){
                $this->db->where('tgl_ass', date('Y-m-d', strtotime("- 1 day")));
            }
            $this->db->where('line', $line);
            $rst = $this->db->get($this->table);
            return $rst->result();
        }

    }
    

}