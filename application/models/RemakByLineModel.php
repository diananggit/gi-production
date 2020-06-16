<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RemakByLineModel extends CI_Model{
    var $table="data_remarks";
 
    public function update($line){
        $rst = $this->db->get_where($this->table, array('line' => $line));

        return $rst->row();
    }
   
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    

   
    
}