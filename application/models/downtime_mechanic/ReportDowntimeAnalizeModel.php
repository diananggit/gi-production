<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeAnalizeModel extends CI_Model{
    // var $table="v_sn_breakdown";

    public function get_month(){
       
        $rst = "SELECT DISTINCT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month` 
                FROM
                    `v_breackdown_machine` 
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`barcode_machine`,
                    `v_breackdown_machine`.`sympton`,
                    `v_breackdown_machine`.`machine_type` 
                HAVING
                    count( `v_breackdown_machine`.`barcode_machine` ) >= 5 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`barcode_machine` DESC";
        $query = $this->db->query($rst);
        return $query->result_array();
    }

    public function get_by_month($month){
        // $rst = $this->db->get_where($this->table, array('month' => $month));
        // return $rst->result();
        $rst = "SELECT
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) AS `month`,
                    `v_breackdown_machine`.`sympton` AS `sympton`,
                    `v_breackdown_machine`.`machine_type` AS `machine_type`,
                    count( `v_breackdown_machine`.`barcode_machine` ) AS `tot_machine`,
                    `v_breackdown_machine`.`barcode_machine` AS `barcode_machine`,
                    `v_breackdown_machine`.`machine_sn` AS `machine_sn` 
                FROM
                    `v_breackdown_machine` 
                    WHERE
                    monthname( `v_breackdown_machine`.`tgl_waiting` ) = '$month'
                GROUP BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`barcode_machine`,
                    `v_breackdown_machine`.`sympton`,
                    `v_breackdown_machine`.`machine_type` 
                HAVING
                    `tot_machine` >= 5 
                ORDER BY
                    monthname( `v_breackdown_machine`.`tgl_waiting` ),
                    `v_breackdown_machine`.`barcode_machine` DESC";
         $query = $this->db->query($rst);
         return $query->result_array();
        
    }
   
}