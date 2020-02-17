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
                <h2 style="text-align: center; color: #007bff">Globalindo Intimates - Sewing Line Report</h2>
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
                <!-- <div class="from-group mx-sm-4 mb-3 mt-3">
                    <label> Select Line </label>
                    </br>
                <select class="form-control select2" id="line" name="line" style="width: 30%" placeholder="please select line"></select>
                </div> -->
                <div class="card-body mt-1">
            
                 <hr/>
            <!-- <h2 style="color: #007bff">Molding Detail Status</h2> -->
                <div class="row">
                    <!-- <div class="col-md-"> -->
                         <div class="card card-info" >
                            <div class="card-header">
                    <!-- <h3 class="card-title"></h3> -->
                            </div>
                            <div class="card-body">
                                <table id="tableSewingMonth" class="table table-border table-striped" >
                                    <thead>
                                        <tr>
                                            <tr>
                                                <th>Line</th>
                                                <th>ORC</th>
                                                <th>Style</th>
                                                <th>Color</th>
                                                <th>Sam</th>
                                                <th>Output</th>
                                                <th>Efficiency</th>
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
                    <!-- <div class="col-md-8"> -->
                        <div class="card card-info">
                            <div class="card-header">
                    <!-- <h3 class="card-title"></h3> -->
                            </div>
                            <div class="card-body">
                                <canvas id="barSewingMonthChart" ></canvas>
                            </div>
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

      // load_month();

      // function load_month() {
      //   $('#month').empty();
      //   $.ajax({
          // url: "<//?php echo site_url('linedailychart/ajax_get_all_month'); ?>",
      //     type: 'GET',
      //     dataType: 'json',
      //   }).done(function(data){
      //       console.log('data: ', data);
      //       $.each(data, function(i, item){
      //           $('#month').append($('<option>', {
      //           value: item.month,
      //           text: item.month                    
      //           }));
      //       });
      //   });
      //   load_line();
      // }
      
       $('#month').change(function() {
        var month = $(this).val()
        var line = localStorage.getItem('monthChart');
        var dataStr = {'month' : month, 'line' : line};

        $.when(
          $.ajax({
            url: '<?php echo site_url("linemonthlychart/ajax_get_by_line_month"); ?>',
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
                    item.qty,
                    item.eff_coba,
                    item.op,
                ]).draw();
            })
          }),
          $.ajax({
            url: '<?php echo site_url("linemonthlychart/ajax_get_by_line_month"); ?>' ,
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
            var chartSewingLineCanvas = $('#barSewingMonthChart').get(0).getContext('2d');
            var chartSewingLineValues = [];
            var chartSewingLineLabels = [];
            var chartSewingLineEff = [];
            $.each(data, function(i, item){
                chartSewingLineValues.push(parseInt(item.qty));
                chartSewingLineLabels.push(item.week);
                chartSewingLineEff.push(parseInt(item.eff_coba));
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
                  backgroundColor: ["#191970","#191970","#191970","#191970","#191970","#191970"],
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
    $('#line').val(line);
    });
  </script>
</body>

</html>