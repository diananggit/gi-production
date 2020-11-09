<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Downtime | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<?php $this->load->view('_partials/css.php'); ?>

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
					</div>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<h2 style="text-align: center; color: grey"><b>Intimates - Downtime Report</b></h3>
					</br>
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
						<!-- <div class="col-md-6">
							<div class="info-box mb-2 bg-secondary">
								<span class="info-box-icon"><i class="fa fa-gear"></i></span>
								<div class="info-box-content">
									<span class="info-box-number" style="color: #1f2d3d;"  >Mechanic Utilize(try)</span>
									<span class="info-box-number" id="respon"></span>
									<span class="info-box-number" id="repair"></span>
									<span class="info-box-number" id="utilize"></span>
								</div>
							</div> -->
						</div>
						</br>
						<div class="card" >
							<div class="card-body">
								<table id="dailyTable" class="table table-bordered table-striped" style="width: Auto; ">
									<thead>
										<tr><td class='bg-secondary'>Floor</td>
											<td class='bg-secondary'width=100px>Line</td>
											<td class='bg-secondary'>Merk</td>
											<td class='bg-secondary'>Machine Type</td>
											<td class='bg-secondary' width=70px>Date</td>
											<td class='bg-secondary' width= 150px>Attended Mechanic</td>
											<td class='bg-secondary' width= 110px>Symptom</td>
											<td class='bg-secondary' >Start Time</td>
											<td class='bg-secondary'>Respond Time</td>
											<td class='bg-secondary'>Finished Time</td>
											<td class='bg-secondary'>Respon Duration</td>
											<td class='bg-secondary'>Repair Duration</td>
											<td class='bg-secondary'>Total Duration</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<!-- <tr>
										<th colspan="12" style="text-align:right">Total:</th>
										</tr> -->
									</tfoot>
								</table>
							</div>
						</div>
						<div class="card" >
							<div class="card-body">
								
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
			table = $('#dailyTable').DataTable({
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
    			autoclose: true
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
						url: '<?php echo site_url("downtime_mechanic/ReportSummaryDowntime/filter"); ?>',
						method: "POST",
                    data: {
                        'dataStr': dataStr
                    },
                    dataType: 'json',
					}).done(function(data){
						
						table.clear();
						$.each(data, function(i,item){
							var hms = item.respon_duration;   
							var as = hms.split(':'); 
							var respon = (+as[0]) * 60 + (+as[1]);

							var times = item.repair_duration;
							var bs = times.split(':');
							var repair = (+bs[0]) * 60 + (+bs[1]);

							var total = [respon + repair];
							console.log('total', total);

							table.row.add([
								item.floor,
								item.line,
								item.machine_brand,
								item.machine_type,
								item.tgl_waiting,
								item.Nama,
								item.sympton,
								item.start_waiting,
								item.start_repairing,
								item.end_repairing,
								respon,
								repair,
								total,
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