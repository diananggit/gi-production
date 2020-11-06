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
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <h2 style="text-align: center; color: grey"><b>Globalindo Intimates - Sewing Line Report</b></h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label><input type="text" id="month" style="text-align: center;" class="form-control" disabled></label>
          </div>
          <div class="card-body mt-1">
            
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="card card-srcondary">
                  <div class="card-header">
                    <h3 class="card-title">Downtime Machine Chart</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="barSewingDayChart"></canvas>
                  </div>
                </div>
              </div>
              <!-- <div class="card-tools">
                <button type="button" id="linkDowntimeChart" class="btn btn-danger"><i class="fa fa-bar-chart"></i>Downtime</button>
            </div> -->
            </div>
          </div><!-- /.container-fluid -->
      </section>
    </div>
    <?php $this->load->view('_partials/footer.php'); ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

  <!-- jQuery -->
  <?php $this->load->view('_partials/js.php'); ?>

  <script type="text/javascript">
    var table;
    var chartSewingChart;
    var month;

    $(document).ready(function() {
      var monthArr = localStorage.getItem('monthChart');
      console.log('monthArr: ', monthArr);
      var monthSplit = monthArr.split(",");
      month = monthSplit[0];

      showMechanicBreakdown();

      function showMechanicBreakdown() {

        $.ajax({
        url: '<?php echo site_url('downtime_mechanic/ReportDowntimeBreakdown/get_data_machine_breakdown'); ?>',
        type: 'POST',
            data: {
              'month': month
            },
            dataType: 'json',
        }).done(function(data) {
          // console.log(data);
          var chartDowntimeCanvas = $('#barDowntimeBreakdown').get(0).getContext('2d');
          var chartReportDowntimeLabels = [];
          var chartDowntimeValues = [];

          $.each(data, function(i, item) {
            var hms = item.respon_d;   
            var a = hms.split(':'); 
            console.log('hms', hms);
            var respon = (+a[0]) * 60 + (+a[1]);
            console.log('respon', respon);

            var times = item.repair_d;
            var b = times.split(':');
            var repair = (+b[0]) * 60 + (+b[1]);

            var total = respon + repair

            chartDowntimeValues.push(total);
            chartReportDowntimeLabels.push(item.line);
          });
         

          var arrColor = [];
          for (x = 0; x <= chartDowntimeValues.length; x++) {
            arrColor.push(
              randomColor2()
            );
          }

          if(window.bar != undefined)
            window.bar.destroy();
            window.bar = new Chart(chartDowntimeCanvas, {
            type: 'bar',
            data: {
              labels: chartReportDowntimeLabels,
              datasets: [{
                  borderColor: "#ff3333",
                  label: 'Downtime',
                  data: chartDowntimeValues,
                  backgroundColor :arrColor ,
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
                xAxes: [{
                ticks: {
                }
            }],
                yAxes: [{
                    ticks: {
                    min:0
                  },
                  

                }]

              },
              
            },

          });
        })
       
      }

      // $('#linkDowntimeChart').click(function(){
      //   localStorage.setItem('monthChart', month);
        // window.open('</?php echo site_url("LineDailyChart/ajax_get_by_line"); ?>/' + line, "_self");
      // })
      

      $('#month').val(month);


    })
  </script>
</body>

</html>