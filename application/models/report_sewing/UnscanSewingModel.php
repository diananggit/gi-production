<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanSewingModel extends CI_Model
{
	// var $table = 'v_unscan_sewing';
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
