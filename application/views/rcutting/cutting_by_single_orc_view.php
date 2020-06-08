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
  <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">

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
        <div class="container-fluid">
          <h2 style="text-align: center; color: #ffc107">Globalindo Intimates - Cutting Report by Single ORC</h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label>Plese Select Orc Number</label>
            </br>
            <select class="form-control select2" id="orc" name="orc" style="width: 30%"></select>
          </div>
          <div class="card-body mt-1">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>BUYER:</label>
                  <input type="text" id="buyer" name="buyer" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>QTY ORDER:</label>
                  <input type="text" id="qty_order" name="qty_order" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>DDD:</label>
                  <input type="date" id="etd" name="etd" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>PLAN SHIPMENT DATE:</label>
                  <input type="date" id="exdate" name="exdate" class="form-control" disabled>
                </div>
              </div>

            </div>
            <hr />
            <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Detail Status Qty</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableDepartment" class="table table-border table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cutting</th>
                          <th>Sewing</th>
                          <th>Packing</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4" style="text-align:right">Total:</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-warning" >
                  <div class="card-header">
                    <h3 class="card-title">Cutting Detail Status</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableOrc" class="table table-border table-striped" width="100%">
                      <thead>
                        <tr>
                          <th>DAY</th>
                          <th>DATE</th>
                          <th>SIZE</TH>
                          <th>CUTTING QTY</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4" style="text-align:right">Total:</th>
                            <!-- <th></th> -->
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-warning" >
                  <div class="card-header">
                    <h3 class="card-title">Sewing Balacing</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="barBalancingSewing"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
  <script type="text/javascript">
    var table;
    // $(document).ready(function() {
      $(".select2").select2();

      table = $('#tableOrc').DataTable({
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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            // pageTotal = api
            //     .column( 2, { page: 'current'} )
            //     .data()
            //     .reduce( function (a, b) {
            //         return intVal(a) + intVal(b);
            //     }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                'Total Cutting :' + total
            );
        }
      });
      table2 = $("#tableDepartment").DataTable();

      load_orc();
   
      function load_orc() {
        $('#orc').empty();
        $.ajax({
          url: "<?php echo site_url('ReportCuttingSingleOrc/ajax_get_all_orc'); ?>",
          type: 'get',
          dataType: 'json',
          }).done(function(data){
              console.log('data: ', data);
            
            $.each(data, function(i, item) {
              $('#orc').append($('<option>', {
                value: item.orc,
                text: item.orc
              }));
            });
          });
        }

       $('#orc').change(function() {
        orc = $(this).val()
        $.when(

          $.ajax({
            url: '<?php echo site_url("ReportCuttingSingleOrc/ajax_get_by_orc3"); ?>/' + orc,
            type: 'GET',
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
                "Balance",
                item.balance_order_ex,
                item.balance_order_sewing,
                "0",
              ]).draw();
              table2.row.add([
                "Wip",
                item.actual_qt,
                item.wip_sewing,
                "0",
              ]).draw();
            })
          }),
        $.ajax({
          url: '<?php echo site_url("ReportCuttingSingleOrc/ajax_get_by_orc"); ?>/' + orc,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#buyer').val(data[0].buyer);
            $('#style').val(data[0].style);
            $('#color').val(data[0].color);
            $('#qty_order').val(data[0].qty_order);
            $('#etd').val(data[0].etd);
            $('#exdate').val(data[0].plan_export);
            table.clear();
            $.each(data, function(i, item){
              console.log('item.day', item.day);
              table.row.add([
              item.day,
              item.cut_date,
              item.size,
              item.cut_qty
            ]).draw();
            })
          }
        })
        )
        $.ajax({
          url: '<?php echo site_url("ReportCuttingSingleOrc/ajax_get_by_orc2"); ?>/' + orc,
          type: 'GET',
          dataType: 'json',
        }).done(function(data) {
          var chartSewingLineCanvas = $('#barBalancingSewing').get(0).getContext('2d');
          var chartSewingLineCenterPanelValues = [];
          var chartSewingLineBackWingsValues = [];
          var chartSewingLineCupValues = [];
          var chartSewingLineAssemblyValues = [];
          $.each(data, function(i, item) {
            chartSewingLineCenterPanelValues.push(parseInt(item.qt_cp));
            chartSewingLineBackWingsValues.push(parseInt(item.qt_bw));
            chartSewingLineCupValues.push(parseInt(item.qt_cu));
            chartSewingLineAssemblyValues.push(parseInt(item.qt_ass));
          });
          if (window.bar != undefined)
            window.bar.destroy();
          window.bar = new Chart(chartSewingLineCanvas, {
            type: 'bar',
            data: {
              // labels: ['Cp','Bw','Cu','As'],
              datasets: [{
                  label: 'Cp',
                  data: chartSewingLineCenterPanelValues,
                  backgroundColor: "#99ccff",
                },
                {
                  label: 'Bw',
                  data: chartSewingLineBackWingsValues,
                  backgroundColor: "#6699ff",
                },
                {
                  label: 'Cup',
                  data: chartSewingLineCupValues,
                  backgroundColor: "#3366ff",
                },
                {
                  label: 'Assembly',
                  data: chartSewingLineAssemblyValues,
                  backgroundColor: "#3333ff",
                },

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
      

    });

   
  </script>
</body>

</html>