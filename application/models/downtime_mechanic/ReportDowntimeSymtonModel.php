<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeSymtonModel extends CI_Model{
    // var $table="v_montly_shimpton";

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
                    `v_breackdown_machine`.`sympton` AS `sympton`,
                    count( `v_breackdown_machine`.`sympton` ) AS `tot_machine` 
                FROM
                    `v_breackdown_machine`
                WHERE 
                `v_breackdown_machine`.`tgl_waiting` = '$ResultBookingTime'  
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`sympton` 
                HAVING
                    `tot_machine` > 0 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` )";

       $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function get_sympton(){
        $rst = "SELECT DISTINCT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`
                FROM
                    `v_breackdown_machine` 
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`sympton` 
                HAVING
                    count( `v_breackdown_machine`.`sympton` ) > 0 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` )";
                    
        $query = $this->db->query($rst);
        return $query->result_array();
    }

    public function get_by_sympton($month){
        $rst = "SELECT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                    v_breackdown_machine.sympton AS sympton,
                    Count(v_breackdown_machine.sympton) AS tot_machine
                FROM
                    v_breackdown_machine
                WHERE
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) = '$month'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    v_breackdown_machine.sympton
                HAVING
                    `tot_machine` > 0
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) ASC
        
                    ";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

   
}