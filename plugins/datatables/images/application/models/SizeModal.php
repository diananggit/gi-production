<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SizeModel extends CI_Model{
    var $table = "master_size";

    public function get_all(){
        $result = $this->db->get($this->table);

        return $result->result();
    }
}