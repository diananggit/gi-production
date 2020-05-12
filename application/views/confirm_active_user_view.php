<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>

</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Content Wrapper. Contains page content -->
		<div class="content">
			<!-- Content Header (Page header) -->
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="error-page">
					<h2 class="headline text-warning">Oops!</h2>
					<div class="error-content">
						<h3>
							<i class="fa fa-warning text-warning"></i>Oops! This user already active
						</h3>
						<p>
							This user already active or used. Meanwhile you may return to <a href="<?php echo site_url('user'); ?>">Login again</a>
						</p>
					</div>

				</div><!-- /.error-page -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<?php $this->load->view('_partials/js.php'); ?>



</body>

</html>
