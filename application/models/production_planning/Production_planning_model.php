<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Production_planning_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // slide first
    function get_all(){
        $this->load->library('session');
        $data =   $this->session->all_userdata();   

        // $sql   = " SELECT A.tgl, A.op, A.qty_sewing, A.target, A.eff, A.sam 
        //             FROM   ( SELECT * FROM view_sewing_daily_assembly 
        //                      ORDER BY tgl DESC LIMIT 6 ) as A
        //             ORDER BY A.tgl ASC ";
        // $query = $this->db->query($sql);

        // return $query->result_array();
       // print_r('model');
    }

    // slide second
    function getDataSlideSecond( $lineName, $tgl ){
        # code...
        $this->load->library('session');
        $data =   $this->session->all_userdata();   

        $sql = " SELECT table1.line, table1.dayname, table1.tgl_ass, table1.timePeriode, table1.assembly, 
			            -- A.qty AS qtys,
			            table1.resultQty AS QTY,table1.OP,table1.SAM,table1.TARGET 
                 FROM (	SELECT  osd.id_output_sewing_detail  ,os.line, dayname( osd.tgl_ass ) AS dayname, osd.tgl_ass,
                                timeDuration ( dayname( osd.tgl_ass ), osd.assembly ) AS timePeriode, osd.assembly, qty,
                                SUM(osd.qty) OVER ( ORDER BY timeDuration ( dayname( osd.tgl_ass ), osd.assembly ) ) AS resultQty,
                                -- SUM(osd.qty) AS QTY,
                                viewOutputSewingHourly.OP, viewInputSewingHourly.SAM,
                                target(  timeDuration ( dayname( osd.tgl_ass ), osd.assembly ), viewOutputSewingHourly.OP, 
               viewInputSewingHourly.SAM) AS TARGET
                        FROM output_sewing os
                        INNER JOIN output_sewing_detail osd
                            ON 
							    os.id_output_sewing = osd.id_output_sewing
                        INNER JOIN ( 
									    SELECT * FROM v_output_sewing_hourly 
										WHERE line='$lineName' AND tgl='$tgl'
		                            )AS viewOutputSewingHourly
							ON os.line = viewOutputSewingHourly.line
                        INNER JOIN ( 
										SELECT * FROM v_input_sewing_hourly 
                                        WHERE line='$lineName' AND tgl='$tgl'
                                        ORDER BY tgl DESC LIMIT 1
                                    )AS viewInputSewingHourly
                            ON os.line = viewInputSewingHourly.line
                        WHERE os.line= '$lineName' AND osd.tgl_ass = '$tgl'
                        -- GROUP BY osd.assembly
                        ORDER BY osd.assembly ASC ) AS table1
                GROUP BY table1.timePeriode ";

          $query = $this->db->query($sql);

          return $query->result_array();
    }




    
}