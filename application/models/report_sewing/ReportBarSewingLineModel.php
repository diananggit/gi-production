<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarSewingLineModel extends CI_Model{
    var $table="view_sewing_line";

    public function get_all(){
       
        $date   = date("Y-m-d H:i:s");
        $dayNow = date('l');
        $date1  = str_replace('-', '/', $date);

        if( $dayNow == 'Monday' ){
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-2 days"));
        }else{
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-1 days"));
        }

        $rst = "SELECT
                    `view_sewing_line_bar`.`week` AS `week`,
                    `view_sewing_line_bar`.`day` AS `day`,
                    `view_sewing_line_bar`.`dayname` AS `dayname`,
                    `view_sewing_line_bar`.`tgl` AS `tgl`,
                    `view_sewing_line_bar`.`line` AS `line`,
                    `view_sewing_line_bar`.`result` AS `result`,
                    `view_sewing_line_bar`.`qty` AS `qty`,
                    `view_sewing_line_bar`.`qty_sewing` AS `qty_sewing`,
                    `view_sewing_line_bar`.`style` AS `style`,
                    `view_sewing_line_bar`.`color` AS `color`,
                    `view_sewing_line_bar`.`orc` AS `orc`,
                    `view_sewing_line_bar`.`sam` AS `sam`,
                    `view_sewing_line_bar`.`remarks` AS `remarks`,
                    `output_sewing`.`tgl` AS `tgl2`,
                    `output_sewing`.`line` AS `line2`,
                    `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` AS `op2`,
                    round(
                    IF
                        (
                            `view_sewing_line_bar`.`week` = '5',
                            `view_sewing_line_bar`.`result` / ( 5 * ( `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` ) * 60 ) * 100,
                            `view_sewing_line_bar`.`result` / ( 7 * ( `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` ) * 60 ) * 100 
                        ),
                        2 
                    ) AS `eff`,
                    `order`.`qty` AS `order`,
                    `order`.`qty` AS `order2`,
                    `line`.`id_line` AS `id_line`,
                    `spv`.`name` AS `name` 
                FROM
                    (
                        (
                            (
                                ( `view_sewing_line_bar` LEFT JOIN `output_sewing` ON ( `output_sewing`.`tgl` = `view_sewing_line_bar`.`tgl` AND `output_sewing`.`line` = `view_sewing_line_bar`.`line` ) )
                                LEFT JOIN `order` ON ( `order`.`orc` = `view_sewing_line_bar`.`orc` ) 
                            )
                            JOIN `line` ON ( `line`.`name` = `view_sewing_line_bar`.`line` ) 
                        )
                        LEFT JOIN `spv` ON ( `line`.`id_spv` = `spv`.`id_spv` ) 
                    ) 
                where
                    `view_sewing_line_bar`.`tgl` = '$ResultBookingTime'

                ORDER BY
                    `output_sewing`.`tgl` DESC";
        $query = $this->db->query($rst);
        return $query->result();
    }
   


   
}