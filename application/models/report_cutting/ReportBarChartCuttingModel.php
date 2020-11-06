<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartCuttingModel extends CI_Model{
    var $table="eff_c";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }
}