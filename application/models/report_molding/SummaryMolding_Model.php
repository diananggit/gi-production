<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SummaryMolding_Model extends CI_Model

{
	var $table = "view_orc_sewing2";
	var $column_order = array('tgl', 'orc', 'order', 'qty_out');

	public function get_by_daterange()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];
			$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
			$this->db->where("tgl >=", $from_date);
			$rst = $this->db->get('v_summary_molding');
			return $rst->result();
		}
	}

	public function get_all()
	{
		$sql = " SELECT * FROM v_summary_molding";
		$query = $this->db->query($sql);

		return $query->result();
	}
}
