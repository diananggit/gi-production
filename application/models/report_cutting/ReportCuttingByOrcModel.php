<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingByOrcModel extends CI_Model{
    // var $table="v_orc_cutting";
    // var $column_order = array('tgl','qty_order','qty_cutting','cutting_sam');
    
    
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
      
        $rst = "SELECT
                    `input_cutting`.`tgl` AS `tgl`,
                    `input_cutting`.`orc` AS `orc`,
                    `input_cutting`.`style` AS `style`,
                    `input_cutting`.`color` AS `color`,
                    `order`.`qty` AS `qty_order`,
                    sum( `input_cutting`.`qty_pcs` ) AS `qty_cutting`,
                    `order`.`etd` AS `etd`,
                    `order`.`qty` - sum( `input_cutting`.`qty_pcs` ) AS `balance`,
                    `cutting_detail`.`cutting_sam` AS `cutting_sam`,
                    `input_cutting`.`kode_barcode` AS `kode_barcode`,
                    `order`.`buyer` AS `buyer`,
                    `order`.`so` AS `so`,
                    `order`.`plan_export` AS `plan_export` 
                FROM
                    (
                        ( `input_cutting` JOIN `order` ON ( `input_cutting`.`orc` = `order`.`orc` ) )
                        LEFT JOIN `cutting_detail` ON ( `cutting_detail`.`kode_barcode` = `input_cutting`.`kode_barcode` ) 
                    ) 
                GROUP BY
                    `input_cutting`.`orc`,
                    `input_cutting`.`tgl` 
                ORDER BY
                    `input_cutting`.`tgl`";

            $query =$this->db->query($rst);
            return $query->result();
    }

    public function get_by_daterange(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];

            $from_date = date('Y-m-d', strtotime($dataStr['from_date']));
            $to_date = date('Y-m-d', strtotime($dataStr['to_date']));
        }
        $rst = "SELECT
                    `input_cutting`.`tgl` AS `tgl`,
                    `input_cutting`.`orc` AS `orc`,
                    `input_cutting`.`style` AS `style`,
                    `input_cutting`.`color` AS `color`,
                    `order`.`qty` AS `qty_order`,
                    sum( `input_cutting`.`qty_pcs` ) AS `qty_cutting`,
                    `order`.`etd` AS `etd`,
                    `order`.`qty` - sum( `input_cutting`.`qty_pcs` ) AS `balance`,
                    `cutting_detail`.`cutting_sam` AS `cutting_sam`,
                    `input_cutting`.`kode_barcode` AS `kode_barcode`,
                    `order`.`buyer` AS `buyer`,
                    `order`.`so` AS `so`,
                    `order`.`plan_export` AS `plan_export` 
                FROM
                    (
                        ( `input_cutting` JOIN `order` ON ( `input_cutting`.`orc` = `order`.`orc` ) )
                        LEFT JOIN `cutting_detail` ON ( `cutting_detail`.`kode_barcode` = `input_cutting`.`kode_barcode` ) 
                    ) 
                WHERE
                `input_cutting`.`tgl` >= ' $from_date' AND `input_cutting`.`tgl` <= '$to_date'
                GROUP BY
                    `input_cutting`.`orc`,
                    `input_cutting`.`tgl` 
                ORDER BY
                    `input_cutting`.`tgl`";
    
    $query =$this->db->query($rst);
    return $query->result();

    }
    
}