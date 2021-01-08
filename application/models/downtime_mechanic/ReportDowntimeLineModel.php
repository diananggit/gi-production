<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeLineModel extends CI_Model{
    // var $table="v_line_mont_duration";


    public function get_by_line_mont(){

        $month = $_POST['month'];
           
        $rst = "SELECT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                    `v_breackdown_machine`.`line` AS `line`,
                    `v_breackdown_machine`.`tgl_waiting` AS `tgl_waiting`,
                    sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `respon_d`,
                    sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair_d` 
                FROM
                    `v_breackdown_machine`
                WHERE
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month` = '$month'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`line`";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

    public function get_by_line_mont2($month){
        
        $rst="SELECT
                monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                `v_breackdown_machine`.`line` AS `line`,
                `v_breackdown_machine`.`tgl_waiting` AS `tgl_waiting`,
                sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `respon_d`,
                sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair_d` 
            FROM
                `v_breackdown_machine`
            WHERE
                monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month` = '$month'
            GROUP BY
                monthname( `v_breackdown_machine`.`tgl_waiting` ),
                `v_breackdown_machine`.`line`";
        $query = $this->db->query($rst);
        return $query->result_array();

    }

   
}