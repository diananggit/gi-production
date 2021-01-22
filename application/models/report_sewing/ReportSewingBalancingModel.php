<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSewingBalancingModel extends CI_Model{
    // var $table="view_balancing_sewing";
    
    public function get_by_orc($orc){
        $rst = "SELECT
                    `output_sewing`.`center_panel_op` AS `center_panel_op`,
                    `output_sewing`.`back_wings_op` AS `back_wings_op`,
                    `output_sewing`.`cups_op` AS `cups_op`,
                    `output_sewing`.`assembly_op` AS `assembly_op`,
                    `output_sewing_detail`.`orc` AS `orc`,
                    `output_sewing_detail`.`tgl_cp` AS `tgl_cp`,
                    `output_sewing_detail`.`tgl_bw` AS `tgl_bw`,
                    `output_sewing_detail`.`tgl_cu` AS `tgl_cu`,
                    `output_sewing_detail`.`tgl_ass` AS `tgl_ass`,
                    sum( `output_sewing_detail`.`qty` ) AS `qty`,
                    sum( IF ( `output_sewing_detail`.`center_panel` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS `qt_cp`,
                    sum( IF ( `output_sewing_detail`.`back_wings` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS `qt_bw`,
                    sum( IF ( `output_sewing_detail`.`cups` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS `qt_cu`,
                    sum( IF ( `output_sewing_detail`.`assembly` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS `qt_ass`,
                    `order`.`qty` AS `qty_order` 
                FROM
                    (
                        ( `output_sewing` JOIN `output_sewing_detail` ON ( `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` ) )
                        LEFT JOIN `order` ON ( `order`.`orc` = `output_sewing_detail`.`orc` ) 
                    )
                WHERE 
                `output_sewing_detail`.`orc` = '$orc'
                GROUP BY
                    `output_sewing_detail`.`orc`";
         $query = $this->db->query($rst);
         return $query->result();
    }
    // public function get_by_line_day(){
    //     if(isset($_POST['orc'])){
    //       ;
    //        $orc = $_POST['orc'];
           
    //         $this->db->where('orc', $orc);
    
    //         $rst = $this->db->get($this->table);
    //         // return $this->db->last_query();
    //         return $rst->result();
    //     }
    //   }

}