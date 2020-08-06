
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
        <h2 style="text-align: center; color: #dc3545"><b>Globalindo Intimates - Sewing Report</b></h2>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="barSewingLine" style="height:25%; width:30%" height:"25%" width:"30%"></canvas>
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

showReportSewingLine();
  
  function showReportSewingLine() {
    $.ajax({
      url: '<?php echo site_url('reportBarSewingLine/ajax_get_qty_sewing_line') ; ?>',
      type: 'GET',
      dataType: 'json',
      success: function(data){
        console.log(data);
        var chartReportSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
        var chartReportSewingLineLabels = [];
        var chartReportSewingLineValues = [];
        var chartReportSewingEff = [];
        $.each(data, function(i, item) {
           chartReportSewingLineLabels.push(item.line);
           chartReportSewingLineValues.push(parseInt(item.qty));
          //  chartReportSewingEff.push(parseInt(item.total_eff));
         });
         var chartReportSewingLineChart = {
          labels: chartReportSewingLineLabels,
          datasets: [{
            type: 'bar',
              label: "Quantity_output",
                data: chartReportSewingLineValues,
                fill: false,
                backgroundColor : [
                    "#FFB6C1", "#DC143C", "#F08080",
                    "#007bff", "#FF4500", "#FFD700",
                    "#FFEFD5", "#BDB76B", "#DDA0DD",
                    "#FF00FF", "#BA55D3","#9370DB",
                    "#9400D3","#8B008B","#4B0082"
                ],
                yAxisID: 'axisBarChart',
           
          }, {
              label: 'Efficiency',
              type:'line',
              // data: chartReportSewingEff,
              fill: false,
              yAxisID: 'axisBarLine',
          }]
            };

            window.onload = function() {
              var chartReportSewingLineCanvas = $("barSewingLine").getContext("2d");
              window.myBar = new Chart(chartReportSewingLineCanvas, {
                type:'bar',
                data:  chartReportSewingLineChart,
                options: {
                  responsive: true,
                tooltips: {
                  mode:'label'
                },
                elements: {
                  line: {
                    fill: false
                  }
                },
                scales: {
                  xAxes:[{
                    display: true,
                    gridLines: {
                      display: false
                    },
                    labels:{
                      show: true,
                    }
                  }],
                  yaxes: [{
                    type:"linear",
                    display: true,
                    position: "left",
                    id:"axisBarChart",
                    gridlines:{
                      display:false
                    },
                    labels:{
                      show:true,
                    }
                  }, {
                      type: "linear",
                      display: true,
                      position: "right",
                      id: "axisBarLine",
                      gridlines:{
                        display: false
                      },
                      labels: {
                        show:true,
                      }
                  }]
                }
                }
              });
            };
         }
    }); 
  };
    
</script>
</body>
</html>
