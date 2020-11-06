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
                    <label>Plese Select Production Week </label>
                </br>
                <select class="form-control select2" id="week" name="week" style="width: 30%" placeholder="please select week">
                    <option value="0" >Please select number of week</option>
                    <?php foreach($line as $l): ?>
                        <option value="<?php echo $l->week; ?>"> <?php echo $l->week; ?> </option>
                    <?php endforeach; ?>
                </select>
                </div>
                
                
                <div class="card-body mt-1">
            
                 <hr/>
            <!-- <h2 style="color: #007bff">Molding Detail Status</h2> -->
                <div class="row">
                    <div class="col-md-11">
                         <div class="card card-info" >
                            <div class="card-header">
                    <!-- <h3 class="card-title"></h3> -->
                            </div>
                            <div class="card-body">
                                <table id="tableSewingWeek" class="table table-border table-striped" >
                                    <thead>
                                        <tr>
                                            <tr>
                                                <th>Line</th>
                                                <th>ORC</th>
                                                <th>Style</th>
                                                <th>Color</th>
                                                <th>Sam</th>
                                                <th>Output</th>
                                                <!-- <th>Efficiency</th> -->
                                                <th>Man Power</th>
                                            </tr>
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
                    <div class="col-md-9">
                        <div class="card card-info">
                            <div class="card-header">
                    <!-- <h3 class="card-title"></h3> -->
                            </div>
                            <div class="card-body">
                                <canvas id="barSewingWeekChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-tools">
                  <button type="button" id="linkMonthly" class="btn btn-success"><i class="fa fa-bar-chart"></i>Per Month</button>
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
    var table;
    var chartSewingChart;
    
    $(document).ready(function() {
    var lineArr = localStorage.getItem('weekChart');
    console.log('lineArr: ', lineArr);
    var lineSplit = lineArr.split(",");
    var line = lineSplit[0];
      $(".select2").select2();

      table= $('#tableSewingWeek').DataTable({
        order: false,
        paging: false,
        searching: false
      });
       $('#week').change(function() {
        var week = $(this).val()
        var line = localStorage.getItem('weekChart');
        var dataStr = {'week' : week, 'line' : line};

        function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }  

        $.when(
          $.ajax({
            url: '<?php echo site_url("report_sewing/LineDailyChart/ajax_get_by_line_week"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
              console.log('data: ', data);
            table.clear();
            $.each(data, function(i, item){
                table.row.add([
                    item.line,
                    item.orc,
                    item.style,
                    item.color,
                    item.sam,
                    item.qty_sewing,
                    // item.effisiensi,
                    item.op,
                ]).draw();
            })
          }),

          $.ajax({
            url: '<?php echo site_url("report_sewing/LineDailyChart/ajax_get_by_line_week2"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
            var chartSewingLineCanvas = $('#barSewingWeekChart').get(0).getContext('2d');
            var chartSewingLineValues = [];
            var chartSewingLineLabels = [];
            // var chartSewingLineEff = [];

            console.log('data', data);

// get date for system
  let dateSystem = Date(); 
  let compare = formatDate(dateSystem);

  console.log('compare', compare);
  console.log(data.tgl);

// filtering array
    const resultFilter =  data.filter( hero => {
      return hero.tgl < compare;
    });

    
    let endLength = data.length;
    let startLength = endLength - 6 ;

    resultDatas = resultFilter.slice(startLength, endLength);

    console.log('resultDatas', resultDatas);

            $.each(resultDatas, function(i, item){
                chartSewingLineValues.push(parseInt(item.qty));
                chartSewingLineLabels.push(item.tgl);
                // chartSewingLineEff.push(parseInt(item.effisiensi));
            });
            if(chartSewingChart != undefined){
                chartSewingChart.destroy();
            }
            chartSewingChart = new Chart(chartSewingLineCanvas,{
              type:'bar',
              data: {
                labels: chartSewingLineLabels,
                datasets: [
                 {
                  label: 'qty',
                  data: chartSewingLineValues,
                  backgroundColor: ["#4d88ff","#4d88ff","#4d88ff","#4d88ff","#4d88ff","#4d88ff","#4d88ff"],
                },
                ]
              },
              option: {
                scsales: {
                  yAxes: [{
                    tickss: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });
          })  
        )              
    });

    $('#linkMonthly').click(function(){

    localStorage.setItem('monthChart', line);

    window.open('<?php echo site_url("report_sewing/LineMonthlyChart/ajax_get_by_line"); ?>/' + line, "_self");
    })

    $('#line').val(line);
    });
  </script>
</body>

</html>