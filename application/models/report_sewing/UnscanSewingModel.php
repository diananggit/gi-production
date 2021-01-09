<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanSewingModel extends CI_Model
{

	// var $table = 'v_unscan_sewing';

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

	public function get_all($id)
	{
		$sql = " SELECT
		`input_sewing`.`line` AS `line`,
		`input_sewing`.`orc` AS `orc`,
		`input_sewing`.`style` AS `style`,
		`input_sewing`.`color` AS `color`,
		`input_sewing`.`size` AS `size`,
		`input_sewing`.`no_bundle` AS `no_bundle`,
		`input_sewing`.`qty_pcs` AS `qty_pcs`,
		`input_sewing`.`tgl` AS `Indate`,
		`input_sewing`.`kode_barcode` AS `InCode`,
		`output_sewing_detail`.`assembly` AS `assembly`,
		`output_sewing_detail`.`tgl_ass` AS `tgl_ass` 
	FROM
		( `input_sewing` LEFT JOIN `output_sewing_detail` ON ( `input_sewing`.`kode_barcode` = `output_sewing_detail`.`kode_barcode` ) ) 
	WHERE
		`output_sewing_detail`.`tgl_ass` IS NULL AND `input_sewing`.`orc` = '$id'"; 
		$query = $this->db->query($sql);

		return $query->result();
	}

	
}
