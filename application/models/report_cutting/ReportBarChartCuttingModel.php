<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarChartCuttingModel extends CI_Model{

    public function get_all(){
        $rst = "SELECT
        weekday( `cutting_result`.`tgl` ) AS `day`,
        `cutting_result`.`tgl` AS `tgl`,
        sum( `cutting_result`.`qty` ) AS `qty`,
        sum( `cutting_result`.`result` ) AS `result`,
        IF (
            weekday( `cutting_result`.`tgl` ) = '5',
            round( sum( `cutting_result`.`result` ) / ( 5 * 98 * 60 ) * 100, 2 ),
            round( sum( `cutting_result`.`result` ) / ( 7 * 98 * 60 ) * 100, 2 ) 
        ) AS `eff`
        FROM
            `cutting_result` 
        WHERE
            `cutting_result`.`tgl` <> 0 
        GROUP BY
            `cutting_result`.`tgl`
                                ORDER BY
                                `cutting_result`.`tgl` asc
                                
        ";
        $query = $this->db->query($rst);

        return $query->result();
    }
}