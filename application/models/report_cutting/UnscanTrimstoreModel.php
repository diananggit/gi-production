<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UnscanTrimstoreModel extends CI_Model
{
	// var $table = 'v_unscan_trimstore';
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
