<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingModel extends CI_Model{
    var $table="v_style_cutting";
    var $column_order = array('style','qty','tanggal');
    
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }    

    public function get_all(){
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_by_daterange(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];

            $from_date = date('Y-m-d', strtotime($dataStr['from_date']));
            $to_date = date('Y-m-d', strtotime($dataStr['to_date']));

            // $this->db->where("tgl BETWEEN CAST($from_date AS DATE) AND CAST($to_date AS DATE)");
            $this->db->where("tgl >=", $from_date);
            $this->db->where("tgl <=", $to_date);
            $rst = $this->db->get('v_style_cutting');
            return $rst->result();
            // return $this->db->last_query();            
        }


    }
    

   
}