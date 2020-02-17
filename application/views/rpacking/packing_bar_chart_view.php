
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
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Packing Report</h2>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="barPacking" style="height:25%; width:30%" height:"25%" width:"30%"></canvas>
                </div>
            </div>
        </div>
        <div class="card-tools">
          <a href="<?php echo site_url('reportdaily'); ?>" class="btn btn-success" ><i class="fa fa-arrow-right"></i>BACK</a>
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

showReportPacking();
  
  function showReportPacking() {
    $.ajax({
      url: '<?php echo site_url('reportbarchartpacking/ajax_get_qty_packing') ; ?>',
      type: 'GET',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        var chartReportPackingCanvas = $('#barPacking').get(0).getContext('2d');
        var chartReportPackingLabels = [];
        var chartReportPackingValues = [];
        $.each(data, function(i, item) {
           chartReportPackingLabels.push(item.tgl);
           chartReportPackingValues.push(parseInt(item.qty));
         });
         var chartReportPackingChart = new Chart(chartReportPackingCanvas,{
            type: 'bar',
            data: {
              labels: chartReportPackingLabels,
              datasets: [{
                label: 'Quantity output',
                data: chartReportPackingValues,
                backgroundColor : [
                  "#007bff", "#007bff", "#007bff",
                  "#007bff", "#007bff", "#007bff",
                  "#007bff"
                ]
              }]
            },
            options: {
              title: { 
                display: true
              },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            },
         });
      }
    }); 
  }
    
</script>
</body>
</html>
