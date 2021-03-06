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
        <h2 style="text-align: center; color: #dc3545"><b>Globalindo Intimates - Sewing Report</b></h2>
        <!-- <div class="col-md-6"> -->
            <div class="card">
                <div class="card-body">
                    <input type="text" id="line">
                    <canvas id="barSewingLine"></canvas>
                </div>
            </div>
          </div>
          <div class="card-tools">
            <button type="button" id="linkWeekly" class="btn btn-warning"><i class="fa fa-bar-chart"></i>Per Week</button>                
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

<script>
 var line;

    $(document).ready(function() {
      var lineArr = localStorage.getItem('lineChart');
      console.log('lineArr: ', lineArr);
      var lineSplit = lineArr.split(",");
      line = lineSplit[0];
LineDailyChart();

//function format
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

function LineDailyChart() {
    $.ajax({
      url: '<?php echo site_url('report_sewing/LineWeekChart/ajax_get_daily_sewing_line'); ?>'  ,
      type: 'POST',
      dataType: 'json',
      data: {
              'line': line
            },
    }).done(function(data){
      var chartSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
      var chartSewingLineLabels = [];
      var chartSewingLineValues = [];
      var chartSewingLineEff = [];
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
    let startLength = endLength - 7 ;

    resultDatas = resultFilter.slice(startLength, endLength);

    console.log('resultDatas', resultDatas);


      $.each(resultDatas,function(i, data){ 
    
        chartSewingLineLabels.push(data.tgl);
        chartSewingLineValues.push(parseInt(data.qty_sewing));
        chartSewingLineEff.push(data.eff);
  
      });
      new Chart(chartSewingLineCanvas,{
        type: 'bar',
        data: {
          labels: chartSewingLineLabels,
          datasets: [
            {
              type: 'line',
              borderColor: "blue",
              backgroundColor: "blue",
              label: 'Efficiency',
              data: chartSewingLineEff,
              fill: false
            },
            {
              label: 'Output',
              yAxisId: 'axisBarChart',
              data: chartSewingLineValues,
              backgroundColor : [
                "#ff8080", "#ff8080", "#ff8080", 
                "#ff8080", "#ff8080", "#ff8080",
                "#ff8080"
              ]
            }
          ]
        },
        option: {
          responsive: true,
          tooltips:{
            mode: 'label'
          },
          element:{
            line: {
              fill:false
            }
          },
          scales: {
            yAxes: [{
              id:"axisBarChart",
              type:"linear",
              position:"left",
              ticks:{
                beginAtZero: true
              },
              gridLines:{
                display:'false'
              },
              labels:{
                show:true,
              }
            },
            ]
          }
        },
      });
    })
    }

$('#linkWeekly').click(function(){
    
    localStorage.setItem('weekChart', line);

    window.open('<?php echo site_url("report_sewing/LineDailyChart/ajax_get_by_line"); ?>/' + line, "_self");

  })

$('#line').val(line);

})
</script>
</body>
</html>
