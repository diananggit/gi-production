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
              <!-- <div class="col-30"> -->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Globalindo Intimates - Summary Report</h3>
                          <h3 id="dateSummary" class="text-primary"></h3>
                         
                      </div>
                      <div class="card-body">
                          <table id="sumaryTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>LINE</td>
                                    <td>ORC</td>
                                    <td>BUYER</td>
                                    <td>PO</td>
                                    <td>DDD</td>
                                    <td>PLAN SHIP DATE</td>
                                    <td>STYLE</td>
                                    <td>COLOR</td>
                                    <td>ORDER</td>
                                    <td>CUT H-1</td>
                                    <td>CUM CUT QTY</td>
                                    <td>BAL TO CUT</td>
                                    <td>WIP CUT</td> 
                                    <td>MOLD H-1</td>
                                    <td>MOLD In</td>
                                    <td>CUM MOLD QTY</td>
                                    <td>WIP MOLDING</td>
                                    <td>BAL TO MOLD</td>
                                    <td>SEWING IN</td>
                                    <td>SEWING H-1</td>
                                    <td>CUM SEWN QTY</td>
                                    <td>WIP SEWING</td>
                                    <td>BAL TO SEW</td>
                                    <!-- <td>PACK H-1</td>
                                    <td>CUM PACKED QTY</td>
                                    <td>WIP PACKING</td>                                     -->
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
                                  <!-- <td>
                                    <?php echo $sm->pack_qty ?>
                                  </td>
                                  <td>
                                    <?php echo $sm->actual_qt ?>
                                  </td>
                                  <td>
                                    <?php echo $sm->wip_packing ?>
                                  </td> -->

                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                <th colspan="18" style="text-align:right">Total:</th>
                                     <th></th> -->
                                </tr> 
                            </tfoot>
                          </table>
                      </div>
                  </div>
                  <div class="card-tools">
                    <a href="<?php echo site_url('reportdaily'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                  </div>
              <!-- </div> -->
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
     var day = new Date();
    var hr = day.getDay();
    
  $(document).ready(function(){
    var table = $('#sumaryTable').DataTable({
        "scrollY":200,
        "scrollX": true,
        dom: 'Blfrtip',
      lengthMenu: [[10, 25, 50,100,200,300,400], [10, 25, 50,100,200,300,400]],
      buttons: [
        'excel','csv'
      ],
        
        
   
    });
  });
   
  </script>
</body>

</html>