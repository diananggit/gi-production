<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RemakByLineModel extends CI_Model{
    var $table="output_sewing";
 
    public function update($line){
        $rst = $this->db->get_where($this->table, array('line' => $line));

        return $rst->row();
    }

   
    
}