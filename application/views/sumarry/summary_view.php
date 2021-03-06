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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Globalindo Intimates - Summary Report</b></h3>
                <h3 id="dateSummary" class="text-primary"></h3>
              </div>
              <div class="card-body">
                <table id="sumaryTable" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                      <tr>
                          <td class='bg-warning'>LINE</td>
                          <td class='bg-warning'>ORC</td>
                          <td class='bg-warning'>BUYER</td>
                          <td class='bg-warning'>PO</td>
                          <td class='bg-warning'>DDD</td>
                          <td class='bg-warning'>PLAN SHIP DATE</td>
                          <td class='bg-warning'>STYLE</td>
                          <td class='bg-warning'>COLOR</td>
                          <td class='bg-warning'>QTY ORDER</td>
                          <td class='bg-success'>CUT H-1</td>
                          <td class='bg-success'>CUM CUT QTY</td>
                          <td class='bg-success'>BAL TO CUT</td>
                          <td class='bg-success'>WIP CUT</td> 
                          <td class='bg-primary'>MOLD H-1</td>
                          <td class='bg-primary'>MOLD In</td>
                          <td class='bg-primary'>CUM MOLD QTY</td>
                          <td class='bg-primary'>WIP MOLDING</td>
                          <td class='bg-primary' >BAL TO MOLD</td>
                          <td class='bg-danger' >SEWING IN</td>
                          <td class='bg-danger'>SEWING H-1</td>
                          <td class='bg-danger'>CUM SEWN QTY</td>
                          <td class='bg-danger'>WIP SEWING</td>
                          <td class='bg-danger'>BAL TO SEW</td>
                          
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($summary as $sm): ?>
                      <tr>
                        <td>
                          <?php echo $sm->line ?>
                        </td>
                        <td>
                          <?php echo $sm->orc ?>
                        </td>
                        <td>
                          <?php echo $sm->buyer ?>
                        </td>
                        <td>
                          <?php echo $sm->so ?>
                        </td>
                        <td>
                          <?php echo $sm->etd ?>
                        </td>
                        <td>
                          <?php echo $sm->plan_export ?>
                        </td>
                        <td>
                          <?php echo $sm->style ?>
                        </td>
                        <td>
                          <?php echo $sm->color ?>
                        </td>
                        <td>
                          <?php echo $sm->order ?>
                        </td>
                        <td>
                          <?php echo $sm->cut_qty ?>
                        </td>
                        <td>
                          <?php echo $sm->in_cutting ?>
                        </td>
                        <td>
                          <?php echo $sm->balance_order_ex ?>
                        </td>
                        <td>
                          <?php echo $sm->balance_cutting_ex ?>
                        </td>
                        <td>
                          <?php echo $sm->mold_qty?>
                        </td>
                        <td>
                          <?php echo $sm->in_molding ?>
                        </td>
                        <td>
                          <?php echo $sm->out_molding ?>
                        </td>
                        <td>
                          <?php echo $sm->wip_mold?>
                        </td>
                        <td>
                          <?php echo $sm->balance_mold?>
                        </td>
                        <td>
                          <?php echo $sm->in_sewing ?>
                        </td>
                        <td>
                          <?php echo $sm->sew_qty ?>
                        </td>
                        <td>
                          <?php echo $sm->qty_sewing_out ?>
                        </td>
                        <td>
                          <?php echo $sm->wip_sewing ?>
                        </td>
                        <td>
                          <?php echo $sm->balance_order_sewing ?>
                        </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                      
                  </tfoot>
                </table>
              </div>
            </div>
              <div class="card-tools">
                <a href="<?php echo site_url('report_cutting/ReportDaily'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
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
  $(document).ready(function(){
    var table = $('#sumaryTable').DataTable({
        // "scrollY":200,
        "scrollX": true,
        dom: 'Blfrtip',
      lengthMenu: [[10, 25, 50,100,200,300,400], [10, 25, 50,100,200,300,400]],
      buttons: [
        'excel','csv'
      ],

      // order: [[0, 'asc']],
      //   rowGroup: {
      //       startRender: null,
      //       endRender: function ( rows, group ) {
      //         var cut = rows
      //               .data()
      //               .pluck(9)
      //               .reduce( function (a, b) {
      //                   return a + b;
      //               }, 0) / rows.count();
 
      //           var ageAvg = rows
      //               .data()
      //               .pluck(10)
      //               .reduce( function (a, b) {
      //                   return a + b*1;
      //               }, 0) / rows.count();
 
      //           return $('<tr/>')
      //               .append( '<td colspan="10">'+group+'</td>' )
      //               .append( '<td>'+ageAvg.toFixed(0)+'</td>' )
      //               // .append( '<td/>' )
      //               .append( '<td>'+cut+'</td>' )
      //               .append( '<td/>' )
      //               .append( '<td/>' )
      //               .append( '<td/>' )
      //               .append( '<td/>' )
      //       },
      //       // dataSrc: 0
      //   }

    });
  });
   
  </script>
</body>

</html>