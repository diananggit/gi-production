<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeShimptonDailyModel extends CI_Model{
    var $table="v_daily_simpton";

    public function get_all(){

       $query = $this->db->get($this->table);
       return $query->result_array();
        // return $this->db->last_query();
    }

    public function get_by_daterange()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr']; 

			$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
			$to_date = date('Y-m-d', strtotime($dataStr['to_date']));
			// $hms = ['respon_duration'];   
			// $a = str_split($hms,':'); 
			// $respon = (+$a[0]) * 60 + (+$a[1]);
			
			// $this->db->where("tgl BETWEEN CAST($from_date AS DATE) AND CAST($to_date AS DATE)");
			// $this->db->where("respon_duration", $respon);
			$this->db->group_start();
			$this->db->where("month >=", $from_date);
			$this->db->where("month <=", $to_date);
			$this->db->group_end();
			$rst = $this->db->get('v_daily_simpton');
			return $rst->result();
			// return $this->db->last_query();
		}

	}

	// public function get_all_line(){
    //     $this->db->select('DISTINCT(line)');
    //     $query = $this->db->get('v_daily_simpton');

    //     return $query->result();
	// }
	
	public function get_by_tgl($tgl_waiting){
        $rst = $this->db->get_where($this->table, array('month' => $tgl_waiting));
        return $rst->result();
    }
   
} 