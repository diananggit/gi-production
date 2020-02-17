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
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Sewing Report</h2>
        <!-- <div class="col-md-6"> -->
            <div class="card">
                <div class="card-body">
                    <input type="text" id="line">
                    <!-- <input type="text" id="label"> -->
                    <canvas id="barSewingLine"></canvas>
                </div>
            </div>
            <div class="card-tools">
                <button type="button" id="linkDaily" class="btn btn-danger"><i class="fa fa-bar-chart"></i>Daily</button>
                <button type="button" id="linkWeekly" class="btn btn-warning"><i class="fa fa-bar-chart"></i>Per Week</button>                
                <button type="button" id="linkMonthly" class="btn btn-success"><i class="fa fa-bar-chart"></i>Per Month</button>
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

<script>
$(document).ready(function(){
var lineArr = localStorage.getItem('lineChart');
console.log('lineArr: ', lineArr);
var lineSplit = lineArr.split(",");
var line = lineSplit[0];
// var label = lineSplit[1];
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
      url: '<?php echo site_url('lineweekchart/ajax_get_daily_sewing_line'); ?>'  ,
      type: 'GET',
      dataType: 'json',
      data: {
        lines: line
      }
    }).done(function(data){
      var chartSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
      var chartSewingLineLabels = [];
      var chartSewingLineValues = [];
      var chartSewingLineEff = [];
      // var a = "%";
      // var eff = chartSewingLineEff.concat(a);
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

    // get last index off array
    // let lastIndex = data.map( datas => { return datas.tgl; }).indexOf('2020-01-29');

    // slicing array get data view 6 array from last data array.
    let endLength = data.length;
    let startLength = endLength - 7 ;

    resultDatas = resultFilter.slice(startLength, endLength);

    console.log('resultDatas', resultDatas);


      $.each(resultDatas,function(i, data){ 
    
        chartSewingLineLabels.push(data.tgl);
        chartSewingLineValues.push(parseInt(data.qty));
        chartSewingLineEff.push(data.effisiensi);
  
      });
      new Chart(chartSewingLineCanvas,{
        type: 'bar',
        data: {
          labels: chartSewingLineLabels,
          datasets: [
            {
              type: 'line',
              borderColor: "#ffff00",
              backgroundColor: "#ffff00",
              label: 'Efficiency',
              data: chartSewingLineEff,
              fill: false
            },
            {
              label: 'Output',
              yAxisId: 'axisBarChart',
              data: chartSewingLineValues,
              backgroundColor : [
                "#dc3545", "#dc3545", "#dc3545", 
                "#dc3545", "#dc3545", "#dc3545",
                "#dc3545"
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
  // }

// console.log('line: ', line);
// console.log('label: ', label);

$('#linkDaily').click(function(){
 
 localStorage.setItem('dayChart', line);

 window.open('<?php echo site_url("linedaychart/ajax_get_by_line"); ?>/' + line, "_self");

})

$('#linkWeekly').click(function(){
 
  localStorage.setItem('weekChart', line);

  window.open('<?php echo site_url("linedailychart/ajax_get_by_line"); ?>/' + line, "_self");

})

$('#linkMonthly').click(function(){

  localStorage.setItem('monthChart', line);

  window.open('<?php echo site_url("linemonthlychart/ajax_get_by_line"); ?>/' + line, "_self");
})

$('#line').val(line);
// $('#label').val(label);



})
</script>
</body>
</html>
