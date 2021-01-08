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
        </div>
        <h4 style="text-align: center; color:grey" >
          <b>Globalindo Intimates - Dowtime Report 
            <span id="dailyDate" style="color:red;"></span>
          </b>
        </h4>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <div class="col-md-2">
            <select class="form-control select2" id="month" name="month" style="width: 80%"></select>
            </div>
            <!-- <div class="col-md-2">
								<input type="text" name="from_date" id="from_date" class="datepicker form-control" placeholder="From Date">
							</div>
							<div class="col-md-2">
								<input type="text" name="to_date" id="to_date" class="datepicker form-control" placeholder="To Date">
							</div>

							<div class="col-md-2">
								<input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
							</div> -->

          </div>
        </br>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body" >
              <canvas id="barDowntimeShimton"></canvas>
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

  $(".select2").select2();

  load_shimton();

  function  load_shimton(){
        $('#month').empty();
        $.ajax({
            url: "<?php echo site_url('downtime_mechanic/ReportDowntimeSymton/get_sympton'); ?>",
            type: 'get',
            dataType: 'json',
        }).done(function(data) {
        $.each(data, function(i, item) {
            $('#month').append($('<option>', {
                value: item.month,
                text: item.month
            }));
        });
        });
    }
      $('#month').change(function() {
        month = $(this).val()
      $.ajax({
        url: '<?php echo site_url('downtime_mechanic/ReportDowntimeSymton/get_data_machine_sympton'); ?>/' + month,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          var chartDowntimeCanvas = $('#barDowntimeShimton').get(0).getContext('2d');
          var chartReportDowntimeLabels = [];
          var chartDowntimeValues = [];

          $.each(data, function(i, item) {

            chartDowntimeValues.push(parseInt(item.tot_machine));
            chartReportDowntimeLabels.push(item.sympton);
          });
         

          var arrColor = [];
          for (x = 0; x <= chartDowntimeValues.length; x++) {
            arrColor.push(
              randomColor()
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
                  label: 'Machine Downtime',
                  data: chartDowntimeValues,
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
                xAxes: [{
                    display: false,
                    barPercentage: 1.3,
                    ticks: {
                        max: 3,
                    }
                }, {
                    display: true,
                    ticks: {
                        autoSkip: false,
                        max: 4,
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
        }

      });

      function randomColor() {
        return "hsl(" + 360 * Math.random() + ',' +
          (10 + 85 * Math.random()) + '%,' +
          (65 + 10 * Math.random()) + '%)'
      }
    });
  </script>
</body>

</html>