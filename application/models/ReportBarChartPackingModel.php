<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartPackingModel extends CI_Model{
    var $table="v_packing_daily";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }
}