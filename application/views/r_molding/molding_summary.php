<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Summary Molding | Dashboard</title>
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
					</div><!-- /.row -->
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
								<h3 class="card-title"><b>Intimates - Summary Molding Report</b></h3>
								<h3 id="dateSummary" class="text-primary"></h3>
							</div>
							<div class="card-body">
								<table id="sumaryTable" class="table table-bordered table-striped" style="width: 100%">
									<thead>
										<tr>
											<td class='bg-danger'>ORC#............</td>
											<td class='bg-danger'>Qty_Order</td>
											<td class='bg-success'>Qtyin_Outer</td>
											<td class='bg-success'>Qtyout_outer</td>
											<td class='bg-success'>wip_outer</td>
											<td class='bg-success'>bal_outer</td>
											<td class='bg-warning'>Qtyin_mid</td>
											<td class='bg-warning'>Qtyout_mid</td>
											<td class='bg-warning'>wip_mid</td>
											<td class='bg-warning'>bal_mid</td>
											<td class='bg-primary'>Qtyin_linn</td>
											<td class='bg-primary'>Qtyout_linn</td>
											<td class='bg-primary'>wip_linning</td>
											<td class='bg-primary'>Balance_lin</td>
											<!-- <td>PACK H-1</td>
                                    <td>CUM PACKED QTY</td>
                                    <td>WIP PACKING</td>                                     -->
										</tr>
									</thead>
									<tbody>
										<?php foreach ($molding as $sm) : ?>
											<tr>
												<td>
													<?php echo $sm->orc ?>
												</td>
												<td>
													<?php echo $sm->qty_order ?>
												</td>
												<td>
													<?php echo $sm->qtyin_outer ?>
												</td>
												<td>
													<?php echo $sm->qtyout_outer ?>
												</td>
												<td>
													<?php echo $sm->wip_outer ?>
												</td>
												<td>
													<?php echo $sm->Bal_outer ?>
												</td>
												<td>
													<?php echo $sm->qtyin_mid ?>
												</td>
												<td>
													<?php echo $sm->qtyout_mid ?>
												</td>
												<td>
													<?php echo $sm->wip_mid ?>
												</td>
												<td>
													<?php echo $sm->Bal_mid ?>
												</td>
												<td>
													<?php echo $sm->qtyin_linn ?>
												</td>
												<td>
													<?php echo $sm->qtyout_linn ?>
												</td>
												<td>
													<?php echo $sm->wip_linning ?>
												</td>
												<td>
													<?php echo $sm->Balance_Lin ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
									<tfoot>
										<!-- <tr>
                                <th colspan="18" style="text-align:right">Total:</th>
                                     <th></th> -->
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="card-tools">
							<a href="<?php echo site_url('reportdaily'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
						<!-- </div> -->
					</div>
					<!-- </div> -->
				</div>
				<!-- <div class="card-tools">
          <a href="#" type="button" id="singleOrc" class="btn btn-primary" class="fa fa-upload"><i ></i> OK</a>
        </div> -->

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