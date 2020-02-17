
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
        <!-- <div class="col-md-12"> -->
            <div class="card">
                <div class="card-body">
                    <canvas id="barSewingLine" ></canvas>
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
var day = new  Date();
var hr = day.getDay();

showReportSewingLine();
  
  function showReportSewingLine() {
  //   var thn = day.getFullYear();
  //  var bln = day.getMonth() + 1;
  //  if(hr == 1){
  //    var hari = day.getDate()-2;

  //  }else{
  //   var hari = day.getDate()-1;
  //  }
  //  var tanggal = thn.toString() + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString() ) + "-" + 
  //     (hari < 10 ? "0" + hari.toString() : hari.toString());

  //     console.log('tanggal: ', tanggal);
    $.ajax({
      url: '<?php echo site_url('reportbarsewingline/ajax_get_qty_sewing_line') ; ?>' ,
  
      type: 'GET',
      dataType: 'json',
      success: function(data){
        console.log(data);
        var chartReportSewingLineCanvas = $('#barSewingLine').get(0).getContext('2d');
        var chartReportSewingLineLabels = [];
        var chartReportSewingLineValues = [];
        var chartReportSewingEff = [];
        $.each(data, function(i, item) {
           chartReportSewingLineLabels.push(item.line);
           chartReportSewingLineValues.push(parseInt(item.qty));
           chartReportSewingEff.push(item.effisiensi);
         });
         new Chart(chartReportSewingLineCanvas,{
            type: 'bar',
            data: {
              labels: chartReportSewingLineLabels,
              datasets: [
                {
                  type: 'line',
                  borderColor: "blue",
                  label: 'Efficiency',
                  yAxisId: 'axisBarLine',
                  data:  chartReportSewingEff,
                  fill: false
              },
              {
              label: 'Quantity_output',
                yAxisId: 'axisBarChart',
                data: chartReportSewingLineValues,
                backgroundColor : [
                  "#FFB6C1", "#DC143C", "#F08080",
                  "#007bff", "#FF4500", "#FFD700",
                  "#FFEFD5", "#BDB76B", "#DDA0DD",
                  "#FF00FF", "#BA55D3","#9370DB",
                  "#9400D3","#8B008B","#4B0082",
                  "#ffff00","#ff8000","#ff4000",
                  "#88ff4d"
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
                  id:"axisBarChart",
                  type:"linear",
                  position:"left",
                  ticks:{
                    beginAtZero:true,
                  },
                  gridLines:{
                    display:false
                  },
                  labels:{
                    show:true,
                  }
                },
               
                ]
              },
              onClick:function(event,array){
              let element = this.getElementAtEvent(event);
              console.log('element: ', element);
              if(element.length > 0){
                var series= element[0]._model.datasetLabel;
                var label = element[0]._model.label;
                var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];

                var line = [label,value]; 
            

                localStorage.setItem('lineChart', line);

                // alert(label+"dengan nilai"+value);S

                 window.open('<?php echo site_url("lineweekchart"); ?>', '_self');
              }
            }
              
            },

         });
      }
      
    }); 
  }

    
</script>
</body>
</html>
