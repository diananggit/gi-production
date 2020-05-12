<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="CoreUI Bootstrap 4 Admin Template">
	<meta name="author" content="Lukasz Holeczek">
	<meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
	<link rel="shortcut icon" href="<?php echo TEMPLATE_ASSETS; ?>img/big.png">

	<title>GIEMS</title>

	<!-- Icons -->
	<link href="<?php echo TEMPLATE_ASSETS; ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo TEMPLATE_ASSETS; ?>css/simple-line-icons.css" rel="stylesheet">

	<!-- Main styles for this application -->
	<link href="<?php echo TEMPLATE_ASSETS; ?>css/style.css" rel="stylesheet">
	<style>
		body {
			background-image: url("<?php echo TEMPLATE_ASSETS; ?>img/globalindo.jpg");
			height: 10%;

			/* Center and scale the image nicely */
			background-position: right;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.btn-primaryLogin {
			color: #fff;
			background-color: #000000;
			border-color: #20a8d8;
		}

		.btn-primaryLogin:hover {
			color: #fff;
			background-color: #cccc00;
			border-color: #187fa3;
		}

		.primaryLogin-primary:focus,
		.primaryLogin-primary.focus {
			box-shadow: 0 0 0 2px rgba(32, 168, 216, 0.5);
		}

		.primaryLogin.disabled,
		.primaryLogin:disabled {
			background-color: #20a8d8;
			border-color: #20a8d8;
		}

		.primaryLogin:active,
		.primaryLogin.active,
		.show>.primaryLogin.dropdown-toggle {
			color: #fff;
			background-color: #1985ac;
			background-image: none;
			border-color: #187fa3;
		}
	</style>

</head>

<body class="app flex-row align-items-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card-group mb-0">
					<div class="card cardLogin p-4">
						<div class="card-block">
							<div class="row">
								<div class="col-md-4">
									<img src="<?php echo TEMPLATE_ASSETS; ?>img/giems.png" width="450" height="80">
								</div>
							</div>
							<br />
							<?php if ($this->session->flashdata('msg')) { ?>
								<p><?php echo $this->session->flashdata('msg'); ?></p>
							<?php } ?>
							<form method="post" action="<?php echo base_url(); ?>index.php/administrator/login_submit">
								<div class="input-group mb-3">
									<span class="input-group-addon"><i class="icon-user"></i>
									</span>
									<input type="text" name="username" class="form-control" placeholder="Username" required>
								</div>
								<div class="input-group mb-4">
									<span class="input-group-addon"><i class="icon-lock"></i>
									</span>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="row">
									<div class="col-6">
										<button type="submit" class="btnLogin btn-primaryLogin px-4"> <b> Login </b></button>
									</div>
								</div>
								<br />
								<span style="text-align: center;">
									<h6>&copy; 2020 MIS - Pt. Globalindo Intimates.</h6>
								</span>
								<span style="text-align: center;">
									<h6>Jl. Raya Solo - Jogja, Mlese, Ceper, Klaten</h6>
								</span>
								<span style="text-align: center;">
									<h6>Jawa Tengah - Indonesia</h6>
								</span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap and necessary plugins -->
	<script src="<?php echo TEMPLATE_ASSETS; ?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo TEMPLATE_ASSETS; ?>bower_components/tether/dist/js/tether.min.js"></script>
	<script src="<?php echo TEMPLATE_ASSETS; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
