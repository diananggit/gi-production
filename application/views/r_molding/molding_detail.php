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
    <div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title" style="color: #007bff;"><b>Detail Molding Shift 1</b></h3>
                      </div>
                      <div class="card-body">
                          <table id="Molding1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>Machine</td>
                                    <td>Style</td>
                                    <td>Orc</td>
                                    <td>Color</td>
                                    <td>Size</td>
                                    <td>No Bundle</td>
                                    <td>Output Outer</td>
                                    <td>Output Midmold</td>
                                    <td>Output Linning</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($moldshift as $ms): ?>
                                <tr>
                                  <td>
                                    <?php echo $ms->tgl ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->no_mesin ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->style ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->orc ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->color ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->size ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->no_bundle ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->qty_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->mid_lining ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->qty_linning ?>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            
                            </tfoot>
                          </table>
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

</div>

  <!-- jQuery -->
  <?php $this->load->view('_partials/js.php'); ?>

  <script type="text/javascript">
  $(document).ready(function(){
    var table = $('#Molding1').DataTable({
      dom: 'Blfrtip',
      lengthMenu: [[100,200,300,400], [100,200,300,400]],
      buttons: [
        'excel','print'
      ],
      "lengthChange": false,
   
    });
  
});

  
   
  </script>
</body>

</html>