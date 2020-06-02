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
            <div class="col-sm-15">
              <!-- <h1 class="m-0 text-dark" style="text-align: center;"></h1> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!--INPUT REMAKS-->
          <div class="modal fade" id="modal_show_remaks" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Please Input Remaks</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                  </button>
                </div>
                <form method="post" id="form-show-remaks">
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label">Remaks</label>
                      <div class="col-md-10">
                        <input type="text" id="inremaks" class="form-control" tabindex="0" maxlength="20">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer" justify-content-between">
                    <button type="submit" class="btn btn-success" onclick="save()"><i class="fa fa-save"></i>&nbsp;save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--end INPUT REMAKS-->
          <!--modal pilihan-->
          <div class="modal fade" id="modal_change_remaks" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Please select one</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                  </button>
                </div>
                <form method="post" id="form-change-remaks">
                  <div class="modal-body">
                    <div class="form-group row">
                      <!-- <label class="col-md-2 col-form-label">Remaks</label> -->
                      <!-- <div class="row"> -->
                      <div class="col-md-10">
                        <!-- <input type="text" id="remaks" class="form-control" tabindex="0" maxlength="20"> -->
                        <button type="button" class="btn btn-block btn-warning btn-sm" id="sixdays" data-dismiss="modal">6 Days Output</button>
                        <button type="button" id="remaks" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#form-show-remaks">Remaks</button>
                      </div>
                      <!-- </div> -->
                    </div>
                  </div>
                  <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                          </div> -->
                </form>
              </div>
            </div>
          </div>
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
        url: '<?php echo site_url('reportBarSewingLine/ajax_get_qty_sewing_line'); ?>',
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