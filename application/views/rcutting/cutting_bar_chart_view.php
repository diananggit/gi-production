
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
        <h2 style="text-align: center; color: #ffc107"" >Globalindo Intimates - Cutting Report</h2>
        <div class="col-md-12" style="height:5; width:100;">
            <div class="card">
                <div class="card-body">
                    <canvas id="barCutting" style="height:5; width:100"></canvas>
                </div>
            </div>
        </div>
        <div class="card-tools">
          <a href="<?php echo site_url('ReportDaily'); ?>" class="btn btn-success" ><i class="fa fa-arrow-right"></i>BACK</a>
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

showReportCutting();

//formatdate
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
  
  function showReportCutting() {
    $.ajax({
      url: '<?php echo site_url('ReportBarChartCutting/ajax_get_qty_cutting') ; ?>',
      type: 'GET',
      dataType: 'json',
      }).done(function(data){
        console.log(data);
        var chartReportCuttingCanvas = $('#barCutting').get(0).getContext('2d');
        var chartReportCuttingLabels = [];
        var chartReportCuttingValues = [];
        var chartReportCuttingEff = [];
        var arrChartDataEff = [];
        var arrChartDataVal = [];
        var arrChartLabel =[];
    
        console.log('data',data);
        // get date for system
        let dateSystem = Date(); 
        let compare = formatDate(dateSystem);

          console.log('compare', compare);
          console.log(data.tgl);

        // filtering array
        const resultFilter =  data.filter( hero => {
        return hero.tgl < compare;
        });

            // get last index off array
            // let lastIndex = data.map( datas => { return datas.tgl; }).indexOf('2020-01-29');

            // slicing array get data view 6 array from last data array.
        let endLength = data.length;
        let startLength = endLength - 30 ;

        resultDatas = resultFilter.slice(startLength, endLength);

            console.log('resultDatas', resultDatas);
        
        $.each(resultDatas, function(i, item) {

          arrChartDataEff.push(JSON.parse(item.eff));
          arrChartDataVal.push(JSON.parse(item.qty));
          arrChartLabel.push(item.tgl);           
        });
        var outputMax = Math.max.apply(null, arrChartDataVal);
        var effMax = Math.max.apply(null,arrChartDataEff);

        var arrColor = [];
        for (x= 0; x <= arrChartDataVal.length; x++) {
          arrColor.push(
          randomColor()
          );
        }

        new Chart(chartReportCuttingCanvas,{
            type: 'bar',
            data: {
              labels: arrChartLabel,
                datasets: [
                {
                  type: 'line',
                  borderColor: "#3377ff",
                  backgroundColor : "#3377ff",
                  label: 'Efficiency',
                  yAxisID: 'axisBarLine',
                  data: arrChartDataEff,
                  fill: false
                },
                {
                label: 'Quantity output',
                yAxisID: 'axisBarChart',
                data: arrChartDataVal,
                backgroundColor : arrColor,
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
                    max: parseInt(effMax) + 30,
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
                    max: parseInt(outputMax) + 8000,
                  }
                }
              ]
              },
            }
        });

      // }
    }); 
    function randomColor() {
        return "hsl(" + 360 * Math.random() + ',' +
          (20 + 70 * Math.random()) + '%,' +
          (65 + 10 * Math.random()) + '%)'
      }

  }
    
    
</script>
</body>
</html>
