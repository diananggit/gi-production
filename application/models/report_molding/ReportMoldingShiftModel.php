<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportMoldingShiftModel extends CI_Model
{

	public function get_all(){
        $rst = "SELECT
                    `view_periode_molding`.`tgl` AS `tgl`,
                    `view_periode_molding`.`no_mesin` AS `no_mesin`,
                    `view_periode_molding`.`size` AS `size`,
                    `view_periode_molding`.`orc` AS `orc`,
                    `view_periode_molding`.`style` AS `style`,
                    `view_periode_molding`.`color` AS `color`,
                    `view_periode_molding`.`shift` AS `shift`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS `firsts_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS `second_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS `third_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS `fourth_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS `five_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS `six_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS `seven_outer`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS `firsts_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS `second_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS `third_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS `fourt_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS `five_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS `six_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS `seven_midlinning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS `firsts_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS `second_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS `third_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS `fourt_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS `five_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS `six_linning`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS `seven_linning`,
                    `view_periode_molding`.`qty_mold` AS `qty_mold` 
                FROM
                    `view_periode_molding`
                WHERE
                    `view_periode_molding`.`shift` = 'pertama'
                GROUP BY
                `view_periode_molding`.`no_mesin`,
                    `view_periode_molding`.`style`,
                    `view_periode_molding`.`orc`,
                    `view_periode_molding`.`color`,
                    `view_periode_molding`.`size` ,
                    `view_periode_molding`.`shift`
                ORDER BY
                    `view_periode_molding`.`no_mesin`
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_shift_dua(){
        $rst = "SELECT
        `view_periode_molding`.`tgl` AS `tgl`,
        `view_periode_molding`.`no_mesin` AS `no_mesin`,
        `view_periode_molding`.`size` AS `size`,
        `view_periode_molding`.`orc` AS `orc`,
        `view_periode_molding`.`style` AS `style`,
        `view_periode_molding`.`color` AS `color`,
        `view_periode_molding`.`shift` AS `shift`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS `firsts_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS `second_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS `third_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS `fourth_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS `five_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS `six_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS `seven_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS `firsts_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS `second_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS `third_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS `fourt_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS `five_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS `six_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS `seven_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS `firsts_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS `second_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS `third_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS `fourt_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS `five_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS `six_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS `seven_linning`,
        `view_periode_molding`.`qty_mold` AS `qty_mold` 
    FROM
        `view_periode_molding`
    WHERE
        `view_periode_molding`.`shift` = 'kedua'
    GROUP BY
    `view_periode_molding`.`no_mesin`,
        `view_periode_molding`.`style`,
        `view_periode_molding`.`orc`,
        `view_periode_molding`.`color`,
        `view_periode_molding`.`size` ,
        `view_periode_molding`.`shift`
    ORDER BY
        `view_periode_molding`.`no_mesin`
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_shift_tiga(){
        $rst = "SELECT
        `view_periode_molding`.`tgl` AS `tgl`,
        `view_periode_molding`.`no_mesin` AS `no_mesin`,
        `view_periode_molding`.`size` AS `size`,
        `view_periode_molding`.`orc` AS `orc`,
        `view_periode_molding`.`style` AS `style`,
        `view_periode_molding`.`color` AS `color`,
        `view_periode_molding`.`shift` AS `shift`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS `firsts_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS `second_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS `third_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS `fourth_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS `five_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS `six_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS `seven_outer`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS `firsts_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS `second_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS `third_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS `fourt_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS `five_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS `six_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS `seven_midlinning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS `firsts_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS `second_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS `third_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS `fourt_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS `five_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS `six_linning`,
        sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS `seven_linning`,
        `view_periode_molding`.`qty_mold` AS `qty_mold` 
    FROM
        `view_periode_molding`
    WHERE
        `view_periode_molding`.`shift` = 'ketiga'
    GROUP BY
    `view_periode_molding`.`no_mesin`,
        `view_periode_molding`.`style`,
        `view_periode_molding`.`orc`,
        `view_periode_molding`.`color`,
        `view_periode_molding`.`size` ,
        `view_periode_molding`.`shift`
    ORDER BY
        `view_periode_molding`.`no_mesin`
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_Total(){
        $rst = "SELECT
                    output_molding.shift AS shift,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold    
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='pertama'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    
                    output_molding.shift
                
                ORDER BY
            output_molding.tgl DESC";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_Total_shift2(){
        $rst = "SELECT
                    output_molding.shift AS shift,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold    
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='kedua'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    
                    output_molding.shift
                
                ORDER BY
            output_molding.tgl DESC";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_Total_shift3(){
        $rst = "SELECT
                    output_molding.shift AS shift,
                    Sum(output_molding_detail.qty_outermold) AS qty_outer,
                    Sum(output_molding_detail.qty_midmold) AS qty_midmold,
                    Sum(output_molding_detail.qty_linningmold) AS qty_linning,
                    COALESCE ( sum( `output_molding_detail`.`qty_outermold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_midmold` ), 0 ) + COALESCE ( sum( `output_molding_detail`.`qty_linningmold` ), 0 ) AS qty_mold    
                FROM
                    (output_molding
                JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
                WHERE
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
                    output_molding.shift ='ketiga'
                GROUP BY
                    date_format( `output_molding`.`tgl`, '%Y-%m-%d' ),
                    
                    output_molding.shift
                
                ORDER BY
            output_molding.tgl DESC";
        $query =$this->db->query($rst);
		return $query->result();
    }


    public function get_all_detail($no_mesin){
        $rst = "SELECT
        weekday( `output_molding`.`tgl` ) AS weekly,
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
        date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
        date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
        output_molding.no_mesin AS no_mesin,
        timeDurationMolding ( dayname( date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) ), date_format( `output_molding`.`tgl`, '%H:%i:%s' ) ) AS timePeriodeMolding,
        output_molding.shift AS shift,
        output_molding.style AS style,
        output_molding.color AS color,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) AS qty_outer,
        COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) AS mid_lining,
        COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_linning,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_mold,
        output_molding_detail.outermold_sam_result AS outer_result,
        output_molding_detail.midmold_sam_result AS midmold_result,
        output_molding_detail.linningmold_sam_result AS linning_results,
        output_molding_detail.size AS size,
        output_molding.orc AS orc,
        output_molding_detail.no_bundle
        FROM
        (output_molding
        JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
        WHERE
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
        output_molding.shift = 'pertama' AND
        output_molding.no_mesin = '$no_mesin'
        ORDER BY
        output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_all_detail_shift2($no_mesin){
        $rst = "SELECT
        weekday( `output_molding`.`tgl` ) AS weekly,
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
        date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
        date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
        output_molding.no_mesin AS no_mesin,
        timeDurationMolding ( dayname( date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) ), date_format( `output_molding`.`tgl`, '%H:%i:%s' ) ) AS timePeriodeMolding,
        output_molding.shift AS shift,
        output_molding.style AS style,
        output_molding.color AS color,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) AS qty_outer,
        COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) AS mid_lining,
        COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_linning,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_mold,
        output_molding_detail.outermold_sam_result AS outer_result,
        output_molding_detail.midmold_sam_result AS midmold_result,
        output_molding_detail.linningmold_sam_result AS linning_results,
        output_molding_detail.size AS size,
        output_molding.orc AS orc,
        output_molding_detail.no_bundle
        FROM
        (output_molding
        JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
        WHERE
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
        output_molding.shift = 'kedua' AND
        output_molding.no_mesin = '$no_mesin'
        ORDER BY
        output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function get_all_detail_shift3(){
        $rst = "SELECT
        weekday( `output_molding`.`tgl` ) AS weekly,
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) AS tgl,
        date_format( `output_molding`.`tgl`, '%m-%d' ) AS tanggal,
        date_format( `output_molding`.`tgl`, '%H:%i:%s' ) AS time,
        output_molding.no_mesin AS no_mesin,
        timeDurationMolding ( dayname( date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) ), date_format( `output_molding`.`tgl`, '%H:%i:%s' ) ) AS timePeriodeMolding,
        output_molding.shift AS shift,
        output_molding.style AS style,
        output_molding.color AS color,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) AS qty_outer,
        COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) AS mid_lining,
        COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_linning,
        COALESCE ( `output_molding_detail`.`qty_outermold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_midmold`, 0 ) + COALESCE ( `output_molding_detail`.`qty_linningmold`, 0 ) AS qty_mold,
        output_molding_detail.outermold_sam_result AS outer_result,
        output_molding_detail.midmold_sam_result AS midmold_result,
        output_molding_detail.linningmold_sam_result AS linning_results,
        output_molding_detail.size AS size,
        output_molding.orc AS orc,
        output_molding_detail.no_bundle
        FROM
        (output_molding
        JOIN output_molding_detail ON (output_molding_detail.id_output_molding = output_molding.id_output_molding))
        WHERE
        date_format( `output_molding`.`tgl`, '%Y-%m-%d' ) = CURRENT_DATE AND
        output_molding.shift = 'ketiga' 
        -- output_molding.no_mesin = '' and
        -- output_molding.style = '' and
        -- output_molding.orc = '' and
        -- output_molding_detail.size = ''

        ORDER BY
        output_molding.tgl DESC
        ";
        $query =$this->db->query($rst);
		return $query->result();
    }

    public function getTotalMoldingPeriode(){
        $rst = "SELECT
                    `view_periode_molding`.`tgl` AS `tgl`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS O1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS O2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS O3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS O4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS O5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS O6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS O7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS M1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS M2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS M3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS M4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS M5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS M6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS M7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS L1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS L2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS L3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS L4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS L5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS L6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS L7
                FROM
                    `view_periode_molding` 
                WHERE
                    `view_periode_molding`.`shift` = 'pertama' 
                GROUP BY
                    `view_periode_molding`.`tgl`";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getTotalMoldingPeriode2(){
        $rst = "SELECT
                    `view_periode_molding`.`tgl` AS `tgl`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS O1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS O2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS O3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS O4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS O5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS O6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS O7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS M1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS M2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS M3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS M4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS M5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS M6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS M7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS L1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS L2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS L3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS L4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS L5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS L6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS L7
                FROM
                    `view_periode_molding` 
                WHERE
                    `view_periode_molding`.`shift` = 'kedua' 
                GROUP BY
                    `view_periode_molding`.`tgl`";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getTotalMoldingPeriode3(){
        $rst = "SELECT
                    `view_periode_molding`.`tgl` AS `tgl`,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_outer` END ) AS O1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_outer` END ) AS O2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_outer` END ) AS O3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_outer` END ) AS O4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_outer` END ) AS O5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_outer` END ) AS O6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_outer` END ) AS O7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`mid_lining` END ) AS M1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`mid_lining` END ) AS M2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`mid_lining` END ) AS M3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`mid_lining` END ) AS M4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`mid_lining` END ) AS M5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`mid_lining` END ) AS M6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`mid_lining` END ) AS M7,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '1' THEN `view_periode_molding`.`qty_linning` END ) AS L1,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '2' THEN `view_periode_molding`.`qty_linning` END ) AS L2,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '3' THEN `view_periode_molding`.`qty_linning` END ) AS L3,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '4' THEN `view_periode_molding`.`qty_linning` END ) AS L4,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '5' THEN `view_periode_molding`.`qty_linning` END ) AS L5,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '6' THEN `view_periode_molding`.`qty_linning` END ) AS L6,
                    sum( CASE WHEN `view_periode_molding`.`timePeriodeMolding` = '7' THEN `view_periode_molding`.`qty_linning` END ) AS L7
                FROM
                    `view_periode_molding` 
                WHERE
                    `view_periode_molding`.`shift` = 'ketiga' 
                GROUP BY
                    `view_periode_molding`.`tgl`";
        $query = $this->db->query($rst);
        return $query->result();
    }

	
}
