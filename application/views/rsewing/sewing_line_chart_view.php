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
          <b>Globalindo Intimates - Sewing Report,
            <span id="dailyDate" style="color:red;"></span>
          </b>
        </h4>
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
        url: '<?php echo site_url('report_sewing/reportBarSewingLine/ajax_get_qty_sewing_line'); ?>',
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

              },
              onClick: function(event, array) {
                let element = this.getElementAtEvent(event);
                console.log('element: ', element);
                  if (element.length > 0) {
                    var series = element[0]._model.datasetLabel;
                    var label = element[0]._model.label;
                    var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];

                    var line = [label, value];

                    localStorage.setItem('lineChart', line);

                    window.open('<?php echo site_url("report_sewing/SewingByLine"); ?>', '_self');
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