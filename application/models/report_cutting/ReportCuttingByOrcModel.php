<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingByOrcModel extends CI_Model{
    // var $table="v_orc_cutting";
    // var $column_order = array('tgl','qty_order','qty_cutting','cutting_sam');
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