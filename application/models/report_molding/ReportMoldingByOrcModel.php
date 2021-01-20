<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportMoldingByOrcModel extends CI_Model
{
	// var $table = "v_molding_single_orc_new";
	// var $column_order = array('tgl', 'orc', 'style', 'color', 'size', 'qty_order', 'qty_mold');


	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {

				if ($i === 0) // first loop
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_all()
	{
		// $this->db->from($this->table);
		// $query = $this->db->get();

		// return $query->result();
		$rst = "SELECT
					`v_molding_orc`.`day` AS `day`,
					`v_molding_orc`.`tgl` AS `tgl`,
					`v_molding_orc`.`buyer` AS `buyer`,
					`v_molding_orc`.`orc` AS `orc`,
					`v_molding_orc`.`style` AS `style`,
					`v_molding_orc`.`color` AS `color`,
					`v_molding_orc`.`size` AS `size`,
					`v_molding_orc`.`qty` AS `qty_order`,
					`v_molding_orc`.`etd` AS `etd`,
					`v_molding_orc`.`plan_export` AS `plan_export`,
					`v_molding_orc`.`line_allocation1` AS `Plan_Line`,
					`v_molding_orc`.`qty_linning` AS `qty_linning`,
					`v_molding_orc`.`qty_midmold` AS `qty_midmold`,
					`v_molding_orc`.`qty_outermold` AS `qty_outermold`,
				CASE
						
						WHEN ( `v_molding_orc`.`qty_linning` IS NULL AND `v_molding_orc`.`qty_midmold` IS NULL ) THEN
						`v_molding_orc`.`qty_outermold` 
						WHEN ( `v_molding_orc`.`qty_midmold` IS NULL AND `v_molding_orc`.`qty_outermold` IS NULL ) THEN
						`v_molding_orc`.`qty_linning` 
						WHEN ( `v_molding_orc`.`qty_outermold` IS NULL AND `v_molding_orc`.`qty_linning` IS NULL ) THEN
						`v_molding_orc`.`qty_midmold` 
						WHEN `v_molding_orc`.`qty_linning` IS NULL THEN
						least( `v_molding_orc`.`qty_midmold`, `v_molding_orc`.`qty_outermold` ) 
						WHEN `v_molding_orc`.`qty_midmold` IS NULL THEN
						least( `v_molding_orc`.`qty_linning`, `v_molding_orc`.`qty_outermold` ) 
						WHEN `v_molding_orc`.`qty_outermold` IS NULL THEN
						least( `v_molding_orc`.`qty_linning`, `v_molding_orc`.`qty_midmold` ) 
					END AS `qty_mold` 
				FROM
					`v_molding_orc` 
				GROUP BY
					`v_molding_orc`.`orc`,
					`v_molding_orc`.`tgl`,
					`v_molding_orc`.`size`";
			$query =$this->db->query($rst);
			return $query->result();
	}

	public function get_by_daterange()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
			$to_date = date('Y-m-d', strtotime($dataStr['to_date']));

			// $this->db->where("tgl BETWEEN CAST($from_date AS DATE) AND CAST($to_date AS DATE)");
			// $this->db->where("tgl >=", $from_date);
			// $this->db->where("tgl <=", $to_date);
			// $rst = $this->db->get('v_molding_single_orc_new');
			// return $rst->result();
		}
		$rst = "SELECT
					`v_molding_orc`.`day` AS `day`,
					`v_molding_orc`.`tgl` AS `tgl`,
					`v_molding_orc`.`buyer` AS `buyer`,
					`v_molding_orc`.`orc` AS `orc`,
					`v_molding_orc`.`style` AS `style`,
					`v_molding_orc`.`color` AS `color`,
					`v_molding_orc`.`size` AS `size`,
					`v_molding_orc`.`qty` AS `qty_order`,
					`v_molding_orc`.`etd` AS `etd`,
					`v_molding_orc`.`plan_export` AS `plan_export`,
					`v_molding_orc`.`line_allocation1` AS `Plan_Line`,
					`v_molding_orc`.`qty_linning` AS `qty_linning`,
					`v_molding_orc`.`qty_midmold` AS `qty_midmold`,
					`v_molding_orc`.`qty_outermold` AS `qty_outermold`,
				CASE
						
						WHEN ( `v_molding_orc`.`qty_linning` IS NULL AND `v_molding_orc`.`qty_midmold` IS NULL ) THEN
						`v_molding_orc`.`qty_outermold` 
						WHEN ( `v_molding_orc`.`qty_midmold` IS NULL AND `v_molding_orc`.`qty_outermold` IS NULL ) THEN
						`v_molding_orc`.`qty_linning` 
						WHEN ( `v_molding_orc`.`qty_outermold` IS NULL AND `v_molding_orc`.`qty_linning` IS NULL ) THEN
						`v_molding_orc`.`qty_midmold` 
						WHEN `v_molding_orc`.`qty_linning` IS NULL THEN
						least( `v_molding_orc`.`qty_midmold`, `v_molding_orc`.`qty_outermold` ) 
						WHEN `v_molding_orc`.`qty_midmold` IS NULL THEN
						least( `v_molding_orc`.`qty_linning`, `v_molding_orc`.`qty_outermold` ) 
						WHEN `v_molding_orc`.`qty_outermold` IS NULL THEN
						least( `v_molding_orc`.`qty_linning`, `v_molding_orc`.`qty_midmold` ) 
					END AS `qty_mold` 
				FROM
					`v_molding_orc`
					WHERE
					`v_molding_orc`.`tgl` >= ' $from_date' AND `v_molding_orc`.`tgl` <= '$to_date' 
				GROUP BY
					`v_molding_orc`.`orc`,
					`v_molding_orc`.`tgl`,
					`v_molding_orc`.`size`";
		 $query =$this->db->query($rst);
		 return $query->result();
	}
}
