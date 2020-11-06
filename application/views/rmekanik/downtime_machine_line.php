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
            <select class="form-control is-warning select2" id="month" name="month" style="width: 80%"></select>
            </div>
          </div>
        </br>
        <div class="col-md-30">
          <div class="card">
            <div class="card-body" >
              <canvas id="barDowntimeLine"></canvas>
            </div>
            <div class="card-tools">
                <button type="button" id="linkMonthChart" class="btn btn-danger"><i class="fa fa-bar-chart"></i>Downtime</button>
              </div>
          </div>
        </div>
        <!-- <div class="col-md-30">
          <div class="card">
            <div class="card-body" >
              <canvas id="barDowntimeBreakdown"></canvas>
            </div>
            
          </div>
        </div> -->
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

  load_line();
  // showMachineLine();
  // showMachineBreakdown();

			function load_line(){
				$('#month').empty();
				$.ajax({
					url: "<?php echo site_url('downtime_mechanic/ReportDowntimeLine/get_line'); ?>",
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
       
      month = $(this).val();
      $.when(
      $.ajax({
          url: '<?php echo site_url('downtime_mechanic/ReportDowntimeLine/get_data_machine_line'); ?>/' + month,
          type: 'GET',
          dataType: 'json',
          }).done(function(data) {
            console.log(data);
            var chartDowntimeCanvas = $('#barDowntimeLine').get(0).getContext('2d');
            var chartReportDowntimeLabels = [];
            var chartDowntimeValues = [];

            $.each(data, function(i, item) {

              chartDowntimeValues.push(parseInt(item.tot_machine));
              chartReportDowntimeLabels.push(item.line);
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
                  ticks: {
                  }
              }],
                  yAxes: [{
                      ticks: {
                      min:0
                    }
                    

                  }]

                }
                
              }

            });
          }),

          // $.ajax({
          //   url: '<?php echo site_url('downtime_mechanic/ReportDowntimeLine/get_data_machine_breakdown'); ?>/' + month,
          //   type: 'GET',
          //   dataType: 'json',
          //   }).done(function(data) {
          //     // console.log(data);
          //     var chartDowntimeCanvas = $('#barDowntimeBreakdown').get(0).getContext('2d');
          //     var chartReportDowntimeLabels = [];
          //     var chartDowntimeValues = [];

          //     $.each(data, function(i, item) {
          //       var hms = item.respon_d;   
          //       var a = hms.split(':'); 
          //       console.log('hms', hms);
          //       var respon = (+a[0]) * 60 + (+a[1]);
          //       console.log('respon', respon);

          //       var times = item.repair_d;
          //       var b = times.split(':');
          //       var repair = (+b[0]) * 60 + (+b[1]);

          //       var total = respon + repair

          //       chartDowntimeValues.push(total);
          //       chartReportDowntimeLabels.push(item.line);
          //     });
            

          //     var arrColor = [];
          //     for (x = 0; x <= chartDowntimeValues.length; x++) {
          //       arrColor.push(
          //         randomColor2()
          //       );
          //     }

          //     if(window.bar != undefined)
          //       window.bar.destroy();
          //       window.bar = new Chart(chartDowntimeCanvas, {
          //       type: 'bar',
          //       data: {
          //         labels: chartReportDowntimeLabels,
          //         datasets: [{
          //             borderColor: "#ff3333",
          //             label: 'Downtime',
          //             data: chartDowntimeValues,
          //             backgroundColor :arrColor ,
          //             fill: false
          //           },               
          //         ]
          //       },

          //       options: {
          //         responsive: true,
          //         tooltips: {
          //           mode: 'label'
          //         },
          //         element: {
          //           line: {
          //             fill: false
          //           }
          //         },
          //         scales: {
          //           xAxes: [{
          //           ticks: {
          //           }
          //       }],
          //           yAxes: [{
          //               ticks: {
          //               min:0
          //             },
                      

          //           }]

          //         },
                  
          //       },

          //     });
          //   })

        )
      });


          function randomColor() {
          return "hsl(" + 360 * Math.random() + ',' +
            (10 + 70 * Math.random()) + '%,' +
            (55 + 10 * Math.random()) + '%)'
        }
        function randomColor2() {
          return "hsl(" + 360 * Math.random() + ',' +
            (10 + 70 * Math.random()) + '%,' +
            (55 + 10 * Math.random()) + '%)'
        }
  
      
        $('#linkMonthChart').click(function(){
          localStorage.setItem('monthChart', month);
          window.open('<?php echo site_url("downtime_mechanic/ReportDowntimeBreakdown"); ?>/' , "_self");
        })

        // $('#month').val(month);
    // });
  </script>
</body>

</html>