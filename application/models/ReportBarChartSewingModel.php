<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartSewingModel extends CI_Model{
    var $table="v_bar_sewing";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }
}