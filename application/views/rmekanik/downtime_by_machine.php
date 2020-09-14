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
					<div class="row">
						<!-- <div class="col-30"> -->
						<div class="card">
							<div class="card-header">
								<h3 class="card-title" style="color: #007bff;"><b>Intimates - Downtime Report</b></h3>
								<h3 id="dateSummary" class="text-primary"></h3>
							</div>
							<div class="card-body">
								<table id="sumaryTable" class="table table-bordered table-striped" style="width: Auto">
									<thead>
										<tr>
											<td class='bg-secondary'>M.Code</td>
											<td class='bg-secondary'>Merk</td>
											<td class='bg-secondary'width=100px>Line</td>
											<td class='bg-secondary' width=60px>Date</td>
											<td class='bg-secondary' width= 150px>Repaired by</td>
											<td class='bg-secondary' width= 110px>Symptom</td>
											<td class='bg-secondary' >Start</td>
											<td class='bg-secondary'>End</td>
											<td class='bg-secondary'>Downtime</td>
											
											<!-- <td>PACK H-1</td>
                                    <td>CUM PACKED QTY</td>
                                    <td>WIP PACKING</td>                                     -->
										</tr>
									</thead>
									<tbody>
										<?php foreach ($downtime as $dt) : ?>
											<tr>
												<td>
													<?= $dt['barcode_machine'] ?>
												</td>
												<td>
													<?= $dt['machine_brand'] ?>
												</td>
												<td>
													<?= $dt['line'] ?>
												</td>
												<td>
													<?= $dt['tgl'] ?>
												</td>
												<td>
													<?= $dt['Nama'] ?>
												</td>
												<td>
													<?= $dt['sympton'] ?>
												</td>
												<td>
													<?= $dt['start_repairing'] ?>
												</td>
												<td>
													<?= $dt['end_repairing'] ?>
												</td>
												<td>
													<?= $dt['DownTime'] ?>
												</td>
											</tr>
										<?php endforeach ?>
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
		$(document).ready(function() {
			var table = $('#sumaryTable').DataTable({
				"scrollY": 200,
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
		});
	</script>
</body>

</html>