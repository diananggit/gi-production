<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php $this->load->view('_partials/css.php'); ?>


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
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <h2 style="text-align: center; color: #007bff">Globalindo Intimates - Sewing Line Report</h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label><input type="text" id="line" style="text-align: center;" class="form-control" disabled></label>
          </div>
          <div class="card-body mt-1">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group ">
                  <label>Remaks:</label>
                  <input type="text" id="remaksLine" name="remaksLine" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group ">
                  <label>BUYER:</label>
                  <input type="text" id="buyer" name="buyer" class="form-control" disabled>
                </div>
                <div class="form-group ">
                  <label>QTY Order:</label>
                  <input type="text" id="order" name="order" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>DDD:</label>
                  <input type="text" id="ddd" name="ddd" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>PLAN SHIPMENT DATE:</label>
                  <input type="date" id="plan" name="plan" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>ORC:</label>
                  <input type="text" id="orc" name="orc" class="form-control" disabled>
                </div>
                <div class="form-group">
                <button type="button" id="linkRemak" data-toggle="modal" data-target="#form-show-remaks" class="btn btn-block btn-secondary btn-sm">
                      <i class="fa fa-exclamation-triangle text-danger ">&nbsp;</i>Add Remaks</button>
                </div>
              </div>

            </div>
            <hr />
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Qty Detail Status</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableSewingDay" class="table table-border table-striped">
                      <thead>
                        <tr>
                        <tr>
                          <th>#</th>
                          <th>Cutting</th>
                          <th>Sewing</th>
                          <th>Packing</th>
                        </tr>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Sewing Detail Status</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableOrc" class="table table-border table-striped">
                      <thead>
                        <tr>
                          <th>DAY</th>
                          <th>DATE</th>
                          <th>LINE</th>
                          <th>ORC</th>
                          <th>SIZE</th>
                          <th>QTY</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="6" style="text-align:right">Total:</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Sewing Balancing</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="barSewingDayChart"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-tools">
                <button type="button" id="linkWeekChart" class="btn btn-danger"><i class="fa fa-bar-chart"></i>Daily</button>
                <button type="button" id="linkWeekly" class="btn btn-warning"><i class="fa fa-bar-chart"></i>Per Week</button>                
                <button type="button" id="linkMonthly" class="btn btn-success"><i class="fa fa-bar-chart"></i>Per Month</button>
            </div>
            </div>
            <!-- Small boxes (Stat box) -->

            <!-- star input Modal -->
            <div class="modal fade" role="dialog" id="form-show-remaks">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Add Remaks</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <form method="post" id="form-edit-remaks" name="form-edit-remaks">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                    <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-right">Tanggal:</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" id="tglInput" name="tglInput" style="text-align: center;" />
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-right">Line:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="lineInput" name="lineName" style="text-align: center;" class="form-control" disabled>
                                                <input type="hidden"  class="lineInput" name="lineName" style="text-align: center;" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-right">Remaks:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="remaksInput" name="remaksInput"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btnUpdate" name="btnUpdate" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Add</button>
                                <a href="#" class="btn btn-default btn-lg float-right close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i> Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!--end Input Modal--> 
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('_partials/footer.php'); ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?php $this->load->view('_partials/js.php'); ?>

  <script type="text/javascript">
    var table;
    var chartSewingChart;
    var line;

    $(document).ready(function() {
      var lineArr = localStorage.getItem('lineChart');
      console.log('lineArr: ', lineArr);
      var lineSplit = lineArr.split(",");
      line = lineSplit[0];

      table = $('#tableOrc').DataTable({
        order: false,
        paging: false,
        searching: false,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            $( api.column( 5 ).footer() ).html(
                'Total Sewing :' + total
            );
        }
      });
      table2 = $('#tableSewingDay').DataTable();

      showDataLineSewing();

      function showDataLineSewing() {
        // var line = $('#line').val();
        console.log(line);
        $.when(
          $.ajax({
            url: '<?php echo site_url("SewingByLine/ajax_get_by_line_day"); ?>',
            type: 'POST',
            data: {
              'line': line
            },
            dataType: 'json',
          }).done(function(data) {

              table2.clear();
              $.each(data, function(i, item) {
             
              table2.row.add([
                "Input",
                item.in_cutting,
                item.in_sewing,
                "0",
              ]).draw();
              table2.row.add([
                "Output",
                item.in_sewing,
                item.qty_sewing_out,
                item.actual_qt,
              ]).draw();
              table2.row.add([
                "Qty Balance",
                item.balance_order_ex,
                item.balance_order_sewing,
                "0",
              ]).draw();
              table2.row.add([
                "Wip",
                item.balance_cutting_ex,
                item.wip_sewing,
                "0",
              ]).draw();
           
            })

          }),

          $.ajax({
            url: '<?php echo site_url("SewingByLine/ajax_get_by_line"); ?>',
            type: 'POST',
            data: {
              'line': line
            },
            dataType: 'json',
          }).done(function(data) {
            console.log('data', data);

            $('#remaksLine').val(data[0].name_remarks);
            $('#buyer').val(data[0].buyer);
            $('#order').val(data[0].order);
            $('#style').val(data[0].style);
            $('#ddd').val(data[0].etd);
            $('#color').val(data[0].color);
            $('#plan').val(data[0].plan_export);
            $('#orc').val(data[0].orc);
            
            table.clear();
            $.each(data, function(i, item) {
              table.row.add([
                item.day,
                item.tgl_ass,
                item.line,
                item.orc,
                item.size,
                item.out_sewing,
              ]).draw();
             
            })

          }),
          $.ajax({
            url: '<?php echo site_url("SewingByLine/ajax_get_by_line_day"); ?>',
            type: 'POST',
            data: {
              'line': line
            },
            dataType: 'json',

          }).done(function(data) {
            var chartSewingLineCanvas = $('#barSewingDayChart').get(0).getContext('2d');
            var chartSewingLineCenterPanelValues = [];
            var chartSewingLineBackWingsValues = [];
            var chartSewingLineCupsValues = [];
            var chartSewingLineAssemblyValues = [];
            // var chartSewingLineEff = [];
            $.each(data, function(i, item) {
              chartSewingLineCenterPanelValues.push(parseInt(item.qt_cp));
              chartSewingLineBackWingsValues.push(parseInt(item.qt_bw));
              chartSewingLineCupsValues.push(parseInt(item.qt_cup));
              chartSewingLineAssemblyValues.push(parseInt(item.qt_ass));
            });
            if (chartSewingChart != undefined) {
                chartSewingChart.destroy();
            }
            new Chart(chartSewingLineCanvas, {
              type: 'bar',
              data: {
                labels: ["CenterPanel", "BackWings", "Cup", "Assembly"],

                datasets: [{
                    label: 'qty',
                    data: [chartSewingLineCenterPanelValues,chartSewingLineBackWingsValues,chartSewingLineBackWingsValues,chartSewingLineAssemblyValues],
                    backgroundColor: ["#99ccff", "#6699ff","#3366ff","#3333ff"],
                  }
                  
                ]
              },
              option: {
                scsales: {
                  yAxes: [{
                    tickss: {
                      beginAtZero: true,

                    },
                    min: 0
                  }]
                }
              }
            });
          })
        )
      }

      $('#btnUpdate').click(function() {

            var url;

          $.ajax({
            url: '<?php echo site_url("SewingByLine/ajax_update"); ?>' ,
            method: 'POST',
            dataType: 'json',
            data: $('#form-edit-remaks').serialize(),
          }).done(function(rst) {
            console.log('rst update: ', rst);
            if (rst > 0) {
              alert('data sudah tersimpan');
              $('#form-edit-remaks')[0].reset();
              $('#form-show-remaks').modal('hide');
            }
          })
            })

      $('#linkWeekChart').click(function(){
      localStorage.setItem('dayChart', line);
      console.log('lineI: ', line);
      window.open('<?php echo site_url("LineDayChart/ajax_get_by_line"); ?>/' + line, "_self");
      })

      $('#linkWeekly').click(function(){
        localStorage.setItem('weekChart', line);
        window.open('<?php echo site_url("LineDailyChart/ajax_get_by_line"); ?>/' + line, "_self");
      })

      $('#linkMonthly').click(function(){
        localStorage.setItem('monthChart', line);
        window.open('<?php echo site_url("LineMonthlyChart/ajax_get_by_line"); ?>/' + line, "_self");
      })

      $('linkRemak').click(function(){
        localStorage.setItem('remaks', line);
      })

      $('#line').val(line);
      $('.lineInput').val(line);


    })
  </script>
</body>

</html>