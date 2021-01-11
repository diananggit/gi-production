<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineChartWeekModel extends CI_Model{
    // var $table="view_eff_line_week";
    // var $column_order= array('line','orc','style','color','sam','qty_sewing','eff','op');

    public function get_all(){
        $rst ="SELECT WEEK
                    ( `output_sewing_detail`.`tgl_ass` ) AS `week`,
                    weekday( `output_sewing_detail`.`tgl_ass` ) AS `day`,
                    dayname( `output_sewing_detail`.`tgl_ass` ) AS `dayname`,
                    `output_sewing_detail`.`tgl_ass` AS `tgl`,
                    `output_sewing`.`line` AS `line`,
                    `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` AS `op`,
                    sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) AS `result`,
                    sum( `output_sewing_detail`.`qty` ) AS `qty`,
                    sum( IF ( `output_sewing_detail`.`tgl_ass` = NULL, '0', `output_sewing_detail`.`qty` ) ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            dayname( `output_sewing_detail`.`tgl_ass` ) = '5',
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 5 * 60 * 100,
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 7 * 60 * 100 
                        ),
                        2 
                    ) AS `effisiensi`,
                    `input_sewing`.`style` AS `style`,
                    `input_sewing`.`color` AS `color`,
                    `input_sewing`.`center_panel_sam` + `input_sewing`.`back_wings_sam` + `input_sewing`.`cups_sam` + `input_sewing`.`assembly_sam` AS `sam`,
                    `output_sewing_detail`.`orc` AS `orc` 
                FROM
                    (
                        ( `output_sewing` JOIN `output_sewing_detail` ON ( `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` ) )
                        JOIN `input_sewing` ON ( `output_sewing_detail`.`kode_barcode` = `input_sewing`.`kode_barcode` ) 
                    ) 
                GROUP BY
                    `output_sewing_detail`.`tgl_ass`,
                    `output_sewing`.`line`";

        $query = $this->db->query($rst);
        // print_r($sql); die();
        return $query->result();
    }

    public function get_by_week($week){
        $rst = "SELECT
                        WEEK( `output_sewing_detail`.`tgl_ass` ) AS `week`,
                    weekday( `output_sewing_detail`.`tgl_ass` ) AS `day`,
                    dayname( `output_sewing_detail`.`tgl_ass` ) AS `dayname`,
                    `output_sewing_detail`.`tgl_ass` AS `tgl`,
                    `output_sewing`.`line` AS `line`,
                    `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` AS `op`,
                    sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) AS `result`,
                    sum( `output_sewing_detail`.`qty` ) AS `qty`,
                    sum( IF ( `output_sewing_detail`.`tgl_ass` = NULL, '0', `output_sewing_detail`.`qty` ) ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            dayname( `output_sewing_detail`.`tgl_ass` ) = '5',
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 5 * 60 * 100,
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 7 * 60 * 100 
                        ),
                        2 
                    ) AS `effisiensi`,
                    `input_sewing`.`style` AS `style`,
                    `input_sewing`.`color` AS `color`,
                    `input_sewing`.`center_panel_sam` + `input_sewing`.`back_wings_sam` + `input_sewing`.`cups_sam` + `input_sewing`.`assembly_sam` AS `sam`,
                    `output_sewing_detail`.`orc` AS `orc` 
                FROM
                    (
                        ( `output_sewing` JOIN `output_sewing_detail` ON ( `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` ) )
                        JOIN `input_sewing` ON ( `output_sewing_detail`.`kode_barcode` = `input_sewing`.`kode_barcode` ) 
                    )
                WHERE
                    WEEK( `output_sewing_detail`.`tgl_ass` ) = '$week'
                GROUP BY
                    `output_sewing_detail`.`tgl_ass`,
                    `output_sewing`.`line`";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_by_line($l){
            $this->db->distinct();

        $rst = $this->db->get_where($this->table, array('line' => $l));

        return $rst->result();
    }

    public function get_by_line_week(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $line = $dataStr['line'];
            $week = $dataStr['week'];

        }
        $rst = "SELECT
                        WEEK( `output_sewing_detail`.`tgl_ass` ) AS `week`,
                    weekday( `output_sewing_detail`.`tgl_ass` ) AS `day`,
                    dayname( `output_sewing_detail`.`tgl_ass` ) AS `dayname`,
                    `output_sewing_detail`.`tgl_ass` AS `tgl`,
                    `output_sewing`.`line` AS `line`,
                    `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` AS `op`,
                    sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) AS `result`,
                    sum( `output_sewing_detail`.`qty` ) AS `qty`,
                    sum( IF ( `output_sewing_detail`.`tgl_ass` = NULL, '0', `output_sewing_detail`.`qty` ) ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            dayname( `output_sewing_detail`.`tgl_ass` ) = '5',
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 5 * 60 * 100,
                            sum( `output_sewing_detail`.`center_panel_sam_result` + `output_sewing_detail`.`back_wings_sam_result` + `output_sewing_detail`.`cups_sam_result` + `output_sewing_detail`.`assembly_sam_result` ) / `output_sewing`.`center_panel_op` + `output_sewing`.`back_wings_op` + `output_sewing`.`cups_op` + `output_sewing`.`assembly_op` * 7 * 60 * 100 
                        ),
                        2 
                    ) AS `effisiensi`,
                    `input_sewing`.`style` AS `style`,
                    `input_sewing`.`color` AS `color`,
                    `input_sewing`.`center_panel_sam` + `input_sewing`.`back_wings_sam` + `input_sewing`.`cups_sam` + `input_sewing`.`assembly_sam` AS `sam`,
                    `output_sewing_detail`.`orc` AS `orc` 
                FROM
                    (
                        ( `output_sewing` JOIN `output_sewing_detail` ON ( `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` ) )
                        JOIN `input_sewing` ON ( `output_sewing_detail`.`kode_barcode` = `input_sewing`.`kode_barcode` ) 
                    )
                WHERE
                WEEK( `output_sewing_detail`.`tgl_ass` ) = '$week' AND `output_sewing`.`line` = ' $line'
                GROUP BY
                    `output_sewing_detail`.`tgl_ass`,
                    `output_sewing`.`line`";
         $query = $this->db->query($rst);
         return $query->result();
        
    }
    
}