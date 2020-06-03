<!DOCTYPE html>
<html>
<head>
   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSS LINE -->
  <?php $this->load->view('_partials/css'); ?>
  <?php $this->load->view('production_planning/css'); ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('_partials/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('_partials/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark" style="text-align: center;"></h1> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="container-fluid">
                <h3 style="text-align: left; color: #007bff" >
                    &nbsp;<i class="fa fa-calendar-o text-succes nav-icon"></i>
                        Production Planning
                </h3>

                <div class="gantt"></div>
                <span>Information:</span>
                <table>
                    <tr>
                        <td><div class="square color-weekend"></div></td>
                        <td> : </td>
                        <td>Sunday</td>
    
                        <td><div class="square color-holiday"></div></td>
                        <td> : </td>
                        <td>Holiday</td>
                 
                        <td><div class="square color-today"></div></td>
                        <td> : </td>
                        <td>To day</td>
                    </tr>
                </table>
        <!-- Small boxes (Stat box) -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view('_partials/js.php'); ?>
<?php $this->load->view('_partials/footer.php'); ?>


<script type="text/javascript">

    $(document).ready(async function() {
        //  await getDatas();
    });
    

   /*  async function getDatas() {
            const tanggal     = [];
            const target      = [];
            const achievement = [];
            const eff         = [];

            const sam         = [];

            $.ajax({
            url: "<?php echo site_url('/production_planning/ProductionPlanning/getDataPlannigs')?>",
            method: 'GET',
            async: false,
            dataType: 'json',
            success : function(data) {
                        $.each(data, function(index, val) {
                            tanggal.push(val);
                            target.push(val.ENDSEW);
                            achievement.push(val.label);
                            eff.push(val.eff);

                            sam.push(val.sam);

                        }); 
                     }, error : function(req, err) {
                        console.log(err);
                     }
            });
            return tanggal;
    };

    var resultSlideOne = getDatas();

    console.log(resultSlideOne); */
    
    $(function() {
        "use strict";

        const tanggal     = [];
        $.ajax({
            url: "<?php echo site_url('/production_planning/ProductionPlanning/getDataPlannigs')?>",
            method: 'GET',
            async: false,
            dataType: 'json',
            success : function(data) {
                        $.each(data, function(index, val) {
                            tanggal.push(val);
                            // target.push(val.ENDSEW);
                            // achievement.push(val.label);
                            // eff.push(val.eff);

                            // sam.push(val.sam);

                        }); 
                     }, error : function(req, err) {
                        console.log(err);
                     }
            });

            console.log('datasGET ',JSON.stringify(tanggal));
            
            var demoSource = [{
                name: "Sprint 0",
                desc: "Analysis",
                values: [{
                    from: 1581292800000,
                    to: 1585872000000,
                    label: "Requirement Gathering",
                    customClass: "ganttRed",
                    dataObj: demoSource
                }]
            },{
                desc: "Scoping",
                values: [{
                    from: 1322611200000,
                    to: 1323302400000,
                    label: "Scoping",
                    customClass: "ganttRed"
                }]
            },{
                name: "Sprint 1",
                desc: "Development",
                values: [{
                    from: 1323802400000,
                    to: 1325685200000,
                    label: "Development",
                    customClass: "ganttGreen"
                }]
            },{
                name: " ",
                desc: "Showcasing",
                values: [{
                    from: 1325685200000,
                    to: 1325695200000,
                    label: "Showcasing",
                    customClass: "ganttBlue"
                }]
            },{
                name: "Sprint 2",
                desc: "Development",
                values: [{
                    from: 1325695200000,
                    to: 1328785200000,
                    label: "Development",
                    customClass: "ganttGreen"
                }]
            },{
                desc: "Showcasing",
                values: [{
                    from: 1328785200000,
                    to: 1328905200000,
                    label: "Showcasing",
                    customClass: "ganttBlue"
                }]
            },{
                name: "Release Stage",
                desc: "Training",
                values: [{
                    from: 1330011200000,
                    to: 1336611200000,
                    label: "Training",
                    customClass: "ganttOrange"
                }]
            },{
                desc: "Deployment",
                values: [{
                    from: 1336611200000,
                    to: 1338711200000,
                    label: "Deployment",
                    customClass: "ganttOrange"
                }]
            },{
                desc: "Warranty Period",
                values: [{
                    from: 1336611200000,
                    to: 1349711200000,
                    label: "Warranty Period",
                    customClass: "ganttOrange"
                }]
            }];


            var demoSource1 = [{
                name: "BESAKIH",
                desc: "",
                values: [{
                    from: '2020-05-01',
                    to: '2020-05-29',
                    label: "#ORC CI, STYLE",
                    customClass: "ganttRed",
                    dataObj: demoSource
                },{
                    from: '2020-05-30',
                    to: '2020-06-07',
                    label: "#ORC SI, STYLE",
                    customClass: "ganttOrange",
                    dataObj: demoSource
                }]
            },{
                name: "TANAH TORAJA",
                desc: "",
                values: [{
                    from: '2020-05-29',
                    to: '2020-06-07',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen",
                    dataObj: demoSource
                }]
            },{
                name: "TANAH LOT",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-06-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen",
                    dataObj: demoSource
                }]
            }];


            const datas = [
            {
                name: "BESAKIH",
                desc: "",
                values: [{
                    from: '2020-05-01 10:34:50',
                    to: '2020-05-29 10:34:50',
                    label: "#ORC CI, STYLE",
                    customClass: "ganttRed"
                },{
                    from: '2020-05-30',
                    to: '2020-06-07',
                    label: "#ORC SI, STYLE",
                    customClass: "ganttOrange"
                }]
            },{
                name: "TANAH TORAJA",
                desc: "",
                values: [{
                    from: '2020-05-29',
                    to: '2020-10-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "TANAH LOT",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-12-11',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "BUNAKEN",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-11-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "RAJA AMPAT",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-10-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "TANAH TORAJA",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-09-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "MALIOBORO",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-08-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "WAKATOBI",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-07-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            },{
                name: "PRAMBANAN",
                desc: "",
                values: [{
                    from: '2020-06-07',
                    to: '2020-12-10',
                    label: "#ORC, STYLE",
                    customClass: "ganttGreen"
                }]
            }];

            // shifts dates closer to Date.now()
            var offset = new Date().setHours(0, 0, 0, 0) -
                new Date(demoSource[0].values[0].from).setDate(35);
            for (var i = 0, len = demoSource.length, value; i < len; i++) {
                value = demoSource[i].values[0];
                value.from += offset;
                value.to += offset;
            }

            $(".gantt").gantt({
                source: datas,
                navigate: "scroll",
                scale: "days",
                maxScale: "months",
                minScale: "hours",
                itemsPerPage: 10,
                holidays: ['2020-05-05','2020-05-23','2020-05-25','2020-05-26'] ,
                scrollToToday: false,
                useCookie: true,
                onItemClick: function(data) {
                    // alert("Item clicked - show some details");
                },
                onAddClick: function(dt, rowId) {
                    // alert("Empty space clicked - add an item!");
                },
                onRender: function() {
                    if (window.console && typeof console.log === "function") {
                        console.log("chart rendered");
                    }
                }
            });

            $(".gantt").popover({
                selector: ".bar",
                title: function _getItemText() {
                    return this.textContent;
                },
                container: '.gantt',
                content: "Here's some useful information.",
                trigger: "hover",
                placement: "auto right"
            });

            // prettyPrint();

    });
    
    const datas = [{"line":"BESAKIH","orc":"G1-20E017D","style":"709672","buyer":"WOLF","etd":"2020-05-15","order_qty":"700","BAL_SEW":"55","SAM":"5.55","Hari":"0","label":"G1-20E017D, 709672, 700","LASTSEW":"2020-05-28 13:28:57","STARTNEW_ORC":"2020-05-28 13:28:57","ENDSEW":"2020-05-28 13:28:57"},
              {"line":"BESAKIH","orc":"G1-20E014D","style":"709672","buyer":"WOLF","etd":"2020-05-15","order_qty":"1080","BAL_SEW":"138","SAM":"5.55","Hari":"0","label":"G1-20E014D, 709672, 1080","LASTSEW":"2020-05-28 13:28:57","STARTNEW_ORC":"2020-05-28 13:28:57","ENDSEW":"2020-05-28 13:28:57"},
              {"line":"BESAKIH","orc":"G1-20E013D","style":"209672","buyer":"WOLF","etd":"2020-05-15","order_qty":"1680","BAL_SEW":"270","SAM":"26.56","Hari":"1","label":"G1-20E013D, 209672, 1680","LASTSEW":"2020-05-29 13:28:57","STARTNEW_ORC":"2020-05-29 13:28:57","ENDSEW":"2020-05-30 13:28:57"},
              {"line":"BESAKIH","orc":"G1-20E013D-1","style":"209672","buyer":"WOLF","etd":"2020-05-15","order_qty":"1680","BAL_SEW":"1680","SAM":"26.56","Hari":"4","label":"G1-20E013D-1, 209672, 1680","LASTSEW":"2020-06-01 13:28:57","STARTNEW_ORC":"2020-06-01 13:28:57","ENDSEW":"2020-06-05 13:28:57"},
              {"line":"BESAKIH","orc":"G1-20E010D-1","style":"709672","buyer":"WOLF","etd":"2020-05-15","order_qty":"9240","BAL_SEW":"9240","SAM":"5.55","Hari":"5","label":"G1-20E010D-1, 709672, 9240","LASTSEW":"2020-06-02 13:28:57","STARTNEW_ORC":"2020-06-02 13:28:57","ENDSEW":"2020-06-07 13:28:57"},
              {"line":"MALIOBORO","orc":"G1-20F039E-1","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"1830","BAL_SEW":"150","SAM":"8.54","Hari":"0","label":"G1-20F039E-1, 66564, 1830","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20H008G-1","style":"66564","buyer":"WOLF","etd":"2020-08-07","order_qty":"150","BAL_SEW":"150","SAM":"8.54","Hari":"0","label":"G1-20H008G-1, 66564, 150","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20D062D","style":"66564","buyer":"WOLF","etd":"2020-05-01","order_qty":"840","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20D062D, 66564, 840","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20I004H-2","style":"66564","buyer":"WOLF","etd":"2020-09-04","order_qty":"600","BAL_SEW":"600","SAM":"8.54","Hari":"0","label":"G1-20I004H-2, 66564, 600","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20F026E","style":"66564","buyer":"WOLF","etd":"2020-06-05","order_qty":"540","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20F026E, 66564, 540","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20D069D","style":"66564","buyer":"WOLF","etd":"2020-04-24","order_qty":"1728","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20D069D, 66564, 1728","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F047E","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"1755","BAL_SEW":"60","SAM":"8.54","Hari":"0","label":"G1-20F047E, 66564, 1755","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F020E","style":"66564","buyer":"WOLF","etd":"2020-06-05","order_qty":"2155","BAL_SEW":"90","SAM":"8.54","Hari":"0","label":"G1-20F020E, 66564, 2155","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20D057D","style":"66564","buyer":"WOLF","etd":"2020-05-01","order_qty":"790","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20D057D, 66564, 790","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20F025E","style":"66564","buyer":"WOLF","etd":"2020-06-05","order_qty":"20","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20F025E, 66564, 20","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20D068D","style":"66564","buyer":"WOLF","etd":"2020-04-24","order_qty":"1296","BAL_SEW":"0","SAM":"8.54","Hari":"0","label":"G1-20D068D, 66564, 1296","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G004F","style":"66564","buyer":"WOLF","etd":"2020-07-10","order_qty":"1860","BAL_SEW":"150","SAM":"8.54","Hari":"0","label":"G1-20G004F, 66564, 1860","LASTSEW":"2020-05-28 13:32:01","STARTNEW_ORC":"2020-05-28 13:32:01","ENDSEW":"2020-05-28 13:32:01"},{"line":"MALIOBORO","orc":"G1-20H003G","style":"66564","buyer":"WOLF","etd":"2020-08-07","order_qty":"1500","BAL_SEW":"1500","SAM":"8.54","Hari":"1","label":"G1-20H003G, 66564, 1500","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G005F-2","style":"66564","buyer":"WOLF","etd":"2020-07-10","order_qty":"1080","BAL_SEW":"1080","SAM":"8.54","Hari":"1","label":"G1-20G005F-2, 66564, 1080","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F041E-1","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"1500","BAL_SEW":"1200","SAM":"8.54","Hari":"1","label":"G1-20F041E-1, 66564, 1500","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F048E","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"1755","BAL_SEW":"1755","SAM":"8.54","Hari":"1","label":"G1-20F048E, 66564, 1755","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20H011G-1","style":"40PAF53","buyer":"WOLF","etd":"2020-08-07","order_qty":"1500","BAL_SEW":"1500","SAM":"8.00","Hari":"1","label":"G1-20H011G-1, 40PAF53, 1500","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G035G","style":"40PAE70","buyer":"WOLF","etd":"2020-07-30","order_qty":"1710","BAL_SEW":"1710","SAM":"9.18","Hari":"1","label":"G1-20G035G, 40PAE70, 1710","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G005F-1","style":"66564","buyer":"WOLF","etd":"2020-07-10","order_qty":"1950","BAL_SEW":"1200","SAM":"8.54","Hari":"1","label":"G1-20G005F-1, 66564, 1950","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20H004G","style":"66564","buyer":"WOLF","etd":"2020-08-07","order_qty":"1500","BAL_SEW":"1500","SAM":"8.54","Hari":"1","label":"G1-20H004G, 66564, 1500","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G006F","style":"66564","buyer":"WOLF","etd":"2020-07-10","order_qty":"1380","BAL_SEW":"1380","SAM":"8.54","Hari":"1","label":"G1-20G006F, 66564, 1380","LASTSEW":"2020-05-29 13:32:01","STARTNEW_ORC":"2020-05-29 13:32:01","ENDSEW":"2020-05-30 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F019E-1","style":"66564","buyer":"WOLF","etd":"2020-06-05","order_qty":"2155","BAL_SEW":"2155","SAM":"8.54","Hari":"2","label":"G1-20F019E-1, 66564, 2155","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G010G","style":"40PAF53","buyer":"WOLF","etd":"2020-07-17","order_qty":"3150","BAL_SEW":"3150","SAM":"8.00","Hari":"2","label":"G1-20G010G, 40PAF53, 3150","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F020E-1","style":"66564","buyer":"WOLF","etd":"2020-06-05","order_qty":"2155","BAL_SEW":"2155","SAM":"8.54","Hari":"2","label":"G1-20F020E-1, 66564, 2155","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F067F-1","style":"40PAF53","buyer":"WOLF","etd":"2020-06-19","order_qty":"3150","BAL_SEW":"3150","SAM":"8.00","Hari":"2","label":"G1-20F067F-1, 40PAF53, 3150","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20I005H-2","style":"66564","buyer":"WOLF","etd":"2020-09-04","order_qty":"3000","BAL_SEW":"3000","SAM":"8.54","Hari":"2","label":"G1-20I005H-2, 66564, 3000","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F012E-1","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"2010","BAL_SEW":"2010","SAM":"8.54","Hari":"2","label":"G1-20F012E-1, 66564, 2010","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F066F-1","style":"40PAF53","buyer":"WOLF","etd":"2020-06-19","order_qty":"2790","BAL_SEW":"2790","SAM":"8.00","Hari":"2","label":"G1-20F066F-1, 40PAF53, 2790","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20I004H-1","style":"66564","buyer":"WOLF","etd":"2020-09-04","order_qty":"2010","BAL_SEW":"2010","SAM":"8.54","Hari":"2","label":"G1-20I004H-1, 66564, 2010","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20I005H-1","style":"66564","buyer":"WOLF","etd":"2020-09-04","order_qty":"2010","BAL_SEW":"2010","SAM":"8.54","Hari":"2","label":"G1-20I005H-1, 66564, 2010","LASTSEW":"2020-05-30 13:32:01","STARTNEW_ORC":"2020-05-30 13:32:01","ENDSEW":"2020-06-01 13:32:01"},{"line":"MALIOBORO","orc":"G1-20H008G-2","style":"66564","buyer":"WOLF","etd":"2020-08-07","order_qty":"3870","BAL_SEW":"3870","SAM":"8.54","Hari":"3","label":"G1-20H008G-2, 66564, 3870","LASTSEW":"2020-05-31 13:32:01","STARTNEW_ORC":"2020-05-31 13:32:01","ENDSEW":"2020-06-03 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G014G","style":"40PAF53","buyer":"WOLF","etd":"2020-07-17","order_qty":"5180","BAL_SEW":"5180","SAM":"8.00","Hari":"4","label":"G1-20G014G, 40PAF53, 5180","LASTSEW":"2020-06-01 13:32:01","STARTNEW_ORC":"2020-06-01 13:32:01","ENDSEW":"2020-06-05 13:32:01"},{"line":"MALIOBORO","orc":"G1-20F040E-1","style":"66564","buyer":"WOLF","etd":"2020-06-12","order_qty":"4590","BAL_SEW":"4590","SAM":"8.54","Hari":"4","label":"G1-20F040E-1, 66564, 4590","LASTSEW":"2020-06-01 13:32:01","STARTNEW_ORC":"2020-06-01 13:32:01","ENDSEW":"2020-06-05 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G011G","style":"40PAF53","buyer":"WOLF","etd":"2020-07-17","order_qty":"4950","BAL_SEW":"4950","SAM":"8.00","Hari":"4","label":"G1-20G011G, 40PAF53, 4950","LASTSEW":"2020-06-01 13:32:01","STARTNEW_ORC":"2020-06-01 13:32:01","ENDSEW":"2020-06-05 13:32:01"},{"line":"MALIOBORO","orc":"G1-20G032G","style":"40PAE70","buyer":"WOLF","etd":"2020-07-30","order_qty":"5760","BAL_SEW":"5760","SAM":"9.18","Hari":"5","label":"G1-20G032G, 40PAE70, 5760","LASTSEW":"2020-06-02 13:32:01","STARTNEW_ORC":"2020-06-02 13:32:01","ENDSEW":"2020-06-07 13:32:01"},
              {"line":"MALIOBORO","orc":"G1-20E007D-1","style":"66564","buyer":"WOLF","etd":"2020-05-08","order_qty":"7200","BAL_SEW":"7200","SAM":"8.54","Hari":"6","label":"G1-20E007D-1, 66564, 7200","LASTSEW":"2020-06-03 13:32:01","STARTNEW_ORC":"2020-06-03 13:32:01","ENDSEW":"2020-06-09 13:32:01"}
             ];

var list = datas, result = [];

const items = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]; 

function random_item(items){
  return items[Math.floor(Math.random()*items.length)];     
}

list.forEach(function (hash) {
    return function (a) {
        if (!hash[a.line]) {
            hash[a.line] = { line: a.line, values: []};
            result.push(hash[a.line]);
        }
        hash[a.line].values.push({ type: a.orc, amount: a.order_qty , customClass: random_item(items)});
    };
}(Object.create(null)));

console.log(result);

</script>

</body>
</html>
