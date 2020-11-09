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
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        </div>
        <h4 style="text-align: center; color:grey" >
          <b>Globalindo Intimates - Dowtime Report 
            <span id="dailyDate" style="color:red;"></span>
          </b>
        </h4>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            
            <div class="col-md-2">
                <input type="text" name="from_date" id="from_date" class="datepicker form-control" placeholder="From Date">
            </div>
            <div class="col-md-2">
                <input type="text" name="to_date" id="to_date" class="datepicker form-control" placeholder="To Date">
            </div>

            <div class="col-md-2">
                <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
            </div>

          </div>
        </br>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body" >
            <!-- <canvas id="barDowntimeShimton"></canvas> -->
            <table id="sumaryTable" class="table table-bordered table-striped" style="width: Auto; ">
                <thead>
                    <tr>
                        <td class='bg-secondary'width=100px>Date</td>
                        <td class='bg-secondary'>Sympton</td>
                        <td class='bg-secondary' width=70px>Total Breakdown</td>
                        <td class='bg-secondary'>Respon Duration</td>
                        <td class='bg-secondary' >Reapair Duration</td>
                        <td class='bg-secondary' >Total Duration</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            </div>
          </div>
        </div>
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

var table

$(document).ready(function() {
  table = $('#sumaryTable').DataTable({
    // "scrollY": 200,
    "scrollX": true,
    dom: 'Blfrtip',
    // "pagingType": "full_numbers",
    "paging": true,
    // "lengthMenu": [10, 25, 50, 75, 100],
    lengthMenu: [
      [100, 200, 300, 400],
      [ 100, 200, 300, 400]
    ],
    buttons: [
      'excel', 'csv'
    ],
  
  });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    $('#filter').click(function(){

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var line = $('#line').val();

        var tgl1 = new Date($('#from_date').val());
        var tgl2 = new Date($('#to_date').val());

        var dataStr = {
            'from_date': from_date,
            'to_date': to_date,
            
        };

        if (from_date != '' && to_date != '') {
            if (tgl1 > tgl2) {
                alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
            } else {
                $.ajax({
                    url: "<?php echo site_url('downtime_mechanic/DowntimeShimptonDaily/filter'); ?>",
                    method: "POST",
                    data: {
                        'dataStr': dataStr
                    },
                    dataType: 'json',
                  }).done(function(data){
						
						table.clear();
            table.clear();
						$.each(data, function(i,item){
              var hms = item.respon;   
							var as = hms.split(':'); 
							var respon = (+as[0]) * 60 + (+as[1]);

							var times = item.repair;
							var bs = times.split(':');
							var repair = (+bs[0]) * 60 + (+bs[1]);

							var total = [respon + repair];
							console.log('total', total);

							
							table.row.add([
								item.month,
								item.sympton,
								item.tot_machine,
                respon,
                repair,
                total
								
							]).draw();
            })
					})
                
                
            }
        }


			});

		})

      
  </script>
</body>

</html>