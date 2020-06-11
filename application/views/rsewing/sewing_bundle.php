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
              <!-- <h1 class="m-0 text-dark" style="text-align: center;"></h1> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Globalindo Intimates - Bundle Report</h3>
                         
                      </div>
                      <div class="card-body">
                          <table id="wipTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>Line</td>
                                    <td>ORC Number</td>
                                    <!-- <td>Style</td> -->
                                    <!-- <td>Color</td> -->
                                    <td>No Bundle</td>
                                    <!-- <td>Size</td> -->
                                    <td>Qty Pcs</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($sewingbundle as $sb): ?>
                                <tr>
                                <td>
                                    <?php echo date('d-m-Y', strtotime($sb->tgl)) ?>
                                </td>
                                <td>
                                    <?php echo $sb->line ?>
                                </td>
                                <td>
                                    <?php echo $sb->orc ?>
                                </td>
                                <td>
                                    <?php echo $sb->no_bundle ?>
                                </td>
                                <td>
                                    <?php echo $sb->qty ?>
                                </td>
                              
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th colspan="5" style="text-align:right">Total:</th>
                                    <!-- <th></th> -->
                                </tr>
                            </tfoot>
                          </table>
                      </div>
                  </div>
                  <!-- <div class="card-tools">
                    <a href="<?php echo site_url('ReportSewingBySingleOrc'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                  </div> -->
              </div>
          </div>
            <!-- </div> -->
          </div>
          <!-- <div class="card-tools">
          <a href="#" type="button" id="singleOrc" class="btn btn-primary" class="fa fa-upload"><i ></i> OK</a>
        </div> -->

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
  $(document).ready(function(){
    var table = $('#wipTable').DataTable({
    
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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                'Total WIP Sewing :' + total
            );
        }
   
    });
  });
   
  </script>
</body>

</html>