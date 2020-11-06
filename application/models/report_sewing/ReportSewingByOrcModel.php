<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingByOrcModel extends CI_Model{
    var $table="view_orc_sewing2";
    var $column_order = array('tgl','orc','order','qty_out');
    
    
    private function _get_datatables_query(){
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {

                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

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
            $rst = $this->db->get('view_orc_sewing2');
            return $rst->result();
        }
    }
    
}