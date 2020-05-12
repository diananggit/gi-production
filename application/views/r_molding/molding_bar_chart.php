
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
            <!-- <h1 class="m-0 text-dark" style="text-align: center;"></h1> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Molding Report</h2>
        <div class="col-md-10" style="height:5; width:100;">
            <div class="card">
                <div class="card-body">
                    <canvas id="barMolding" style="height:5; width:100"></canvas>
                </div>
            </div>
        </div>
        <div class="card-tools">
          <a href="<?php echo site_url('reportdaily'); ?>" class="btn btn-success" ><i class="fa fa-arrow-left"></i>BACK</a>
          <a href="<?php echo site_url('reportmoldingshift'); ?>" class="btn btn-danger" ><i class="fa fa-pencil"></i>SHIFT</a>
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

showReportMolding();

//formatedate
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
  
  function showReportMolding() {
    $.ajax({
      url: "<?php echo site_url('ReportBarChartMolding/ajax_get_qty_molding') ; ?>",
      type: "GET",
      dataType: 'json', 
       }).done(function(data){
        var chartReportMoldingCanvas = $('#barMolding').get(0).getContext('2d');
        var chartReportMoldingLabels = [];
        var chartReportMoldingValues = [];

        let dateSystem = Date(); 
        let compare = formatDate(dateSystem);

          console.log('compare', compare);
          console.log(data.tgl);

        // filtering array
        const resultFilter =  data.filter( hero => {
        return hero.tgl < compare;
        });

         
        let endLength = data.length;
        let startLength = endLength - 7 ;

        resultDatas = resultFilter.slice(startLength, endLength);

        var arrChartData = [];
        var arrChartLabel = [];

        $.each(resultDatas, function(i, item) {
          
          arrChartData.push({
                            'val' : JSON.parse(item.qty_mold),
                            'eff' : JSON.parse(item.eff)
                             });
          arrChartLabel.push({'tgl': item.tgl});
           
         });
         var outputMax = Math.max(...arrChartData.map(o => o.val),0);
         var effMax = Math.max(...arrChartData.map(o => o.eff),0);

         new Chart(chartReportMoldingCanvas,{
            type:'bar',
            data: {
              labels: [
                arrChartLabel[0]['tgl'],
                arrChartLabel[1]['tgl'],
                arrChartLabel[2]['tgl'],
                arrChartLabel[3]['tgl'],
                arrChartLabel[4]['tgl'],
                arrChartLabel[5]['tgl'],
                ],
              datasets: [
                {
                  type: 'line',
                  borderColor: "#3377ff",
                  backgroundColor : "#3377ff",
                  label: 'Efficiency',
                  yAxisID: 'axisBarLine',
                  data: [
                    arrChartData[0]['eff'],
                    arrChartData[1]['eff'],
                    arrChartData[2]['eff'],
                    arrChartData[3]['eff'],
                    arrChartData[4]['eff'],
                    arrChartData[5]['eff'],
                  ],
                  fill: false
                },
                {
                label: 'Output',
                yAxisID: 'axisBarChart',
                data: [
                  arrChartData[0]['val'],
                  arrChartData[1]['val'],
                  arrChartData[2]['val'],
                  arrChartData[3]['val'],
                  arrChartData[4]['val'],
                  arrChartData[5]['val'], 
                ],
                backgroundColor : [
                  "#ff9900", "#ff9900", "#ff9900",
                  "#ff9900", "#ff9900", "#ff9900",
                  "#ff9900"
                ],
              }
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
                yAxes: [{
                  id:'axisBarLine',
                  type:"linear",
                  position:"right",
                  ticks: {
                    beginAtZero: true,
                    max: parseInt(effMax) + 10,
                    callback: function(value){
                      return value + "%";
                    }
                  }
                },
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

      // }
    }); 
  }
    
</script>
</body>
</html>
