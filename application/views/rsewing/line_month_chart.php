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
              <!-- <h1 class="m-0 text-dark" style="text-align: center;"></h1> -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
      <!-- /.content-header -->

      <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h2 style="text-align: center; color: #007bff"><b>Globalindo Intimates - Sewing Line Report</b></h2>
                <div class="form-group mx-sm-4 mb-3 mt-3">
                  <input type="text" id="line">
                </div>
                <div class="form-group mx-sm-4 mb-3 mt-3">
                    <label>Plese Select Production Month</label>
                </br>
                <select class="form-control select2" id="month" name="month" style="width: 30%" placeholder="please select a month">
                    <option value="0" >Please select a month</option>
                    <?php foreach($line as $l): ?>
                        <option value="<?php echo $l->month; ?>"> <?php echo $l->month; ?> </option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="card-body mt-1">
                 <hr/>
                <div class="row">
                  <div class="card card-info" >
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                      <table id="tableSewingMonth" class="table table-border table-striped" >
                          <thead>
                              <tr>
                                <th>Line</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Sam</th>
                                <th>Output</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          </tfoot>
                      </table>
                    </div>
                </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <canvas id="barSewingMonthChart" ></canvas>
                    </div>
                </div>
              </div>
            </div>
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
    var table;
    var chartSewingChart;
    
    $(document).ready(function() {
    var lineArr = localStorage.getItem('monthChart');
    console.log('lineArr: ', lineArr);
    var lineSplit = lineArr.split(",");
    var line = lineSplit[0];
      $(".select2").select2();

      table= $('#tableSewingMonth').DataTable({
        order: false,
        paging: false,
        searching: false
      });
      
       $('#month').change(function() {
        var month = $(this).val()
        var line = localStorage.getItem('monthChart');
        var dataStr = {'month' : month, 'line' : line};

        $.when(
          $.ajax({
            url: '<?php echo site_url("LineMonthlyChart/ajax_get_by_line_month"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
            table.clear();
            $.each(data, function(i, item){
                table.row.add([
                    item.line,
                    item.orc,
                    item.style,
                    item.color,
                    item.sam,
                    item.qty_sewing,
                   
                ]).draw();
            })
          }),
          $.ajax({
            url: '<?php echo site_url("LineMonthlyChart/ajax_get_by_line_month2"); ?>' ,
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr},
          success:function(data){
            var chartSewingLineCanvas = $('#barSewingMonthChart').get(0).getContext('2d');
            var chartSewingLineValues = [];
            var chartSewingLineLabels = [];
            var chartSewingLineEff = [];
            var arrChartData = [];
            var arrChartLabel = [];
            $.each(data, function(i, item){
              arrChartData.push(JSON.parse(item.qty_sewing)),
                           
              arrChartLabel.push(item.week);
            });
            var outputMax = Math.max.apply(null, arrChartData);

            if(chartSewingChart != undefined){
                chartSewingChart.destroy();
            }
            new Chart(chartSewingLineCanvas,{
              type:'bar',
              data: {
                labels:arrChartLabel,
                datasets: [ 
               
                 {
                  label: 'qty',
                  yAxisID: 'axisBarChart',
                data: arrChartData,
                  backgroundColor: [ "#99d6ff", "#99d6ff", "#99d6ff", "#99d6ff", "#99d6ff", "#99d6ff"],
                },
                ]
              },
              options: {
              responsive: true,
              tooltips:{
                mode: 'label'
              },
              element:{
                line: {
                  fill: false
                }
              },
              scales: {
                yAxes: [
                {
                  id: 'axisBarChart',
                  type: "linear",
                  position: "left",
                  ticks:{
                    beginAtZero:true,
                    max: parseInt(outputMax) + 5000,
                  }
               
                }
              ]
              },
            }

         });

            }
          })  
        )              
    });
    $('#line').val(line);
    });
  </script>
</body>

</html>