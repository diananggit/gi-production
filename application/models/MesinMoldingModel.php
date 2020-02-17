<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesinMoldingModel extends CI_Model{
    var $table = "master_mesin_molding";

    public function get_all(){
        $rst = $this->db->get($this->table);
        
        return $rst->result();
    }
}