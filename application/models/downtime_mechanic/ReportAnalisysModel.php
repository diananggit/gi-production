<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportAnalisysModel extends CI_Model{

    public function get_all(){

    $rst = "SELECT
                machine_breakdown.machine_type AS machine_type,
                machine_breakdown.machine_brand AS machine_brand,
                machine_breakdown.machine_sn AS machine_sn,
                machine_breakdown.tgl AS tgl,
                count( machine_breakdown.machine_sn ) AS `Time` 
            FROM
                machine_breakdown 
            WHERE
                machine_breakdown.machine_type IS NOT NULL 
            GROUP BY
                machine_breakdown.machine_sn,
                machine_breakdown.tgl 
            ORDER BY
                machine_breakdown.tgl";
    $query = $this->db->query($rst);

    return $query->result_array();


    }
    
}