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
          <h2 style="text-align: center; color: #007bff"><b>Globalindo Intimates - Molding Report by Single ORC</b></h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label>Plese Select Orc Number</label>
            </br>
            <select class="form-control select2" id="orc" name="orc" style="width: 30%"></select>
          </div>
          <div class="card-body mt-1">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>QTY ORDER:</label>
                  <input type="text" id="qty_in" name="qty_in" class="form-control" disabled>
                </div>            
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>PLAN SHIP DAtE:</label>
                  <input type="text" id="plan" name="plan" class="form-control" disabled>
                </div>
              </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>DDD:</label>
                  <input type="text" id="ddd" name="ddd" class="form-control" disabled>
                </div>
                
              </div>
            </div>
            <hr />
            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Detail Status Qty</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableDepartment" class="table table-border table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cutting</th>
                          <th>Molding</th>
                          <th>Sewing</th>
                          <th>Packing</th>
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
                    <h3 class="card-title">Molding Detail Status</h3>
                  </div>
                  <div class="card-body">
                    <table id="tableOrcMolding" class="table table-border table-striped" width="100%">
                      <thead>
                        <tr>
                          <th>DAY</th>
                          <th>DATE</th>
                          <th>SIZE</th>
                          <th>MOLDING QTY (pcs)</th>
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
              <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Molding Balancing Chart</h3>
                </div>
                <div class="card-body">
                    <canvas id="barMoldingBalancing" ></canvas>
                </div>
              </div>
            </div>
          </div>
          


          <!-- Small boxes (Stat box) -->

          <!-- /.row (main row) -->
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
    $(document).ready(function() {
      $(".select2").select2();

      table = $('#tableOrcMolding').DataTable({
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
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                +pageTotal + '( ' +total +' Total)'
            );
        }
      });
      table2 = $("#tableDepartment").DataTable();

      load_orc();

      function load_orc() {
        $('#orc').empty();
        $.ajax({
          url: "<?php echo site_url('ReportMoldingSingleOrc/ajax_get_all_orc'); ?>",
          type: 'get',
          dataType: 'json',
          success: function(data) {
            $.each(data, function(i, item) {
              $('#orc').append($('<option>', {
                value: item.orc,
                text: item.orc
              }));
              // })).trigger('change');
            });
          }
        })
      }

       $('#orc').change(function() {
        orc = $(this).val()
        $.when(
          $.ajax({
            url: '<?php echo site_url("ReportMoldingSingleOrc/ajax_get_by_orc3"); ?>/' + orc,
            type: 'GET',
            dataType: 'json',
          }).done(function(data) {

              table2.clear();
              $.each(data, function(i, item) {
              table2.row.add([
                "Input",
                item.in_cutting,
                item.in_molding,
                item.in_sewing,
                "0",
              ]).draw();
              table2.row.add([
                "Output",
                item.in_sewing,
                item.qty_mold,
                item.qty_sewing_out,
                "0",
              ]).draw();
              table2.row.add([
                "Qty Balance",
                item.balance_order_ex,
                item.balance_mold,
                item.balance_order_sewing,
                "0",
              ]).draw();
              table2.row.add([
                "Wip",
                "0",
                item.wip_molding,
                item.wip_sewing,
                "0",
              ]).draw();
           
            })
 

          }),
        $.ajax({
          url: '<?php echo site_url("ReportMoldingSingleOrc/ajax_get_by_orc"); ?>/' + orc,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#style').val(data[0].style);
            $('#color').val(data[0].color);
            $('#qty_in').val(data[0].qty);
            $('#ddd').val(data[0].etd);
            $('#plan').val(data[0].plan_export);
            table.clear();

            $.each(data, function(i, item){
              table.row.add([
              item.day,
              item.tgl,
              item.size,
              item.qty_mold,
            ]).draw();
                                    
            })


          }

        }),
        $.ajax({
            url: '<?php echo site_url("ReportMoldingSingleOrc/ajax_get_by_orc2"); ?>/' + orc,
            type: 'GET',
            dataType: 'json',
          }).done(function(data){
            var chartMoldingBalancingCanvas = $('#barMoldingBalancing').get(0).getContext('2d');
            var chartMoldingBalancingIncomingOuterValues = [];
            var chartMoldingBalancingIncomingMidmoldValues = [];
            var chartMoldingBalancingIncomingLinningValues = [];
            var chartMoldingBalancingFinishOuterValues = [];
            var chartMoldingBalancingFinishMidmoldValues = [];
            var chartMoldingBalancingFinishLinningValues = [];
            var chartMoldingBalancingWipMoldOuterValues = [];
            var chartMoldingBalancingWipMoldMidmoldValues = [];
            var chartMoldingBalancingWipLinningValues = [];
            // chart.destroy();
            $.each(data, function(i, item){
              chartMoldingBalancingIncomingOuterValues.push(parseInt(item.in_outer));
              chartMoldingBalancingIncomingMidmoldValues.push(parseInt(item.in_mid));
              chartMoldingBalancingIncomingLinningValues.push(parseInt(item.in_lin));
              chartMoldingBalancingFinishOuterValues.push(parseInt(item.qty_outermold));
              chartMoldingBalancingFinishMidmoldValues.push(parseInt(item.qty_midmold));
              chartMoldingBalancingFinishLinningValues.push(parseInt(item.qty_linning));
              chartMoldingBalancingWipMoldOuterValues.push(parseInt(item.wip_outer));
              chartMoldingBalancingWipMoldMidmoldValues.push(parseInt(item.wip_midmold));
              chartMoldingBalancingWipLinningValues.push(parseInt(item.wip_linning));
            });
            // if(chartMoldingBalancingChart != undefined){
            //   chartMoldingBalancingChart.destroy();
            // }
            if(window.bar != undefined)
            window.bar.destroy();
           window.bar = new Chart(chartMoldingBalancingCanvas,{
              type:'bar',
              data: {
                labels: ["Incoming", "FinishMold", "WIPMold"],
                datasets: [
                 {
                  label: 'OuterMold',
                  data: [chartMoldingBalancingIncomingOuterValues,chartMoldingBalancingFinishOuterValues,chartMoldingBalancingWipMoldOuterValues],
                  backgroundColor: ["#00bfff","#00bfff","#00bfff"],
                },
                  {
                  label: 'MidMold',
                  data: [chartMoldingBalancingIncomingMidmoldValues,chartMoldingBalancingFinishMidmoldValues,chartMoldingBalancingWipMoldMidmoldValues],
                  backgroundColor: ["#ff8080","#ff8080","#ff8080"],
                  },
                  {
                    label: 'Linning',
                    data: [chartMoldingBalancingIncomingLinningValues,chartMoldingBalancingFinishLinningValues,chartMoldingBalancingWipLinningValues],
                    backgroundColor: ["#00ff00","#00ff00","#00ff00"],
                  },
                ]
              },
              option: {
                scsales: {
                  yAxes: [{
                    tickss: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          })  
        )
      

    });

    });

   

    // function showDataTable() {

    // }
    // });
    // var table;
    //    $('#orc').change(function(){
    //     table = $('#tableOrc').DataTable().destroy();
    //     $ajax({
    //       url:'',
    //       type: 'GET',
    //       dataType: 'json',
    //       success: function(){

    //       }
    //     });
    //    }); 
  </script>
</body>

</html>