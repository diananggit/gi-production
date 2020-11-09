<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDowntimeModel extends CI_Model{
    var $table="v_breackdown_machine";

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
			
			
			
			$this->db->group_start();
			$this->db->where("tgl_waiting >=", $from_date);
			$this->db->where("tgl_waiting <=", $to_date);
			$this->db->group_end();
			$rst = $this->db->get('v_breackdown_machine');
			return $rst->result();
			// return $this->db->last_query();
		}

	}

	

	public function get_all_line(){
        $this->db->select('DISTINCT(line)');
        $query = $this->db->get('v_breackdown_machine');

        return $query->result();
	}
	
	public function get_by_tgl($tgl_waiting){
        $rst = $this->db->get_where($this->table, array('tgl_waiting' => $tgl_waiting));
        return $rst->result();
    }
   
} 