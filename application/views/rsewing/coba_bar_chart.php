
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="barSewingLine" style="height:25%; width:30%" height:"25%" width:"30%"></canvas>
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

showReportSewingLine();

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
  
  function showReportSewingLine() {
    $.ajax({
      url: '<?php echo site_url('reportbarsewingline/ajax_get_qty_sewing_line') ; ?>',
      type: 'GET',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        var chartReportSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
        var chartReportSewingLineLabels = [];
        var chartReportSewingLineValues = [];
        var chartReportSewingEff = [];
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
        $.each(data, function(i, item) {
           chartReportSewingLineLabels.push(item.line);
           chartReportSewingLineValues.push(parseInt(item.qty));
           chartReportSewingEff.push(item.eff);
         });
        var barChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        type: 'bar',
                          label: "Output",
                            data: [chartReportSewingLineValues],
                            fill: false,
                            backgroundColor: '#71B37C',
                            borderColor: '#71B37C',
                            hoverBackgroundColor: '#71B37C',
                            hoverBorderColor: '#71B37C',
                            yAxisID: 'y-axis-1'
                    }, {
                        label: "Efficiency",
                            type:'line',
                            data: [chartReportSewingEff],
                            fill: false,
                            borderColor: '#EC932F',
                            backgroundColor: '#EC932F',
                            pointBorderColor: '#EC932F',
                            pointBackgroundColor: '#EC932F',
                            pointHoverBackgroundColor: '#EC932F',
                            pointHoverBorderColor: '#EC932F',
                            yAxisID: 'y-axis-2'
                    } ]
                };
                
                window.onload = function() {
                    var ctx = document.getElementById("barSewingLine").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                        responsive: true,
                        tooltips: {
                          mode: 'label'
                      },
                      elements: {
                        line: {
                            fill: false
                        }
                    },
                      scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            labels: {
                                show: true,
                            }
                        }],
                        yAxes: [{
                            type: "linear",
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                            gridLines:{
                                display: false
                            },
                            labels: {
                                show:true,
                                
                            }
                        }, {
                            type: "linear",
                            display: true,
                            position: "right",
                            id: "y-axis-2",
                            gridLines:{
                                display: false
                            },
                            labels: {
                                show:true,
                                
                            }
                        }]
                    }
                    }
                    });
                };
      }
    });
  }

    
</script>
</body>
</html>
