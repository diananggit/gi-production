<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingToSewingModel extends CI_Model{
    // var $table="v_cutting_to_sewing";
    // var $column_order = array('orc','style','color','qty');

    public function get_all(){
       
        $rst = "SELECT
                    `input_sewing`.`orc` AS `orc`,
                    `input_sewing`.`style` AS `style`,
                    `input_sewing`.`color` AS `color`,
                    sum( `input_sewing`.`qty_pcs` ) AS `qty`,
                    `input_sewing`.`tgl` AS `tgl`,
                    `input_sewing`.`line` AS `line` 
                FROM
                    `input_sewing` 
                GROUP BY
                    `input_sewing`.`orc`,
                    `input_sewing`.`tgl`";

            $query = $this->db->query($rst);

            return $query->result();

    }

    public function get_by_daterange(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];

            $from_date = date('Y-m-d', strtotime($dataStr['from_date']));
            $to_date = date('Y-m-d', strtotime($dataStr['to_date']));

            $rst ="SELECT
                        `input_sewing`.`orc` AS `orc`,
                        `input_sewing`.`style` AS `style`,
                        `input_sewing`.`color` AS `color`,
                        sum( `input_sewing`.`qty_pcs` ) AS `qty`,
                        `input_sewing`.`tgl` AS `tgl`,
                        `input_sewing`.`line` AS `line` 
                    FROM
                        `input_sewing`
                    WHERE
                    `input_sewing`.`tgl` >= '$from_date' AND `input_sewing`.`tgl` <= ' $to_date'
                    GROUP BY
                        `input_sewing`.`orc`,
                        `input_sewing`.`tgl`";
             $query = $this->db->query($rst);

             return $query->result();           
        }


    }
   
   
}