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
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <!--modal pilihan-->
          
        </div>
        <h4 style="text-align: center; color:red" >
          <b>Globalindo Intimates - Dowtime Report Machine Type,
            <span id="dailyDate" style="color:red;"></span>
          </b>
        </h4>
        <div class="col-md-10">
          <div class="card">
            <div class="card-body" >
              <canvas id="barDowntime"></canvas>
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
    var tgl;
    var tgl1;
    console.log('hr: ', hr);

    showReportSewingLine();

    function showReportSewingLine() {
      var thn = day.getFullYear();
      var bln = day.getMonth() + 1;
      if(hr == 1){
        var hari = day.getDate()-3;
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

        const tglNow = tanggal;

        // assign value JS to html. Date now !!!
        document.getElementById('dailyDate').innerHTML = tanggal;
   
      $.ajax({
        url: '<?php echo site_url('ReportDowntimeMachinetype/get_data_machine_type'); ?>',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          var chartDowntimeCanvas = $('#barDowntime').get(0).getContext('2d');
          var chartReportDowntimeLabels = [];
          var chartDoentimeValues = [];
         

          $.each(data, function(i, item) {

            chartDoentimeValues.push(parseInt(item.tot_machine));
            chartReportDowntimeLabels.push(item.machine_type);
          });
         

          var arrColor = [];
          for (x = 0; x <= chartDoentimeValues.length; x++) {
            arrColor.push(
              randomColor()
            );
          }
          new Chart(chartDowntimeCanvas, {
            type: 'horizontalBar',
            data: {
              labels: chartReportDowntimeLabels,
              datasets: [{
                  borderColor: "#ff3333",
                  label: 'Downtime',
                  data: chartDoentimeValues,
                  backgroundColor : arrColor,
                  fill: false
                },               
              ]
            },

            options: {
              responsive: true,
              tooltips: {
                mode: 'label'
              },
              element: {
                line: {
                  fill: false
                }
              },
              scales: {
                yAxes: [{
                    tickss: {
                    beginAtZero: true,
                   
                  },
                  min:0

                }]

              },
              
            },

          });
        }

      });

      function randomColor() {
        return "hsl(" + 360 * Math.random() + ',' +
          (10 + 70 * Math.random()) + '%,' +
          (55 + 10 * Math.random()) + '%)'
      }
    }
  </script>
</body>

</html>