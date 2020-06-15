<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Production_planning_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    // get datas Holidays
    function getDataHolidays(){
        $data  =   $this->session->all_userdata();   

        $sql   = " SELECT * FROM dt_holidays ORDER BY date ASC ";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // get datas plannings
    function getDataLinePlannings(){
       
        $data =   $this->session->all_userdata();   

        $sql = " SELECT line_allocation1 as line,orc,style,buyer,etd,qty as order_qty,BAL_SEW,SAM,
            ROUND(((BAL_SEW * SAM)/32)/343,0) AS Hari,
            concat(`orc`,', ',`style`,', ',`qty`) as label,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS LASTSEW,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS STARTNEW_ORC,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS ENDSEW
        FROM `v_plan`
        WHERE line_allocation1 is not null
        ORDER BY line, NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY ";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

     // get datas planning by Line
     function getDataPlanningByLine($dataLine){
       
        $data =   $this->session->all_userdata();   
        
        $sql = " SELECT line_allocation1 as line,orc,style,buyer,etd,qty as order_qty,BAL_SEW,SAM,
            ROUND(((BAL_SEW * SAM)/32)/343,0) AS Hari,
            concat(`orc`,', ',`style`,', ',`qty`) as label,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS LASTSEW,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS STARTNEW_ORC,
            NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY AS ENDSEW
        FROM `v_plan`
        WHERE line_allocation1 = '$dataLine' 
            AND line_allocation1 is not null
        ORDER BY line, NOW() + INTERVAL (ROUND(((BAL_SEW * SAM)/32)/343,0)) DAY ";
        
        $query = $this->db->query($sql);

        return $query->result_array();
    }
    
}