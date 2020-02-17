<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineModel extends CI_Model{
    var $table ="line";

    public function get_all(){
        $result = $this->db->get($this->table);
        return $result->result();
    }
}