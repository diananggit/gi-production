<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Machine Analys | Dashboard</title>
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
								<h3 class="card-title text-center" style="color: #007bff;"><b>Machine Downtime Volume Analisys</b></h3>
								<h3 id="dateSummary" class="text-primary"></h3>
							</div>
							<div class="card-body">
								<table id="sumaryTable" class="table table-bordered table-striped" style="width: Auto">
									<thead>
										<tr>
											<th class='bg-primary'>Type</th>
											<th class='bg-primary'>Brand</th>
											<th class='bg-primary'>S.Number</th>
											<?php
											$month = 9;
											$year  = 2020;

											for ($d=1; $d<=31; $d++)
											{
												$time=mktime(9, 0, 0, $month, $d, $year);
												if(date('m',$time)==$month)
												echo "<td class='bg-secondary'>".date('d',$time)."</td>";

											}
											?>
											<!-- <td>PACK H-1</td>
                                    <td>CUM PACKED QTY</td>
                                    <td>WIP PACKING</td>                                     -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($analisys as $an): ?>
											<tr>
												<td><?= $an['machine_type']?></td>
												<td><?= $an['machine_brand']?></td>
												<td><?= $an['machine_sn']?></td>
												<?php
											$month = 9;
											$year  = 2020;

											for ($d=1; $d<=31; $d++)
											{
												$time=mktime(9, 0, 0, $month, $d, $year);
												if(date('m',$time)==$month)
												echo "<td>".date('d',$time)."</td>";

											}
											?>
											</tr>
											<?php endforeach?>
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