<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartMoldingModel extends CI_Model{
    // var $table="daily_mold";

    public function get_all(){
        $rst = "SELECT
                    weekday( `v_molding_orc`.`tgl` ) AS `day`,
                    `v_molding_orc`.`tgl` AS `tgl`,
                    sum( `v_molding_orc`.`qty_mold` ) AS `qty_mold`,
                    COALESCE ( sum( `v_molding_orc`.`outer_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`midmold_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`linning_result` ), 0 ) AS `result`,
                    round(
                    IF
                        (
                            weekday( `v_molding_orc`.`tgl` ) = '5',
                            (
                                COALESCE ( sum( `v_molding_orc`.`outer_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`midmold_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`linning_result` ), 0 ) 
                            ) / 14400 * 100,
                            (
                                COALESCE ( sum( `v_molding_orc`.`outer_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`midmold_result` ), 0 ) + COALESCE ( sum( `v_molding_orc`.`linning_result` ), 0 ) 
                            ) / 20160 * 100 
                        ),
                        2 
                    ) AS `eff`,
                    sum( `v_molding_orc`.`qty_outermold` ) AS `qty_outermold`,
                    sum( `v_molding_orc`.`qty_midmold` ) AS `qty_midmold`,
                    sum( `v_molding_orc`.`qty_linning` ) AS `qty_linning` 
                FROM
                    `v_molding_orc` 
                GROUP BY
                    `v_molding_orc`.`tgl`";
        $query = $this->db->query($rst);
        return $query->result();
    }
}