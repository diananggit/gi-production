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
                <h2 style="text-align: center; color: #007bff"><b>Intimates - Sewing Line Report</b></h2>
                <div class="form-group mx-sm-4 mb-3 mt-3">
                  <input type="text" id="line">
                </div>
                <div class="form-group mx-sm-4 mb-3 mt-3">
                    <label>Plese Select Production </label>
                </br>
                <select class="form-control select2" id="tgl" name="tgl" style="width: 30%" placeholder="please select a date">
                    <option value="0" >Please select a date</option>
                    <?php foreach($line as $l): ?>
                        <option value="<?php echo $l->tgl; ?>"> <?php echo $l->tgl; ?> </option>
                    <?php endforeach; ?>
                </select>
                </div>
               
                <div class="card-body mt-1">
            
                 <hr/>
                <div class="row">
                    <div class="col-md-8">
                         <div class="card card-info" >
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="tableSewingDay" class="table table-border table-striped" >
                                    <thead>
                                        <tr>
                                            <tr>
                                                <th>ORC</th>
                                                <th>Style</th>
                                                <th>Color</th>
                                                <th>Sam</th>
                                                <th>Output</th>
                                                <th>Efficiency</th>
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
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <canvas id="barSewingDayChart" ></canvas>
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
    var lineArr = localStorage.getItem('dayChart');
    console.log('lineArr: ', lineArr);
    var lineSplit = lineArr.split(",");
    var line = lineSplit[0];
      $(".select2").select2();

      table= $('#tableSewingDay').DataTable({
        order: false,
        paging: false,
        searching: false
      });

       $('#tgl').change(function() {
        var tgl = $(this).val()
        var line = localStorage.getItem('dayChart');
        var dataStr = {'tgl' : tgl, 'line' : line};

        $.when(
          $.ajax({
            url: '<?php echo site_url("LineDayChart/ajax_get_by_line_day"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
            table.clear();
            $.each(data, function(i, item){
                table.row.add([
                    item.orc,
                    item.style,
                    item.color,
                    item.total_sam,
                    item.qty_ass,
                    item.eff,
                ]).draw();
            })
          }),
          $.ajax({
            url: '<?php echo site_url("LineDayChart/ajax_get_by_line_day"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'dataStr' : dataStr}
          }).done(function(data){
            var chartSewingLineCanvas = $('#barSewingDayChart').get(0).getContext('2d');
            var chartSewingLineCenterPanelValues = [];
            var chartSewingLineBackWingsValues = [];
            var chartSewingLineCupsValues = [];
            var chartSewingLineAssemblyValues = [];
            $.each(data, function(i, item){
              chartSewingLineCenterPanelValues.push(parseInt(item.qty_cp));
              chartSewingLineBackWingsValues.push(parseInt(item.qty_bw));
              chartSewingLineCupsValues.push(parseInt(item.qty_cup));
              chartSewingLineAssemblyValues.push(parseInt(item.qty_ass));
            });
            if(chartSewingChart != undefined){
                chartSewingChart.destroy();
            }
            new Chart(chartSewingLineCanvas,{
              type:'bar',
              data: {
                
                datasets: [
                 {
                  label: 'Cp',
                  labels: "Center Panel",
                  data:chartSewingLineCenterPanelValues,
                  backgroundColor: "#99ccff",
                },
                {
                  label: 'Bw',
                  data:chartSewingLineBackWingsValues,
                  backgroundColor: "#6699ff",
                },
                {
                  label: 'Cup',
                  data:chartSewingLineBackWingsValues,
                  backgroundColor: "#3366ff",
                },
                {
                  label: 'Assembly',
                  data:chartSewingLineAssemblyValues,
                  backgroundColor: "#3333ff",
                },
              
                ]
              },
              option: {
                scsales: {
                  yAxes: [{
                    tickss: {
                      beginAtZero: true,
                     
                    },
                    min: 0
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