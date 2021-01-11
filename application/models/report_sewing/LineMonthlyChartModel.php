<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LineMonthlyChartModel extends CI_Model{
    // var $table="eff_line_month2";
    // var $column_order= array('orc','style','color','sam','qty','eff_coba','op');

    public function get_all(){

        $sql = "SELECT
                    `eff_line_month`.`month` AS `month`,
                    `eff_line_month`.`week` AS `week`,
                    `eff_line_month`.`day` AS `day`,
                    `eff_line_month`.`dayname` AS `dayname`,
                    `eff_line_month`.`tgl` AS `tgl`,
                    `eff_line_month`.`line` AS `line`,
                    `eff_line_month`.`orc` AS `orc`,
                    `eff_line_month`.`style` AS `style`,
                    `eff_line_month`.`color` AS `color`,
                    `eff_line_month`.`sam` AS `sam`,
                    `eff_line_month`.`op` AS `op`,
                    `eff_line_month`.`result` AS `result`,
                    sum( `eff_line_month`.`qty` ) AS `qty`,
                    sum( `eff_line_month`.`qty_sewing` ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            `eff_line_month`.`day` = '5',
                            `eff_line_month`.`result` / ( 5 * `eff_line_month`.`op` * 60 ) * 100,
                            `eff_line_month`.`result` / ( 7 * `eff_line_month`.`op` * 60 ) * 100 
                        ),
                        2 
                    ) AS `eff` 
                FROM
                    `eff_line_month` 
                GROUP BY
                    `eff_line_month`.`month`,
                    `eff_line_month`.`orc`,
                    `eff_line_month`.`line`";
        $query = $this->db->query($sql);
        // print_r($sql); die();
        return $query->result();
    }

    public function get_by_month($m){
     
        // $rst = $this->db->get_where($this->table, array('month' => $m));
        
        // return $rst->result();
        $rst = "SELECT
                    `eff_line_month`.`month` AS `month`,
                    `eff_line_month`.`week` AS `week`,
                    `eff_line_month`.`day` AS `day`,
                    `eff_line_month`.`dayname` AS `dayname`,
                    `eff_line_month`.`tgl` AS `tgl`,
                    `eff_line_month`.`line` AS `line`,
                    `eff_line_month`.`orc` AS `orc`,
                    `eff_line_month`.`style` AS `style`,
                    `eff_line_month`.`color` AS `color`,
                    `eff_line_month`.`sam` AS `sam`,
                    `eff_line_month`.`op` AS `op`,
                    `eff_line_month`.`result` AS `result`,
                    sum( `eff_line_month`.`qty` ) AS `qty`,
                    sum( `eff_line_month`.`qty_sewing` ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            `eff_line_month`.`day` = '5',
                            `eff_line_month`.`result` / ( 5 * `eff_line_month`.`op` * 60 ) * 100,
                            `eff_line_month`.`result` / ( 7 * `eff_line_month`.`op` * 60 ) * 100 
                        ),
                        2 
                    ) AS `eff` 
                FROM
                    `eff_line_month` 
                WHERE
                `eff_line_month`.`month` = ''
                GROUP BY
                    `eff_line_month`.`month`,
                    `eff_line_month`.`orc`,
                    `eff_line_month`.`line`";
        $query = $this->db->query($rst);
        // print_r($sql); die();
        return $query->result();
        
    }

    public function get_by_line($line){
        // $this->db->select('DISTINCT(month)');
        $resultReplace=str_replace("%20"," ",$line);
        // $rst = $this->db->get_where($this->table, array('line' =>  $resultReplace));

        // return $rst->result();
        $sql = "SELECT DISTINCT
                    `eff_line_month`.`month` AS `month`
                    
                FROM
                    `eff_line_month`
                    where 
                    `eff_line_month`.`line` = '$resultReplace'
                GROUP BY
                    `eff_line_month`.`month`,
                    `eff_line_month`.`orc`,
                    `eff_line_month`.`line`";
        $query = $this->db->query($sql);
        // print_r($sql); die();
        return $query->result();
    }

    public function get_by_line_month(){
        if(isset($_POST['dataStr'])){
            $dataStr = $_POST['dataStr'];
            $line = $dataStr['line'];
            $month = $dataStr['month'];
        }
        $sql = "SELECT
                    `eff_line_month`.`month` AS `month`,
                    `eff_line_month`.`week` AS `week`,
                    `eff_line_month`.`day` AS `day`,
                    `eff_line_month`.`dayname` AS `dayname`,
                    `eff_line_month`.`tgl` AS `tgl`,
                    `eff_line_month`.`line` AS `line`,
                    `eff_line_month`.`orc` AS `orc`,
                    `eff_line_month`.`style` AS `style`,
                    `eff_line_month`.`color` AS `color`,
                    `eff_line_month`.`sam` AS `sam`,
                    `eff_line_month`.`op` AS `op`,
                    `eff_line_month`.`result` AS `result`,
                    sum( `eff_line_month`.`qty` ) AS `qty`,
                    sum( `eff_line_month`.`qty_sewing` ) AS `qty_sewing`,
                    round(
                    IF
                        (
                            `eff_line_month`.`day` = '5',
                            `eff_line_month`.`result` / ( 5 * `eff_line_month`.`op` * 60 ) * 100,
                            `eff_line_month`.`result` / ( 7 * `eff_line_month`.`op` * 60 ) * 100 
                        ),
                        2 
                    ) AS `eff` 
                FROM
                    `eff_line_month` 
                WHERE
                `eff_line_month`.`line` = '$line' AND `eff_line_month`.`month` = '$month'
                GROUP BY
                    `eff_line_month`.`month`,
                    `eff_line_month`.`orc`,
                    `eff_line_month`.`line`";
        $query = $this->db->query($sql);
        // print_r($sql); die();
        return $query->result();
    }
   

    
}