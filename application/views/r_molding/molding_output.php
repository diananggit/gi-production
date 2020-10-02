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
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables.net-buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

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
					<h2 style="text-align: center; color: #007bff"><b>Globalindo Intimates - Molding Report by Machine</b></h2>
					<div class="form-group">
						<label>Plese Select Production Range</label>

						<div class="input-group">
							<div class="input-group-prepend">
							</div>
							<div class="col-md-2">
								<select class="form-control select2" id="machine" name="machine"></select>
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
						
						<div class="card">
							
							<div class="card-body" id="orcTableList" style="display: none;">
								<table id="tableOrc" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Tanggal</th>
											<th>MC#</th>
											<th>Shift</th>
											<th>Style</th>
											<th>Color</th>
											<th>Qty_Outer</th>
											<th>Qty_Mid</th>
											<th>Qty_Linning</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($moldingmc as $mc) : ?>
											<tr>
												<td>
													<?php echo date('d-m-Y', strtotime($mc->tgl)) ?>
												</td>
												<td>
													<?php echo $mc->no_mesin ?>
												</td>
												<td>
													<?php echo $mc->shift ?>
												</td>
												<td>
													<?php echo $mc->style ?>
												</td>
												<td>
													<?php echo $mc->color ?>
												</td>
												<td>
													<?php echo $mc->qty_outer ?>
												</td>
												<td>
													<?php echo $mc->qty_midmold ?>
												</td>
												<td>
													<?php echo $mc->qty_linning ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
									<tfoot>
									</tfoot>
								</table>
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
		//date range
		var table;
		$(".select2").select2();

		table = $('#tableOrc').DataTable();
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
		});
		load_machine();

		function load_machine() {
			$('#machine').empty();
			$.ajax({
				url: "<?php echo site_url('ReportOutputMolding/get_machine'); ?>",
				type: 'get',
				dataType: 'json',
			}).done(function(data) {
				console.log('data: ', data);

				$.each(data, function(i, item) {
					$('#machine').append($('<option>', {
						value: item.no_mesin,
						text: item.no_mesin
					}));
				});
			});
		}

		$('#filter').click(function() {
			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();
			var machine = $('#machine').val();

			var tgl1 = new Date($('#from_date').val());
			var tgl2 = new Date($('#to_date').val());

			var dataStr = {
				'from_date': from_date,
				'to_date': to_date,
				'machine': machine,
			};

			if (from_date != '' && to_date != '' && machine != '') {

				if (tgl1 > tgl2) {
					alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
				} else {
					$.ajax({
						url: "<?php echo site_url('ReportOutputMolding/filter'); ?>",
						method: "POST",
						data: {
							'dataStr': dataStr
						},
						dataType: 'json'
					}).done(function(data) {
						console.log(data);
						if (data.length > 0) {
							table.clear();
							$('#orcTableList').css('display', '');							
							$.each(data, function(i, item) {
								table.row.add([
									item.tgl,
									item.no_mesin,
									item.shift,
									item.style,
									item.color,
									item.qty_outer,
									item.qty_midmold,
									item.qty_linning,
								]).draw();

							});   

						} else {   
							alert("Please Select Date");
						}
					});
				}
			}
		});
	</script>
</body>

</html>