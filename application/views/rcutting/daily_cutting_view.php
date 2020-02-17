
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
            <h1 class="m-0 text-dark" >GLOBALINDO INTIMATES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-danger">
              <div class="card-header">
                <a href="<?php echo site_url('reportbarchartcutting'); ?>" class="card-title">Cutting Department</a>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-left">
                  <h5 id="result1" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="efficiency1" style="color: #1f2d3d; font-family: Times New Roman "></h5>
                  <h5 id="wip1" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="send1" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-warning">
              <div class="card-header">
                <a href="<?php echo site_url('reportbarchartmolding' ); ?>" class="card-title">Molding Department</a>
              </div>
              <div class="card-body">
              <div class="media">
                  <div class="media-left">
                  <h5 id="result2" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="efficiency2" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="wip2" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="send2" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-4">
          <div class="card card-success">
            <div class="card-header">
              <a href="<?php echo site_url('reportbarchartsewing'); ?>" class="card-title">Sewing Department</a>
            </div>
            <div class="card-body">
            <div class="media">
                  <div class="media-left">
                  <h5 id="result3" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="efficiency3" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="wip3" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="send3" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <a href="<?php echo site_url('reportbarchartpacking'); ?>" class="card-title">Packing Department</a>
            </div>
            <div class="card-body">
            <div class="media">
                  <div class="media-left">
                  <h5 id="result4" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  <h5 id="efficiency4" style="color: #1f2d3d; font-family: Times New Roman"></h5>
                  </div>
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

var day = new Date();
var hr = day.getDay();
console.log('hr: ', hr)
showCuttingDepartment();

  
 function showCuttingDepartment(){
   var thn = day.getFullYear();
   var bln = day.getMonth() + 1;
   if(hr == 1){
     var hari = day.getDate()-2;

   }else{
    var hari = day.getDate()-1;
   }
   var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
      (hari < 10 ? "0" + hari.toString() : hari.toString());

      console.log('tanggal: ', tanggal);
   $.ajax({
     url: '<?php echo site_url('reportdaily/ajax_get_cutting'); ?>/' + tanggal, 
     type: 'GET',
     dataType: 'json'
   }).done(function(rst){
     console.log('rst', rst)
       var output = parseInt(rst.qty);
      //  var wipall = parseInt(rst.wip);
      //  var send = parseInt(rst.qty_sew);
       var efficiency = (rst.eff);
      //  if(hr == 1){
       
       $('#result1').text('Result   :  ' + output);
       $('#efficiency1').text('Efficiency  : ' + efficiency + " %");
      //  $('#wip1').text('WIP :  ' + wipall);
       $('#send1').text('Send To Sewing :  ' + send);
      //  }
   });
   showSewingDepartement();
 }

 function showSewingDepartement(){
  var thn = day.getFullYear();
   var bln = day.getMonth() + 1;
   if(hr == 1){
     var hari = day.getDate()-2;

   }else{
    var hari = day.getDate()-1;
   }
   var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
      (hari < 10 ? "0" + hari.toString() : hari.toString());

      console.log('tanggal: ', tanggal);

   $.ajax({
     url: '<?php echo site_url('reportdaily/ajax_get_sewing'); ?>/' + tanggal,
     dataType: 'json',
   }).done(function(rst){
    var output2=parseInt(rst.qty);
       var wip2=parseInt(rst.wip);
       var efficiency2 = (rst.eff);
       $('#result3').text('Result   : ' + output2);
       $('#wip3').text('WIP   : ' + wip2);
       $('#efficiency3').text('Efficiency  : ' + efficiency2 + " %");
      
   });
   showPackingDepartment();
 }

 function showPackingDepartment(){
   $.ajax({
     url: '<?php echo site_url('reportdaily/ajax_get_packing'); ?>',
     dataType: 'json',
    
   }).done(function(rst){
    var output3 = parseInt(rst.pcs);
       var sam3 = parseInt(rst.sam_result);
       // var efficiency3=((sam3 * output3)/60) / (14*72) *100;
       $('#result4').text('Result   : ' + output3);
       $('#efficiency4').text('Efficiency   : ' + efficiency3+ "%");
   });
showMoldingDepartment();
 }

function showMoldingDepartment(){
  var thn = day.getFullYear();
   var bln = day.getMonth() + 1;
   if(hr == 1){
     var hari = day.getDate()-2;

   }else{
    var hari = day.getDate()-1;
   }
   var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
      (hari < 10 ? "0" + hari.toString() : hari.toString());

      console.log('tanggal: ', tanggal);
  $.ajax({
    url:'<?php echo site_url('reportdaily/ajax_get_molding'); ?>/' + tanggal,
    dataType: 'json',
  }).done(function(rst){
      var output4 = parseInt(rst.total);
      var wip4 = parseInt(rst.wip);
      // var sam4 = parseInt(rst.sam);
      // var efficiency4 = ((sam4 * output4) / 60) / (21*46) *100;
      $('#result2').text('Result  :' + output4);
      $('#wip2').text('WIP  : ' + wip4);
      // $('#efficiency2').text('Efficiency  : ' + efficiency4.toFixed(2) + " %");
  });
}

</script>
</body>
</html>
