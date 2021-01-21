
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
          <h4 class="m-0 text-dark" >
              <b> GLOBALINDO INTIMATES,
              <span id="dailyDate" style="color:red;"></span>
              </b>
          </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" id="linkWeekly" class="btn btn-warning"><i class="fa fa-table"><a href="<?php echo site_url('report_summary/SummaryProduction') ?>"></i><b>&nbsp SUMMARY</b></button>
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
                <a href="<?php echo site_url('report_cutting/ReportBarChartCutting'); ?>" class="card-title"><b>Cutting Department</b></a>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-left">
                  <h5>
                    <span style="color:red; font-family: Times New Roman; font-size:25px">Result :</span>
                    <span id="result1" style="color: #1f2d3d; font-family: Times New Roman;font-size:25px"></span>
                  </h5>
                  <h5>
                    <span style="color:red; font-family: Times New Roman; font-size:25px">Efficiency :</span>
                    <span id="efficiency1" style="color: #1f2d3d; font-family: Times New Roman "></span> %
                  </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-warning">
              <div class="card-header">
                <a href="<?php echo site_url('report_molding/ReportBarChartMolding' ); ?>" class="card-title"><b>Molding Department</b></a>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-left">
                    <h5>
                      <span style="color:red; font-family: Times New Roman; font-size:25px">Result :</span>
                      <span id="result2" style="color: #1f2d3d; font-family: Times New Roman;font-size:25px"></span>
                    </h5>
                    <h5>
                      <span style="color:red; font-family: Times New Roman; font-size:25px">Efficiency :</span>
                      <span id="efficiency2" style="color: #1f2d3d; font-family: Times New Roman "></span> %
                    </h5>
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
              <a href="<?php echo site_url('report_sewing/ReportBarChartSewing'); ?>" class="card-title"><b>Sewing Department</b></a>
            </div>
            <div class="card-body">
              <div class="media">
              <div class="media-left">
                    <h5>
                      <span style="color:red; font-family: Times New Roman; font-size:25px">Result :</span>
                      <span id="resultSewing" style="color: #1f2d3d; font-family: Times New Roman;font-size:25px"></span>
                    </h5>
                    <h5>
                      <span style="color:red; font-family: Times New Roman; font-size:25px">Efficiency :</span>
                      <span id="efficiency3" style="color: #1f2d3d; font-family: Times New Roman "></span> %
                    </h5>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <a href="<?php echo site_url('report_packing/ReportBarChartPacking'); ?>" class="card-title"><b>Packing Department</b></a>
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
    
    showCuttingDepartment();
    
    function showCuttingDepartment(){
      const tanggal = [];
      const output = [];
      const efficiency = [];
      

      $.ajax({
        url: '<?php echo site_url('report_cutting/ReportDaily/ajax_get_cutting'); ?>' , 
        method: 'GET',
        async: false,
        dataType: 'json',
        
        success: function(rst){
          $.each(rst,function(index,val){
            tanggal.push(val.tgl);
            output.push(val.qty);
            efficiency.push(val.eff);
           
          });

        },error : function(req, err) {
                       console.log(err);
                    }
      });
      return [tanggal,output,efficiency];
    
    }
    //cal function get data from db
    var resultDataCutting = showCuttingDepartment();

    //mapping value 
    let tanggalCutting = resultDataCutting[0][0];
    let outputCutting = resultDataCutting[1];
    let efficiencyCutting = resultDataCutting[2];
   

    const outputCut = outputCutting;
    const eff = efficiencyCutting;
    const tanggalCut = tanggalCutting;

    // assign value JS to html. Date now !!!
    document.getElementById('result1').innerHTML = outputCut;
    document.getElementById('efficiency1').innerHTML = eff;
    document.getElementById('dailyDate').innerHTML = tanggalCut;

    showSewingDepartement();

    function showSewingDepartement(){
      const output = [];
      const efficiency = [];
      const tanggal = [];
     
       $.ajax({
        url:'<?php echo site_url('report_cutting/ReportDaily/ajax_get_sewing'); ?>',
        method : 'GET',
        async : false,
        dataType: 'json',

        success: function(rst){
          $.each(rst,function(index,val){
            output.push(val.qty_sewing);
            efficiency.push(val.eff);
          })
        },error : function(req, err) {
                       console.log(err);
                    }
          
      });
      return [output,efficiency];
    }
    var resultDataSewing = showSewingDepartement();

    //mapping value 
    let outputSewing = resultDataSewing[0];
    let efficiencySewing = resultDataSewing[1];

    const outputSew = outputSewing;
    const effSew = efficiencySewing;

    // assign value JS to html. Date now !!!
    document.getElementById('resultSewing').innerHTML = outputSew
    document.getElementById('efficiency3').innerHTML = effSew;

    showPackingDepartment();

    function showPackingDepartment(){
       $.ajax({
        url: '<?php echo site_url('report_cutting/ReportDaily/ajax_get_packing'); ?>' ,
        dataType: 'json',
        success: function(rst){
            var output3 = parseInt(rst.qty);
            var efficiency3 = (rst.eff);
            $('#result4').text('Result  :' + output3);
          $('#efficiency4').text('Efficiency  : ' + efficiency3 + " %");
        },
      });
    }

    showMoldingDepartment();

    function showMoldingDepartment(){
      const output = [];
      const efficiency = [];

      $.ajax({
        url:'<?php echo site_url('report_cutting/ReportDaily/ajax_get_molding'); ?>',
        method: 'GET',
        async: false,
        dataType: 'json',
        success: function(rst){
          $.each(rst,function(index,val){
            output.push(val.qty_mold);
            efficiency.push(val.eff);
          });
        },error : function(req,err){
          console.log(err);
        }
          
      });
      return [output,efficiency];
    }
    // cal function get data from db
    var resultDataMolding = showMoldingDepartment();

    // mapping value
    let outputMolding = resultDataMolding[0];
    let efficiencyMolding = resultDataMolding[1];

    const outputmold = outputMolding;
    const effMold = efficiencyMolding;

    document.getElementById('result2').innerHTML = outputmold;
    document.getElementById('efficiency2').innerHTML = effMold;
  });
</script>
</body>
</html>
