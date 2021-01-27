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
                          <h3 class="card-title" style="color: #007bff;"><b>Molding Shift 2</b></h3>
                         <div class="card-tools">
                            <a href="<?php echo site_url('report_molding/ReportMoldingPerShift'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
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
                                    <td>Shift</td>
                                    <td>Size</td>
                                    <td>Output Outer</td>
                                    <td>Output Midmold</td>
                                    <td>Output Linning</td>
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
      "lengthChange": false
   
    });

  showMoldingShiftDua();
  function showMoldingShiftDua(){
    $.ajax({
        url:"<?php echo site_url('report_molding/ReportMoldingShift2/getDataShiftDua');?>",  
        method:"POST",  
        dataType: 'json',
        success:function(data)  
        {  
          table.clear();
          $.each(data, function(i, item){
            table.row.add([
              item.tgl,
              item.no_mesin,
              item.style,
              item.orc,
              item.color,
              item.shift,
              item.size,
              item.qty_outer,
              item.qty_midmold,
              item.qty_linning,
            ]).draw();
          });
                
        }  
    })
  }
});

  
   
  </script>
</body>

</html>