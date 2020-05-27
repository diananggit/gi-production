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
                <span>Keterangan:</span>
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
  $(function() {
            "use strict";

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

            // shifts dates closer to Date.now()
            var offset = new Date().setHours(0, 0, 0, 0) -
                new Date(demoSource[0].values[0].from).setDate(35);
            for (var i = 0, len = demoSource.length, value; i < len; i++) {
                value = demoSource[i].values[0];
                value.from += offset;
                value.to += offset;
            }

            $(".gantt").gantt({
                source: demoSource1,
                navigate: "scroll",
                scale: "days",
                maxScale: "months",
                minScale: "hours",
                itemsPerPage: 10,
                holidays: ['2020-05-05','2020-05-23','2020-05-25','2020-05-26'] ,
                scrollToToday: false,
                useCookie: true,
                onItemClick: function(data) {
                    alert("Item clicked - show some details");
                },
                onAddClick: function(dt, rowId) {
                    alert("Empty space clicked - add an item!");
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
    
</script>

</body>
</html>
