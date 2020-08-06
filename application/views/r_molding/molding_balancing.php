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
          <h2 style="text-align: center; color: #007bff"><b>Globalindo Intimates - Molding Balancing</b></h2>
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
                  <input type="text" id="total_input" name="total_input" class="form-control" disabled>
                </div>            
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>DDD:</label>
                  <input type="text" id="etd" name="etd" class="form-control" disabled>
                </div>
              <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
              </div>

            </div>
            <hr/>
            <!-- <h2 style="color: #007bff">Molding </h2> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="height:50%; width:60%" >Balancing</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableOrcMolding" class="table table-border table-striped" width="100%">
                                <thead>
                                    <tr>
                                    <th>Incoming</th>
                                    <th>Finished Mold</th>
                                    <th>Wip Mold</th>
                                    <th>Wip Plant</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align:right">Total:</th>
                                    <th></th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-primary">
                        <div class="card-header">
                            <h3 class="card-title">Balancing</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartBalancing"></canvas>
                            </div>
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
                'Total Molding :' + pageTotal
            );
        }
      });

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
              })).trigger('change');
            });
          }
        })
      }

       $('#orc').change(function() {
        orc = $(this).val()
        $.ajax({
          url: '<?php echo site_url("ReportMoldingSingleOrc/ajax_get_by_orc"); ?>/' + orc,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#style').val(data[0].style);
            $('#color').val(data[0].color);
            $('#total_input').val(data[0].total_input);
            table.clear();


            $.each(data, function(i, item){
              table.row.add([
              item.day,
              item.tgl,
              item.total_input,
            ]).draw();
                                    
            })


          }

        });
      //  var table;
      //  $('#orc').change(function(){
      //   table = $('#tableOrc').DataTable() 
      
      //  }); 

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