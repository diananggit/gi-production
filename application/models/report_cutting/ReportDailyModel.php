<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDailyModel extends CI_Model{
    // var $table="eff_c";

    public function get_all(){
        $date   = date("Y-m-d H:i:s");
        $dayNow = date('l');
        $date1  = str_replace('-', '/', $date);

        if( $dayNow == 'Monday' ){
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-2 days"));
        }else{
            $ResultBookingTime = date('Y-m-d',strtotime($date1 . "-1 days"));
        }

        // $this->db->where('tgl', $hr );            
        
        // $rst = $this->db->get($this->table);
        $rst = "SELECT
                weekday( cutting_result.tgl ) AS hari,
                cutting_result.tgl AS tgl,
                sum( cutting_result.qty ) AS qty,
                sum( cutting_result.result ) AS result,
                IF (
                    weekday( cutting_result.tgl ) = '5',
                    round( sum( cutting_result.result ) / ( 5 * 98 * 60 ) * 100, 2 ),
                    round( sum( cutting_result.result ) / ( 7 * 98 * 60 ) * 100, 2 ) 
                ) AS eff
                FROM
                    cutting_result 
                WHERE
                    cutting_result.tgl = '$ResultBookingTime' 
                GROUP BY
                    cutting_result.tgl
                ORDER BY
                cutting_result.tgl DESC";

       $query = $this->db->query($rst);

        return $query->result_array();
    }

    
}