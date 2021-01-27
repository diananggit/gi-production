<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportMoldingShiftModel extends CI_Model
{

	public function get_all(){
        $rst = "SELECT
                    weekday( `output_molding`.`tgl` ) AS weekly,
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
                    date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
                    date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
                    output_molding.no_mesin AS no_mesin,
                    output_molding.shift AS shift,
                    output_molding.style AS style,
                    output_molding.color AS color,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold,
                    Sum(output_molding_detail.outermold_sam_result) AS outer_result,
                    Sum(output_molding_detail.midmold_sam_result) AS midmold_result,
                    Sum(output_molding_detail.linningmold_sam_result) AS linning_results,
                    COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) AS sum_result,
                    round(
                            (
                                COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) 
                            ) / 420 * 100,
                            0 
                        ) AS eff,
                    output_molding.orc,
                    
                    output_molding_detail.size
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='pertama'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    output_molding.no_mesin,
                    output_molding.style,
                    output_molding.orc,
                    output_molding.color, 
                    output_molding_detail.size,
                    output_molding.shift
                
                ORDER BY
                    output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_shift_dua(){
        $rst = "SELECT
                    weekday( `output_molding`.`tgl` ) AS weekly,
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
                    date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
                    date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
                    output_molding.no_mesin AS no_mesin,
                    output_molding.shift AS shift,
                    output_molding.style AS style,
                    output_molding.color AS color,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold,
                    Sum(output_molding_detail.outermold_sam_result) AS outer_result,
                    Sum(output_molding_detail.midmold_sam_result) AS midmold_result,
                    Sum(output_molding_detail.linningmold_sam_result) AS linning_results,
                    COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) AS sum_result,
                    round(
                            (
                                COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) 
                            ) / 420 * 100,
                            0 
                        ) AS eff,
                    output_molding.orc,
                    
                    output_molding_detail.size
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='kedua'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    output_molding.no_mesin,
                    output_molding.style,
                    output_molding.orc,
                    output_molding.color, 
                    output_molding_detail.size,
                    output_molding.shift
                
                ORDER BY
                    output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_shift_tiga(){
        $rst = "SELECT
                    weekday( `output_molding`.`tgl` ) AS weekly,
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
                    date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
                    date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
                    output_molding.no_mesin AS no_mesin,
                    output_molding.shift AS shift,
                    output_molding.style AS style,
                    output_molding.color AS color,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold,
                    Sum(output_molding_detail.outermold_sam_result) AS outer_result,
                    Sum(output_molding_detail.midmold_sam_result) AS midmold_result,
                    Sum(output_molding_detail.linningmold_sam_result) AS linning_results,
                    COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) AS sum_result,
                    round(
                            (
                                COALESCE ( sum( `output_molding_detail`.`outermold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`midmold_sam_result` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`linningmold_sam_result` ), 0 ) 
                            ) / 420 * 100,
                            0 
                        ) AS eff,
                    output_molding.orc,
                    
                    output_molding_detail.size
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='ketiga'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    output_molding.no_mesin,
                    output_molding.style,
                    output_molding.orc,
                    output_molding.color, 
                    output_molding_detail.size,
                    output_molding.shift
                
                ORDER BY
                    output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

	
}
