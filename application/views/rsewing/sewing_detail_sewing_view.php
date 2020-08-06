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
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <h2 style="text-align: center; color: #007bff"><b>Intimates - Sewing Report by Single ORC</b></h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label>Plese Select Orc Number</label>
            </br>
            <select class="form-control select2" id="orc" name="orc" style="width: 30%"></select>
          </div>
          <div class="card-body mt-1">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>ORDER QTY:</label>
                  <input type="text" id="order" name="order" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>CUTTING  QTY:</label>
                  <input type="text" id="total_cutting" name="total_cutting" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>BALANCE TO CUT:</label>
                  <input type="text" id="balance" name="balance" class="form-control" disabled>
                </div>
              </div>

            </div>
            <hr />
            <h2 style="text-align: center; color: #007bff">Sewing Bundle Detail Status</h2>
            <div class="card card-success" >
              <div class="card-header">
              </div>
              <div class="card-body">
                <table id="tableOrc" class="table table-border table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>BUNDLE #</th>
                      <th>QTY CUTTING</th>
                      <th>QTY SEWING</th>
                      <th>BALANCE</th>
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
    $(document).ready(function() {
      $(".select2").select2();

      table = $('#tableOrc').DataTable({
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
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                'Total Sewing :' + pageTotal
            );
        }
      });

      load_orc();

      function load_orc() {
        $('#orc').empty();
        $.ajax({
          url: "<?php echo site_url('ReportDetailSewing/ajax_get_all_orc'); ?>",
          type: 'get',
          dataType: 'json',
          success: function(data) {
            $.each(data, function(i, item) {
              $('#orc').append($('<option>', {
                value: item.orc,
                text: item.orc
              }));
            });
          }
        })
      }

       $('#orc').change(function() {
        orc = $(this).val()
        $.ajax({
          url: '<?php echo site_url("ReportDetailSewing/ajax_get_by_orc"); ?>/' + orc,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#order').val(data[0].order);
            $('#total_cutting').val(data[0].qty_cutting);
            $('#color').val(data[0].color);
            $('#style').val(data[0].style);
            $('#balance').val(data[0].balance_to_cut);
            table.clear();
            $.each(data, function(i, item){
              table.row.add([
              item.bundle_sew,
              item.qty_pcs,
              item.qty,
              item.balance,
            ]).draw();
                                    
            })

          }

        });

    });

    });

  </script>
</body>

</html>