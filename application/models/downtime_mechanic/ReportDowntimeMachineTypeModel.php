<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeMachineTypeModel extends CI_Model{
    // var $table="v_monthly_type";

    public function get_all(){
        date_default_timezone_set('Asia/Jakarta');

        $date   = date("Y-m-d H:i:s");
        $dayNow = date('l');
        $date1  = str_replace('-', '/', $date);

        if( $dayNow == 'Monday' ){
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-2 days"));
        }else{
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-1 days"));
        }

        $rst = "SELECT
                monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                `v_breackdown_machine`.`machine_type` AS `machine_type`,
                count( `v_breackdown_machine`.`machine_type` ) AS `tot_machine` 
            FROM
                `v_breackdown_machine` 
            WHERE
                `v_breackdown_machine`.`machine_type` <> '' and `v_breackdown_machine`.`tgl_waiting` = '$ResultBookingTime'
            GROUP BY
                monthname( `v_breackdown_machine`.`tgl_waiting` ),
                `v_breackdown_machine`.`machine_type` 
            ORDER BY
                monthname( `v_breackdown_machine`.`tgl_waiting` ),
                `v_breackdown_machine`.`machine_type`";
            $query =$this->db->query($rst);
            return $query->result_array();
       
    }

    public function get_month(){
        $rst = "SELECT DISTINCT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month` 
                FROM
                    `v_breackdown_machine` 
                WHERE
                    `v_breackdown_machine`.`machine_type` <> '' 
                    
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`machine_type` 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`machine_type`";
        $query=$this->db->query($rst);
        return $query->result_array();
    }

    public function get_by_month($month){
        $rst = "SELECT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                    `v_breackdown_machine`.`machine_type` AS `machine_type`,
                    count( `v_breackdown_machine`.`machine_type` ) AS `tot_machine` 
                FROM
                    `v_breackdown_machine` 
                WHERE
                    `v_breackdown_machine`.`machine_type` <> '' AND monthname( `v_breackdown_machine`.`tgl_waiting` ) = '$month'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`machine_type` 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`machine_type`";
        $query=$this->db->query($rst);
        return $query->result_array();
    }
   


   
}