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
  <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">

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
          <h2 style="text-align: center; color: #007bff">Globalindo Intimates - Molding Report by Single ORC</h2>
          <div class="form-group mx-sm-4 mb-3 mt-3">
            <label>Plese Select Orc Number</label>
            </br>
            <select class="form-control select2" id="orc" name="orc" style="width: 30%" placeholder="please select an orc"></select>
          </div>
          <div class="card-body mt-1">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>QTY ORDER:</label>
                  <input type="text" id="qty" name="qty" class="form-control" disabled>
                </div>            
                <div class="form-group">
                  <label>STYLE:</label>
                  <input type="text" id="style" name="style" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>COLOR:</label>
                  <input type="text" id="color" name="color" class="form-control" disabled>
                </div>
              </div>
            </div>
            <hr />
            <!-- <h2 style="color: #007bff">Molding Detail Status</h2> -->
      <div class="row">
        <div class="col-md-6">
            <div class="card card-primary" >
                <div class="card-header">
                    <h3 class="card-title">Molding Balancing</h3>
                </div>
                <div class="card-body">
                    <table id="tableOrcMolding" class="table table-border table-striped" width="100%">
                        <thead>
                            <tr>
                                <tr>
                                    <th width="25%">#</th>
                                    <th>Outer</th>
                                    <th>Mid Cover</th>
                                    <th>Linning</th>
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
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Molding Balancing Chart</h3>
                </div>
                <div class="card-body">
                    <canvas id="barMoldingBalancing" style="height:35%; width:30%" height:"50%" width:"50%"></canvas>
                </div>
            </div>
            <!-- <div class="card-tools">
              <a href="<?php echo site_url('reportmoldingdetail'); ?>" class="btn btn-success" ><i class="fa fa-arrow-right"></i>NEXT</a>
            </div> -->
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
  <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
  
  <script type="text/javascript">
    var table;
    var chartMoldingBalancingChart;
    
    $(document).ready(function() {
      $(".select2").select2();

      table= $('#tableOrcMolding').DataTable({
        order: false,
        paging: false,
        searching: false
      });

      load_orc();

      function load_orc() {
        $('#orc').empty();
        $.ajax({
          url: "<?php echo site_url('reportmoldingbalancing/ajax_get_all_orc'); ?>",
          type: 'get',
          dataType: 'json'
        }).done(function(data){
            console.log('data: ', data);
            $.each(data, function(i, item){
                $('#orc').append($('<option>', {
                value: item.orc,
                text: item.orc                    
                }));
            });
        });
      }

       $('#orc').change(function() {
        orc = $(this).val()
        $.when(
          $.ajax({
            url: '<?php echo site_url("reportmoldingbalancing/ajax_get_by_orc"); ?>/' + orc,
            type: 'GET',
            dataType: 'json'
          }).done(function(data){
         
            console.log('data: ', data);
            $('#style').val(data[0].style);
            $('#color').val(data[0].color);
            $('#qty').val(data[0].qty);
            table.clear();

            $.each(data, function(i, item){
                table.row.add([
                    "Incoming",
                    item.qty_in_outer,
                    item.qty_in_mildmold,
                    item.qty_in_linning,
                ]).draw();
                table.row.add([
                    "Finish Mold",
                    item.qty_out_outer,
                    item.qty_out_midmold,
                    item.qty_in_linning,
                ]).draw();
                table.row.add([
                    "WIP Mold",
                    item.wip_outer,
                    item.wip_mild_mold,
                    item.wip_linning,
                ]).draw();
            })
          }),
          $.ajax({
            url: '<?php echo site_url("reportmoldingbalancing/ajax_get_by_orc"); ?>/' + orc,
            type: 'GET',
            dataType: 'json'
          }).done(function(data){
            var chartMoldingBalancingCanvas = $('#barMoldingBalancing').get(0).getContext('2d');
            var chartMoldingBalancingIncomingOuterValues = [];
            var chartMoldingBalancingIncomingMidmoldValues = [];
            var chartMoldingBalancingIncomingLinningValues = [];
            var chartMoldingBalancingFinishOuterValues = [];
            var chartMoldingBalancingFinishMidmoldValues = [];
            var chartMoldingBalancingFinishLinningValues = [];
            var chartMoldingBalancingWipMoldOuterValues = [];
            var chartMoldingBalancingWipMoldMidmoldValues = [];
            var chartMoldingBalancingWipLinningValues = [];
            // chart.destroy();
            $.each(data, function(i, item){
              chartMoldingBalancingIncomingOuterValues.push(parseInt(item.qty_in_outer));
              chartMoldingBalancingIncomingMidmoldValues.push(parseInt(item.qty_in_mildmold));
              chartMoldingBalancingIncomingLinningValues.push(parseInt(item.qty_in_linning));
              chartMoldingBalancingFinishOuterValues.push(parseInt(item.qty_out_outer));
              chartMoldingBalancingFinishMidmoldValues.push(parseInt(item.qty_out_midmold));
              chartMoldingBalancingFinishLinningValues.push(parseInt(item.qty_in_linning));
              chartMoldingBalancingWipMoldOuterValues.push(parseInt(item.wip_outer));
              chartMoldingBalancingWipMoldMidmoldValues.push(parseInt(item.wip_mild_mold));
              chartMoldingBalancingWipLinningValues.push(parseInt(item.wip_linning));
            });
            if(chartMoldingBalancingChart != undefined){
              chartMoldingBalancingChart.destroy();
            }
            chartMoldingBalancingChart = new Chart(chartMoldingBalancingCanvas,{
              type:'bar',
              data: {
                labels: ["Incoming", "FinishMold", "WIPMold"],
                datasets: [
                 {
                  label: 'OuterMold',
                  data: [chartMoldingBalancingIncomingOuterValues,chartMoldingBalancingFinishOuterValues,chartMoldingBalancingWipMoldOuterValues],
                  backgroundColor: ["#00bfff","#00bfff","#00bfff"],
                },
                  {
                  label: 'MidMold',
                  data: [chartMoldingBalancingIncomingMidmoldValues, chartMoldingBalancingFinishMidmoldValues, chartMoldingBalancingWipMoldMidmoldValues],
                  backgroundColor: ["#ff8080","#ff8080","#ff8080"],
                  },
                  {
                    label: 'Linning',
                    data: [chartMoldingBalancingIncomingLinningValues,chartMoldingBalancingFinishLinningValues,chartMoldingBalancingWipLinningValues],
                    backgroundColor: ["#00ff00","#00ff00","#00ff00"],
                  },
             
                // {
                
                //   data: chartMoldingBalancingFinishMidmoldValues,
                //   backgroundColor:["#FF0000"],

                // }
                ]
               
               
              },
              
                // data: {
                // labels: ["FinishMold"],
                // datasets: [
                //   {
                //   label: 'OuterMold',
                //   data: chartMoldingBalancingIncomingOuterValues,
                //   backgroundColor: ["#191970"],
                // },
                // } 
              
              
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
    });

   

    // function showDataTable() {

    // }
    // });
    // var table;
    //    $('#orc').change(function(){
    //     table = $('#tableOrc').DataTable().destroy();
    //     $ajax({
    //       url:'',
    //       type: 'GET',
    //       dataType: 'json',
    //       success: function(){

    //       }
    //     });
    //    }); 
  </script>
</body>

</html>