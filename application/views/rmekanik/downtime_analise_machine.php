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
								<select class="form-control is-warning select2" id="month" name="month" style="width: 80%"></select>
							</div>
											
						</div>
						</br>
						<div class="card" >
							<div class="card-body">
								<table id="analiseTable" class="table table-bordered table-striped" style="width: Auto; ">
									<thead>
										<tr>
											<td class='bg-secondary'>Month</td>
											<td class='bg-secondary'width=100px>Machine Type</td>
											<td class='bg-secondary'width= 150px>Serial Number</td>
											<td class='bg-secondary'>Barcode Machine</td>
											<td class='bg-secondary'width= 150px >Sympton</td>
											<td class='bg-secondary' width= 100px>Total Break Machine</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
									
									</tfoot>
								</table>
							</div>
						</div>
						<!-- <div class="card" >
							<div class="card-body">
								
							</div>
						</div> -->
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
	</div>
	<?php $this->load->view('_partials/js.php'); ?>
	<script type="text/javascript">
	var table

	$(".select2").select2();
		$(document).ready(function() {
			table = $('#analiseTable').DataTable({
				// "scrollY": 200,
				"scrollX": true,
				dom: 'Blfrtip',
				"paging": true,
				lengthMenu: [
					[100, 200, 300, 400],
					[ 100, 200, 300, 400]
				],
				buttons: [
					'excel', 'csv'
				],
			
			});

			load_month();

			function load_month(){
				$('#month').empty();
				$.ajax({
					url: "<?php echo site_url('downtime_mechanic/ReportDowntimeAnalize/get_month'); ?>",
					type: 'get',
					dataType: 'json',
				}).done(function(data) {
				$.each(data, function(i, item) {
					$('#month').append($('<option>', {
						value: item.month,
						text: item.month
					}));
				});
				});
			}


            //search by tanggal
			$('#month').change(function(){
				month = $(this).val()
                 $.ajax({
                     url: '<?php echo site_url("downtime_mechanic/ReportDowntimeAnalize/get_datas"); ?>/' + month,
                     type: 'GET',
                     dataType: 'json',
                 }).done(function(data){
					
                     table.clear();
					 $.each(data, function(i,item){

						table.row.add([
							item.month,
							item.machine_type,
							item.machine_sn,
							item.barcode_machine,
							item.sympton,
							item.tot_machine,
						 ]).draw();
					 })
				 })

				});	
			// })

		});
	</script>
</body>

</html>