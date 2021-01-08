<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeMachineLineModel extends CI_Model{
    // var $table="v_breakdown_line";

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
                    date_format( `v_breackdown_machine`.`tgl_waiting`, '%M' ) AS `month`,
                    `v_breackdown_machine`.`line` AS `line`,
                    count( `v_breackdown_machine`.`line` ) AS `tot_machine` 
                FROM
                    `v_breackdown_machine`
                WHERE
                `v_breackdown_machine`.`tgl_waiting` = '$ResultBookingTime'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`line`";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

    public function get_line(){
       $rst = "SELECT DISTINCT
                    date_format( `v_breackdown_machine`.`tgl_waiting`, '%M' ) AS `month`	 
                FROM
                    `v_breackdown_machine` 
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`line`";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

    public function get_by_line($month){
        // $resutReplace=str_replace("%20"," ",$line);
        $rst = "SELECT
                    date_format( `v_breackdown_machine`.`tgl_waiting`, '%M' ) AS `month`,
                    `v_breackdown_machine`.`line` AS `line`,
                    count( `v_breackdown_machine`.`line` ) AS `tot_machine` 
                FROM
                    `v_breackdown_machine`
                WHERE 
                date_format( `v_breackdown_machine`.`tgl_waiting`, '%M' ) = '$month'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`line`";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

   
}