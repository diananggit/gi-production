<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportOutputMoldingModel extends CI_Model
{
	var $table = "v_output_molding_mc";
	var $table2 = "master_mesin_molding";
	var $column_order = array('tgl', 'no_mesin', 'shift', 'style', 'color', 'qty_outer', 'qty_midmold', 'qty_linning');


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
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_by_daterange()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
			$to_date = date('Y-m-d', strtotime($dataStr['to_date']));
			$machine = $dataStr['machine'];
			// $this->db->where("tgl BETWEEN CAST($from_date AS DATE) AND CAST($to_date AS DATE)");
			$this->db->where("no_mesin", $machine);
			$this->db->group_start();
			$this->db->where("tgl >=", $from_date);
			$this->db->where("tgl <=", $to_date);
			$this->db->group_end();
			$rst = $this->db->get('v_output_molding_mc');
			return $rst->result();
			// return $this->db->last_query();
		}

	}

	public function get_mesin()
	{
		$rst = $this->db->get('master_mesin_molding');
		return $rst->result();
	}

	public function get_all_machine(){
        $this->db->select('DISTINCT(no_mesin)');
        $query = $this->db->get('v_output_molding_mc');

        return $query->result();
    }
}
