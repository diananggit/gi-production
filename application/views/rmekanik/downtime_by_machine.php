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
								<select class="form-control select2" id="line" name="line"></select>
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
						<!-- <div class="col-30"> -->
						<div class="card" >
							<!-- <div class="card-header">
								<h3 id="dateSummary" class="text-primary"></h3>
							</div> -->
							<div class="card-body">
								
								<table id="sumaryTable" class="table table-bordered table-striped" style="width: Auto; ">
									<thead>
										<tr>
											<td class='bg-secondary'width=100px>Line</td>
											<td class='bg-secondary'>Merk</td>
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
								</table>
							</div>
						</div>
					</div>
					</div>
				<!-- </div> -->
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
	var table
	$(".select2").select2();

		// $(document).ready(function() {
			table = $('#sumaryTable').DataTable({
				// "scrollY": 200,
				"scrollX": true,
				dom: 'Blfrtip',
				lengthMenu: [
					[10, 25, 50, 100, 200, 300, 400],
					[10, 25, 50, 100, 200, 300, 400]
				],
				buttons: [
					'excel', 'csv'
				],

			});

			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
			});

			load_line();

			function load_line(){
				$('#line').empty();
				$.ajax({
					url: "<?php echo site_url('Downtime/get_line'); ?>",
					type: 'get',
					dataType: 'json',
				}).done(function(data) {
				$.each(data, function(i, item) {
					$('#line').append($('<option>', {
						value: item.line,
						text: item.line
					}));
				});
				});
			}

			function timeStringToFloat(time) {
				var hoursMinutes = time.split(/[.:]/);
				var hours = parseInt(hoursMinutes[0], 10);
				var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
				return hours + minutes / 60;
				console.log('minutes', minute);
			}

			$('#filter').click(function(){
				var from_date = $('#from_date').val();
				var to_date = $('#to_date').val();
				var line = $('#line').val();

				var tgl1 = new Date($('#from_date').val());
				var tgl2 = new Date($('#to_date').val());

				var dataStr = {
					'from_date': from_date,
					'to_date': to_date,
					'line': line,
				};

				if (from_date != '' && to_date != '' && line != '') {
					if (tgl1 > tgl2) {
						alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
					} else {
						$.ajax({
							url: "<?php echo site_url('Downtime/filter'); ?>",
							method: "POST",
							data: {
								'dataStr': dataStr
							},
							dataType: 'json',
						}).done(function(data){

							

						if (data.length > 0) {
							table.clear();
							$('#sumaryTable').css('display', '');							
							$.each(data, function(i, item) {
								// chartSewingLineLabels.push(item.tgl);
								var hms = item.respon_duration;   
								var a = hms.split(':'); 
								console.log('hms', hms);
								var respon = (+a[0]) * 60 + (+a[1]);
								console.log('respon', respon);

								var times = item.repair_duration;
								var b = times.split(':');
								var repair = (+b[0]) * 60 + (+b[1]);

								var total = respon + repair
							
								// respon.push(item.respon_duration);
							
								table.row.add([
									item.line,
									item.machine_brand,
									item.tgl_waiting,
									item.Nama,
									item.sympton,
									item.start_waiting,
									item.start_repairing,
									item.end_repairing,
									respon,
									repair,
									total,
									// item.repair_duration,
									// item.total_repair,
								]).draw();

							});   

						} else {   
							alert("Please Select Date");
						}
						});
					}
					}
				});	
			// })

		// });
	</script>
</body>

</html>