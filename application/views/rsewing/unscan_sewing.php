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
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header alert-info">
									<h3 class="card-title">Globalindo Intimates - Barcode In Line</h3>
								</div>
								<div class="card-body">
									<table id="wipTable" class="table table-bordered table-striped" style="width: 100%">
										<thead>
											<tr>
												<td>Line</td>
												<td>ORC</td>
												<td>Style</td>
												<td>Color</td>
												<td>Tgl Trims</td>
												<td>Barcode</td>
												<td>qty</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($unsewing as $unscan) : ?>
												<tr>
													<td>
														<?php echo $unscan->line ?>
													</td>
													<td>
														<?php echo $unscan->orc ?>
													</td>
													<td>
														<?php echo $unscan->style ?>
													</td>
													<td>
														<?php echo $unscan->color ?>
													</td>
													<td>
														<?php echo $unscan->Indate ?>
													</td>
													<td>
														<?php echo $unscan->InCode ?>
													</td>
													<td>
														<?php echo $unscan->qty_pcs ?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- <?php $this->load->view('_partials/footer.php'); ?> -->
		<!-- jQuery -->
		<?php $this->load->view('_partials/js.php'); ?>

		<script type="text/javascript">
			$(document).ready(function() {
				var table = $('#wipTable').DataTable({
					// dom: 'Bfrtip',
					// buttons: [
					// 	'copy', 'csv', 'excel', 'pdf', 'print'
					// ],
					"footerCallback": function(row, data, start, end, display) {
						var api = this.api(),
							data;

						// Remove the formatting to get integer data for summation
						var intVal = function(i) {
							return typeof i === 'string' ?
								i.replace(/[\$,]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};

						// Total over all pages
						total = api
							.column(3)
							.data()
							.reduce(function(a, b) {
								return intVal(a) + intVal(b);
							}, 0);

						// // Total over this page
						// pageTotal = api
						//     .column( 3, { page: 'current'} )
						//     .data()
						//     .reduce( function (a, b) {
						//         return intVal(a) + intVal(b);
						//     }, 0 );

						// Update footer
						$(api.column(3).footer()).html(
							'Total WIP Cutting :' + total
						);
					}

				});
			});
		</script>
</body>

</html>
