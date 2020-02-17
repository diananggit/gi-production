<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartMoldingModel extends CI_Model{
    var $table="daili_molding";

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result();
    }
}