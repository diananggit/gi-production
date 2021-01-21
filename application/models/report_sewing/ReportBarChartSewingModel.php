<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartSewingModel extends CI_Model{
    // var $table="view_sewing_daily_assembly";

    public function get_all(){
       
        $rst = "SELECT
                    `view_sewing_bar_line`.`day` AS `day`,
                    `view_sewing_bar_line`.`tgl` AS `tgl`,
                    sum( `view_sewing_bar_line`.`op` ) AS `op`,
                    sum( `view_sewing_bar_line`.`result` ) AS `result`,
                    sum( `view_sewing_bar_line`.`qty_sewing` ) AS `qty_sewing`,
                    `view_sewing_bar_line`.`sam` AS `sam`,
                    sum( `view_sewing_bar_line`.`target` ) AS `target`,
                    round( avg( `view_sewing_bar_line`.`eff` ), 2 ) AS `eff` 
                FROM
                    `view_sewing_bar_line` 
                GROUP BY
                    `view_sewing_bar_line`.`tgl`";
        $query = $this->db->query($rst);
        return $query->result();
    }
}