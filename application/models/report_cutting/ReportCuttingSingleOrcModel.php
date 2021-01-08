<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportCuttingSingleOrcModel extends CI_Model{

    public function get_all(){
        
        $rst = "SELECT  DISTINCT
        `order`.`orc` AS `orc`
        
        FROM
            (
                ( `input_cutting` JOIN `order` ON ( `input_cutting`.`orc` = `order`.`orc` ) )
                LEFT JOIN `balance_orc_cut` ON ( `balance_orc_cut`.`orc` = `input_cutting`.`orc` ) 
            ) 
        GROUP BY
            `input_cutting`.`orc`,
            `input_cutting`.`tgl`,
            `input_cutting`.`size`";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function get_by_orc($orc){
      
        $rst = "SELECT
        `input_cutting`.`tgl` AS `cut_date`,
        dayname( `input_cutting`.`tgl` ) AS `day`,
        `order`.`orc` AS `orc`,
        `input_cutting`.`style` AS `style`,
        `input_cutting`.`color` AS `color`,
        `order`.`qty` AS `qty_order`,
        sum( `input_cutting`.`qty_pcs` ) AS `cut_qty`,
        `order`.`etd` AS `etd`,
        `input_cutting`.`orc` AS `or`,
        `order`.`exported_date` AS `exported_date`,
    IF
        ( `order`.`exported_date` IS NULL, `balance_orc_cut`.`balance`, 0 ) AS `balance_ex`,
        `input_cutting`.`size` AS `size`,
        `order`.`plan_export` AS `plan_export`,
        `order`.`buyer` AS `buyer`,
        `balance_orc_cut`.`balance` AS `balance` 
    FROM
        (
            ( `input_cutting` JOIN `order` ON ( `input_cutting`.`orc` = `order`.`orc` ) )
            LEFT JOIN `balance_orc_cut` ON ( `balance_orc_cut`.`orc` = `input_cutting`.`orc` ) 
        ) 
        WHERE
        `order`.`orc` = '$orc'
    GROUP BY
        `input_cutting`.`orc`,
        `input_cutting`.`tgl`,
        `input_cutting`.`size`";

    $query = $this->db->query($rst);

    return $query->result_array();
    }

}