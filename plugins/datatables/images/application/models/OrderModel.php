<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model{
    var $table="order";

    public function get_by_orc($orc){
        $rst = $this->db->get_where($this->table, array('orc' => $orc));
        return $rst->row();
    }

    public function get_all(){
        $rst = $this->db->get($this->table);
        return $rst->result(); 
    }
}