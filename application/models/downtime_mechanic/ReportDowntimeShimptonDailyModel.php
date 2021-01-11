<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeShimptonDailyModel extends CI_Model{
    // var $table="v_daily_simpton";

    public function get_all(){
		$sql = "SELECT
					`v_breackdown_machine`.`tgl_waiting` AS `month`,
					`v_breackdown_machine`.`sympton` AS `sympton`,
					count( `v_breackdown_machine`.`sympton` ) AS `tot_machine`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `respon`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair` 
				FROM
					`v_breackdown_machine` 
				GROUP BY
					`v_breackdown_machine`.`tgl_waiting`,
					`v_breackdown_machine`.`sympton` 
				HAVING
					`tot_machine` > 0";
       $query = $this->db->query($sql);
       return $query->result_array();
        // return $this->db->last_query();
    }

    public function get_by_daterange()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr']; 

			$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
			$to_date = date('Y-m-d', strtotime($dataStr['to_date']));
					
		}
				
		$sql = "SELECT
					`v_breackdown_machine`.`tgl_waiting` AS `month`,
					`v_breackdown_machine`.`sympton` AS `sympton`,
					count( `v_breackdown_machine`.`sympton` ) AS `tot_machine`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `respon`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair` 
				FROM
					`v_breackdown_machine` 
				WHERE
				`v_breackdown_machine`.`tgl_waiting` >= '$from_date' AND `v_breackdown_machine`.`tgl_waiting` <= '$to_date'
				GROUP BY
					`v_breackdown_machine`.`tgl_waiting`,
					`v_breackdown_machine`.`sympton` 
				HAVING
					`tot_machine` > 0";
					$query = $this->db->query($sql);
					return $query->result();
	}

	
	public function get_by_tgl($tgl_waiting){
        // $rst = $this->db->get_where($this->table, array('month' => $tgl_waiting));
		// return $rst->result();
		$sql = "SELECT
					`v_breackdown_machine`.`tgl_waiting` AS `month`,
					`v_breackdown_machine`.`sympton` AS `sympton`,
					count( `v_breackdown_machine`.`sympton` ) AS `tot_machine`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`respon_d` ) ) ) AS `respon`,
					sec_to_time( sum( time_to_sec( `v_breackdown_machine`.`repair_d` ) ) ) AS `repair` 
				FROM
					`v_breackdown_machine` 
				WHERE
				`v_breackdown_machine`.`tgl_waiting` = '$tgl_waiting'
				GROUP BY
					`v_breackdown_machine`.`tgl_waiting`,
					`v_breackdown_machine`.`sympton` 
				HAVING
					`tot_machine` > 0";
					$query = $this->db->query($sql);
					return $query->result_array();
		
    }
   
} 