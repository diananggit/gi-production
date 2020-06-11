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
              <!-- <h2 style="text-align: center; color: #dc3545">Globalindo Intimates - Sewing Report</h2> -->
            </div><!-- /.col -->
            <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> -->
              <!-- <button type="button" id="linkWeekly" class="btn btn-danger" style="color: white;"><i class="fa fa-table"><a href="<?php echo site_url('summaryproduction') ?>"></i>REMARK</button> -->
            <!-- </ol>
          </div> -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <!--modal pilihan-->
          
        </div>
        <h2 style="text-align: center; color: #dc3545">Globalindo Intimates - Sewing Report</h2>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body" >
              <canvas id="barSewingLine"></canvas>
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

    showReportSewingLine();

    function showReportSewingLine() {
   
      $.ajax({
        url: '<?php echo site_url('reportbarsewingline/ajax_get_qty_sewing_line'); ?>',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          var chartReportSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
          var chartReportSewingLineLabels = [];
          var chartReportSewingLineValues = [];
          var chartReportSewingEff = [];
          var arrChartDataEff = [];
          var arrChartDataVal = [];
          var arrChartLabel = [];

          $.each(data, function(i, item) {

            arrChartDataEff.push(JSON.parse(item.eff));
            arrChartDataVal.push(JSON.parse(item.qty));
            // arrChartLabel.push({'line': item.line});
            arrChartLabel.push(item.line);
          });
          var outputMax = Math.max.apply(null, arrChartDataVal);
          var effMax = Math.max.apply(null, arrChartDataEff);

          var arrColor = [];
          for (x = 0; x <= arrChartDataVal.length; x++) {
            arrColor.push(
              randomColor()
            );
          }
          new Chart(chartReportSewingLineCanvas, {
            type: 'bar',
            data: {
              labels: arrChartLabel,
              datasets: [{
                  type: 'line',
                  borderColor: "#ff3333",
                  label: 'Efficiency',
                  yAxisID: 'axisBarLine',
                  data: arrChartDataEff,
                  fill: false
                },
                {
                  label: 'Quantity_output',
                  yAxisID: 'axisBarChart',
                  data: arrChartDataVal,
                  backgroundColor: arrColor
                }
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
                    id: 'axisBarLine',
                    type: "linear",
                    position: "right",
                    ticks: {
                      beginAtZero: true,
                      max: parseInt(effMax) + 20,
                      callback: function(value) {
                        return value + "%";
                      }
                      // min: 0,
                    }
                  },
                  {
                    id: "axisBarChart",
                    type: "linear",
                    position: "left",
                    ticks: {
                      beginAtZero: true,
                      max: parseInt(outputMax) + 200,
                    },
                    gridLines: {
                      display: false
                    },
                    labels: {
                      show: true,
                    }
                  },

                ]
                //     xAxes: [{
                //     // Change here
                // 	barPercentage: 0.4
                // }]

              },
              onClick: function(event, array) {
                let element = this.getElementAtEvent(event);
                console.log('element: ', element);
                // $('#modal_change_remaks').modal('show');

                // $('#modal_change_remaks').on('shown.bs.modal', function(){

                // $('#sixdays').click(function(event, array) {
                  // let element = this.gentElementAtEvent(event);
                  if (element.length > 0) {
                    var series = element[0]._model.datasetLabel;
                    var label = element[0]._model.label;
                    var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];

                    var line = [label, value];

                    localStorage.setItem('lineChart', line);

                    // alert(label+"dengan nilai"+value);S

                    window.open('<?php echo site_url("SewingByLine"); ?>', '_self');
                  }


              }
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