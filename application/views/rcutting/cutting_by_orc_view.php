
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php $this->load->view('_partials/css'); ?>
  <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/datatables.net-buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

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
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Cutting Report by ORC</h2>
        <div class="form-group">
          <label>Plese Select Production Range</label>

          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <div class="col-md-3">
              <input type="text" name="from_date" id="from_date" class="datepicker form-control" placeholder="From Date">
            </div>
            <div class="col-md-3">
              <input type="text" name="to_date" id="to_date" class="datepicker form-control" placeholder="To Date">
            </div>
            <div class="col-md-4">
              <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
            </div>
          </div>
          </br>
          <div class="card" id="orcTableList" style="display: none;">
          <table id="tableOrc" class="table table-bordered table-striped" cellspacing="0" width="70%">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>ORC</th>
                <th>Style</th>
                <th>Color</th>
                <th>Qty_Cut</th>
                <th>SAM</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($cuttingorc as $orc): ?>
                <tr>
                <td>
                  <?php echo date('d-m-Y', strtotime($orc->tgl)) ?>
                  </td>
                  <td>
                    <?php echo $orc->orc ?>
                  </td>
                  <td>
                    <?php echo $orc->style ?>
                  </td>
                  <td>
                    <?php echo $orc->color ?>
                  </td>
                  <td>
                    <?php echo $orc->qty_cutting ?>
                  </td>
                  <td>
                    <?php echo $orc->cutting_sam ?>
                  </td>
                 
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
              <th colspan="6" style="text-align:right">Total:</th>
              </tr>
            </tfoot>
          </table>
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
  //date range
  var table;
  $(document).ready(function(){  
    table = $('#tableOrc').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy','csv','excel','pdf','print'
      ],
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
                +pageTotal + '( ' +total +' Total)'
            );

            // $( api.column( 2 ).footer() ).html(
            //     'Total Balance:' + total2
            // );
        }
    });
    

  $('.datepicker').datepicker({
   format: 'yyyy-mm-dd',
  
   
  });
  });
 
  $('#filter').click(function(){
    $('#orcTableList').css('display','');
    // e.preventDefault();

    var from_date = $('#from_date').val();  
    var to_date = $('#to_date').val();  

    var tgl1= new Date($('#from_date').val());
    var tgl2= new Date($('#to_date').val());

    var dataStr = {'from_date' : from_date, 'to_date' : to_date};

    if(from_date != '' && to_date != '')  
    {
      if(tgl1 > tgl2){
        alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
      }else{
        $.ajax({  
              url:"<?php echo site_url('reportcuttingbyorc/filter');?>",  
              method:"POST",  
              // data:{from_date:from_date, to_date:to_date},  
              data: {'dataStr': dataStr},
              dataType: 'json',
              success:function(data)  
              {  
                // console.log('data: ', data);
                table.clear();

                // var output = [];
                // for (var 1=0; i<data.lenght; i++) {
                //   output.push('<option value="' + data[i].orc +  data[i].qty_order) + data[i].qty_cutting +'">' + '</option>');
                // }
                $.each(data, function(i, item){
                  table.row.add([
                    item.tgl,
                    item.orc,
                    item.style,
                    item.color,
                    item.qty_cutting,
                    item.cutting_sam,
                  ]).draw();
                });
                    // $('#tableStyle').DataTable().destroy();
                    // $('#tableStyle').html(data);  
              }  
          });  
      }
    }
    else
  {
          alert("Please Select Date");  
  }
    // }  
  });
    
</script>
</body>
</html>
