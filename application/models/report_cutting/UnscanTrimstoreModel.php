<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanTrimstoreModel extends CI_Model
{

	var $table = 'v_unscan_trimstore';

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
		`input_cutting`.`orc` AS `orc`,
		`input_cutting`.`style` AS `style`,
		`input_cutting`.`color` AS `color`,
		`input_cutting`.`size` AS `size`,
		`input_cutting`.`qty_pcs` AS `qty_pcs`,
		`input_cutting`.`kode_barcode` AS `kodebarcodetrims`,
		`input_sewing`.`kode_barcode` AS `kodetosewing`,
		`order`.`buyer` AS `buyer` 
	FROM
		(
			( `input_cutting` LEFT JOIN `input_sewing` ON ( `input_cutting`.`kode_barcode` = `input_sewing`.`kode_barcode` ) )
			JOIN `order` ON ( `order`.`orc` = `input_cutting`.`orc` ) 
		) 
	WHERE
		`input_sewing`.`kode_barcode` IS NULL and`input_cutting`.`orc` = '$id' ";
		$query = $this->db->query($sql);
		// print_r($sql); die();
		return $query->result();
		// var_dump($sql);
		// die;
	
	}

	public function get_orc(){
        if(isset($_POST['orc'])){
            $orc = $_POST['orc'];
            // $this->db->where('orc', $orc);
    
            // $rst = $this->db->get($this->table);
            // return $this->db->last_query();
            // return $rst->result();
		}
		$sql = "SELECT
		`input_cutting`.`orc` AS `orc`,
		`input_cutting`.`style` AS `style`,
		`input_cutting`.`color` AS `color`,
		`input_cutting`.`size` AS `size`,
		`input_cutting`.`qty_pcs` AS `qty_pcs`,
		`input_cutting`.`kode_barcode` AS `kodebarcodetrims`,
		`input_sewing`.`kode_barcode` AS `kodetosewing`,
		`order`.`buyer` AS `buyer` 
	FROM
		(
			( `input_cutting` LEFT JOIN `input_sewing` ON ( `input_cutting`.`kode_barcode` = `input_sewing`.`kode_barcode` ) )
			JOIN `order` ON ( `order`.`orc` = `input_cutting`.`orc` ) 
		) 
	WHERE
		`input_sewing`.`kode_barcode` IS NULL and`input_cutting`.`orc` = ' $orc'";

$query = $this->db->query($sql);
// print_r($sql); die();
return $query->result();

	}
	
}
