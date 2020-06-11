
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
        <h2 style="text-align: center; color: #dc3545" >Globalindo Intimates - Molding Report (Per Shift)</h2>
        <div class="form-group mx-sm-4 mb-3 mt-3">
            <label>Plese Select Shift</label>
            </br>
            <select class="form-control select2" id="shift" name="shift" style="width: 30%"></select>
          </div>
        <div class="col-md-12" style="height:5; width:100;">
            <div class="card">
                <div class="card-body">
                    <canvas id="barMolding" style="height:5; width:100"></canvas>
                </div>
            </div>
        </div>
        <div class="card-tools">
          <a href="<?php echo site_url('ReportDaily'); ?>" class="btn btn-success" ><i class="fa fa-arrow-left"></i>BACK</a>
        </div>
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
    var chartMoldingChart;


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
    
    $(document).ready(function() {
      $(".select2").select2();

      load_shift();

      function load_shift() {
        $('#shift').empty();
        $.ajax({
          url: "<?php echo site_url('ReportMoldingShift/ajax_get_all_shift'); ?>",
          type: 'GET',
          dataType: 'json'
        }).done(function(data){
            console.log('data: ', data);
            $.each(data, function(i, item){
                $('#shift').append($('<option>', {
                value: item.shift,
                text: item.shift                    
                }));
            });
        });
      }

       $('#shift').change(function() {
        shift = $(this).val()
          $.ajax({
            url: '<?php echo site_url("ReportMoldingShift/ajax_get_by_shift"); ?>/' + shift,
            type: 'GET',
            dataType: 'json',
          }).done(function(data){
            var chartMoldingCanvas = $('#barMolding').get(0).getContext('2d');
            var chartMoldingOuterValues = [];
            var chartMoldingMidmoldValues = [];
            var chartMoldingLinningValues = [];
            var chartMoldingLabel = [];

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

            $.each(resultDatas, function(i, item){
              chartMoldingOuterValues.push(parseInt(item.qty_outermold));
              chartMoldingMidmoldValues.push(parseInt(item.qty_midmold));
              chartMoldingLinningValues.push(parseInt(item.qty_linning));
              chartMoldingLabel.push(item.tgl);
            });
            if(window.bar != undefined)
            window.bar.destroy();
           window.bar = new Chart(chartMoldingCanvas,{
              type:'bar',
              data: {
                labels: chartMoldingLabel,
                datasets: [
                 {
                  label: 'outer',
                  data: chartMoldingOuterValues,
                  backgroundColor: ["#00bfff","#00bfff","#00bfff","#00bfff","#00bfff","#00bfff","#00bfff"],
                },
                {
                  label: 'Midmold',
                  data: chartMoldingMidmoldValues,
                  backgroundColor: ["#ff6699","#ff6699","#ff6699","#ff6699","#ff6699","#ff6699","#ff6699"],
                },
                {
                  label: 'Linning',
                  data: chartMoldingLinningValues,
                  backgroundColor: ["#aaff00","#aaff00","#aaff00","#aaff00","#aaff00","#aaff00","#aaff00"],
                }
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
          });  

    });
    });


  </script>
</body>
</html>
