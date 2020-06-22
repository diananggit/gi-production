
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
            <button type="button" id="linkWeekly" class="btn btn-warning"><i class="fa fa-table"><a href="<?php echo site_url('summaryproduction') ?>"></i>SUMMARY</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content text-center">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-danger">
              <div class="card-header text-center">
                <a href="<?php echo site_url('ReportBarChartCutting'); ?>" class="card-title">Cutting Department</a>
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
                <a href="<?php echo site_url('ReportBarChartMolding' ); ?>" class="card-title">Molding Department</a>
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
              <a href="<?php echo site_url('ReportBarChartSewing'); ?>" class="card-title">Sewing Department</a>
            </div>
            <div class="card-body">
              <div class="media">
                  <div class="media-left">
                  <h5 id="resultSewing" style="color: #1f2d3d; font-family: Times New Roman"></h5>
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
              <a href="<?php echo site_url('ReportBarChartPacking'); ?>" class="card-title">Packing Department</a>
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
  $(document).ready(function() {
    var day = new Date();
    var hr = day.getDay();
    var tgl;
    var tgl1;
    console.log('hr: ', hr);
    
    showCuttingDepartment();
    
    function showCuttingDepartment(){
      var thn = day.getFullYear();
      var bln = day.getMonth() + 1;
      if(hr == 1){
        var hari = day.getDate()-2;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }else{
        var hari = day.getDate()-1;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }
      //  console.log('tgl1: ', tgl);
      console.log('hari',hari);
      var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
          (hari < 10 ? "0" + hari.toString() : hari.toString());

          console.log('tanggal: ', tanggal);

      return $.ajax({
        url: '<?php echo site_url('ReportDaily/ajax_get_cutting'); ?>/' + tanggal, 
        type: 'GET',
        dataType: 'json',
        
        success: function(rst){
          console.log('rst', rst)
          var output = parseInt(rst.qty);
          var efficiency = (rst.eff);
          $('#result1').text('Result   :  ' + output);
          $('#efficiency1').text('Efficiency  : ' + efficiency + " %");

        }
      });
    
    }

    showSewingDepartement();

    function showSewingDepartement(){
      var thn = day.getFullYear();
      var bln = day.getMonth() + 1;
      if(hr == 1){
        var hari = day.getDate()-2;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }else{
        var hari = day.getDate()-1;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }
      //  console.log('tgl1: ', tgl);
      console.log('hari',hari);

      var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
          (hari < 10 ? "0" + hari.toString() : hari.toString());

      console.log('tanggal: ', tanggal);
      return $.ajax({
        url:'<?php echo site_url('ReportDaily/ajax_get_sewing'); ?>/' + tanggal,
        dataType: 'json',
        success: function(rst){
          if(tanggal == 0){
            var output2 = parseInt(rst.qty_sewing);
          var efficiency2 = (rst.eff);
              if(output2 == null){
                document.write("data kosong");
              }else{  
                var output2 = parseInt(rst.qty_sewing);
          var efficiency2 = (rst.eff);
          if(output2 != null){
            $('#resultSewing').text('Result  :' + output2);
          $('#efficiency3').text('Efficiency  : ' + efficiency2 + " %");
          }
          
              }
            }

          // var output2 = parseInt(rst.qty_sewing);
          // var efficiency2 = (rst.eff);
          // $('#resultSewing').text('Result  :' + output2);
          // $('#efficiency3').text('Efficiency  : ' + efficiency2 + " %");

        },
          
      });
    }

    showPackingDepartment();

    function showPackingDepartment(){

      var thn = day.getFullYear();
      var bln = day.getMonth() + 1;
      if(hr == 1){
        var hari = day.getDate()-2;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }else{
        var hari = day.getDate()-1;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }
      // console.log('tgl1: ', tgl);
      console.log('',hari);
      var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
          (hari < 10 ? "0" + hari.toString() : hari.toString());

          console.log('tanggal: ', tanggal);

      return $.ajax({
        url: '<?php echo site_url('ReportDaily/ajax_get_packing'); ?>/' + tanggal,
        dataType: 'json',
        success: function(rst){
          // var tgl= (rst.tgl);
            // var output3 = (rst.qty);
            // var efficiency3= (rst.eff);
            // var output3 = $('#result4').val();
            // var efficiency3= $('#efficiency4').val();

            if(tanggal <= 0){
              var output3 = (rst.qty);
                var efficiency3= (rst.eff);
              if(output3 != null){
                document.write("data kosong");
              }else{  
                var output3 = (rst.qty);
                var efficiency3= (rst.eff);
              $('#result4').text('Result   : ' + output3);
              $('#efficiency4').text('Efficiency   : ' + efficiency3+ "%");
              }
            }
        },
      });
    }

    showMoldingDepartment();

    function showMoldingDepartment(){
      var thn = day.getFullYear();
      var bln = day.getMonth() + 1;
      if(hr == 1){
        var hari = day.getDate()-2;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }else{
        var hari = day.getDate()-1;
        if(hari <= 0){
          bln -= 1;
          tgl = new Date(thn, bln, 0);
          hari = tgl.getDate();
        }
      }
      //  console.log('tgl1: ', tgl);
      console.log('hari',hari);
      var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
          (hari < 10 ? "0" + hari.toString() : hari.toString());

          console.log('tanggal: ', tanggal);

      return $.ajax({
        url:'<?php echo site_url('ReportDaily/ajax_get_molding'); ?>/' + tanggal,
        dataType: 'json',
        success: function(rst){
          var output4 = parseInt(rst.qty_mold);
          var efficiency4 = (rst.eff);
          $('#result2').text('Result  :' + output4);
          $('#efficiency2').text('Efficiency  : ' + efficiency4 + " %");

        },
          
      });
    }
  });
</script>
</body>
</html>
