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
                                    <td>Size</td>
                                    <td>O 1</td>
                                    <td>O 2 </td>
                                    <td>O 3</td>
                                    <td>O 4</td>
                                    <td>O 5</td>
                                    <td>O 6</td>
                                    <td>O 7</td>
                                    <td>M 1</td>
                                    <td>M 2</td>
                                    <td>M 3</td>
                                    <td>M 4</td>
                                    <td>M 5</td>
                                    <td>M 6</td>
                                    <td>M 7</td>
                                    <td>L 1</td>
                                    <td>L 2</td>
                                    <td>L 3</td>
                                    <td>L 4</td>
                                    <td>L 5</td>
                                    <td>L 6</td>
                                    <td>L </td>
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
                                      <?php echo $ms->firsts_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->second_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->third_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->fourth_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->five_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->six_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->seven_outer ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->firsts_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->second_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->third_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->fourt_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->five_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->six_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->seven_midlinning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->firsts_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->second_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->third_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->fourt_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->five_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->six_linning ?>
                                  </td>
                                  <td>
                                      <?php echo $ms->seven_linning ?>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            
                            </tfoot>
                          </table>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-body">
                      <table id="Molding3" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <td>Total O1</td>
                                <td>Total O2</td>
                                <td>Total O3</td>
                                <td>Total O4</td>
                                <td>Total O5</td>
                                <td>Total O6</td>
                                <td>Total O7</td>
                                <td>Total M1</td>
                                <td>Total M2</td>
                                <td>Total M3</td>
                                <td>Total M4</td>
                                <td>Total M5</td>
                                <td>Total M6</td>
                                <td>Total M7</td>
                                <td>Total L1</td>
                                <td>Total L2</td>
                                <td>Total L3</td>
                                <td>Total L4</td>
                                <td>Total L5</td>
                                <td>Total L6</td>
                                <td>Total LL7</td>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="21" style="text-align:right">Total:</th>
                                </tr>
                            </tfoot>
                          </table>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-body">
                      <table id="Molding2" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Total</td>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:right">Total:</th>
                                </tr>
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

    var table2 = $('#Molding2').DataTable({
      lengthMenu: false,
      "searching": false ,
      "paging":   false,
      "ordering": false,
      "info":     false,
      "lengthChange": false,
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
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 1 ).footer() ).html(
                'total Molding :' + total
            );
          }
   
    });
    var table3 = $('#Molding3').DataTable({
        lengthMenu: false,
        "searching": false ,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "scrollX": true,
        "lengthChange": false,
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
               .column( 1 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );


           // Update footer
           $( api.column( 1 ).footer() ).html(
               'total Molding :' + total
           );
         }
  
   });


  showTotal();
  function showTotal(){
    $.ajax({
        url:"<?php echo site_url('report_molding/ReportMoldingShift2/getDataTotalShift2');?>",  
        method:"POST",  
        dataType: 'json',
        success:function(data)  
        {  
          table2.clear();
          $.each(data, function(i, item){
            table2.row.add([
            "Total Outer",
            item.qty_outer,
            ]).draw();
            table2.row.add([
            "Total Midmold",
            item.qty_midmold,
            ]).draw();
            table2.row.add([
            "Total Linning",
            item.qty_linning,
            ]).draw();

          });
                
        }  
    })
  }

  showTotalPeriode();
  function showTotalPeriode(){
    $.ajax({
        url:"<?php echo site_url('report_molding/ReportMoldingShift2/getTotalMoldingPeriode');?>",  
        method:"POST",  
        dataType: 'json',
        success:function(data)  
        {  
          table3.clear();
          $.each(data, function(i, item){
            table3.row.add([
            item.O1,
            item.O2,
            item.O3,
            item.O4,
            item.O5,
            item.O6,
            item.O7,
            item.M1,
            item.M2,
            item.M3,
            item.M4,
            item.M5,
            item.M6,
            item.M7,
            item.L1,
            item.L2,
            item.L3,
            item.L4,
            item.L5,
            item.L6,
            item.L7,
           
            ]).draw();

          });
                
        }  
    })
  }
});

  
   
  </script>
</body>

</html>