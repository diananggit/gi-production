<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportutilizeModel extends CI_Model{
    // var $table="v_sum_breakdown";
    
    public function get_all($tgl_waiting){
       
        $rst = "SELECT
                    `v_breackdown_machine`.`tgl_waiting` AS `tgl_waiting`,
                    sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `repon`,
                    sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair` 
                FROM
                    `v_breackdown_machine` 
                WHERE
                `v_breackdown_machine`.`tgl_waiting` = '$tgl_waiting'
                GROUP BY
                    `v_breackdown_machine`.`tgl_waiting`";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

   

}