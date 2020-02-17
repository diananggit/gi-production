
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
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Cutting Report</h2>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <canvas id="barCutting" style="height:25%; width:30%"></canvas>
                </div>
            </div>
        </div>
        <div class="card-tools">
          <a href="<?php echo site_url('reportdaily'); ?>" class="btn btn-success" ><i class="fa fa-arrow-right"></i>BACK</a>
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
      url: '<?php echo site_url('reportbarchartcutting/ajax_get_qty_cutting') ; ?>',
      type: 'GET',
      dataType: 'json',
      }).done(function(data){
        console.log(data);
        var chartReportCuttingCanvas = $('#barCutting').get(0).getContext('2d');
        var chartReportCuttingLabels = [];
        var chartReportCuttingValues = [];
        var chartReportCuttingEff = [];

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
        let startLength = endLength - 7 ;

        resultDatas = resultFilter.slice(startLength, endLength);

            console.log('resultDatas', resultDatas);

        $.each(resultDatas, function(i, item) {
           chartReportCuttingLabels.push(item.tgl);
           chartReportCuttingValues.push(parseInt(item.qty));
           chartReportCuttingEff.push(item.eff);
         });
         new Chart(chartReportCuttingCanvas,{
            type: 'bar',
            data: {
              labels: chartReportCuttingLabels,
              datasets: [
                {
                  type: 'line',
                  borderColor: "#ffffff",
                  backgroundColor : "#ffffff",
                  label: 'Efficiency',
                  yAxisId: 'axisBarLine',
                  data: chartReportCuttingEff,
                  fill: false
                },
                {
                label: 'Quantity output',
                yAxisId: 'axisBarChart',
                data: chartReportCuttingValues,
                backgroundColor : [
                  "#ff8080", "#ff8080", "#ff8080",
                  "#ff8080", "#ff8080", "#ff8080",
                  "#ff8080"
                ]
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
                  
                  id:'axisBarChart',
                  type:"linear",
                  position:"left",
                  ticks: {
                    beginAtZero: true,
                    min: 0,
                  }
                },
                {
                  id: 'axisBarLine',
                  type: "linear",
                  position: "right",
                  ticks:{
                    beginAtZero:true,
                    min: 0,
                    max: 100 + 50,
                    callback: function(value){
                      return value + "%";
                    }
                  }
               
                }
              ]
              },
            }
         });
      })
    } 
  // }
    
</script>
</body>
</html>
