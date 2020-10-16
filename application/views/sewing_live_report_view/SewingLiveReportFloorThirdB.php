<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSS LINE -->
  <?php $this->load->view('_partials/css'); ?>
  <?php $this->load->view('production_planning/css'); ?>

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

<?php 
     $URLIframe = 'http://192.168.10.81/MEDAN-v2/index.php/sewing/Lt3/ScreenB' ;
?>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="container-fluid">
                <h4 style="text-align: left; color: #007bff" >
                    &nbsp;<i class="fa fa-youtube-play text-danger nav-icon"></i>
                    Third Floor Screen B
                    <span>
                        <a style="float: right; color: #000000;" href=<?php echo $URLIframe ?> target="_blank">
                            <i class="fa fa-expand text-succes nav-icon"></i>
                        </a>
                    </span>
                </h4>
                <iframe src=<?php echo $URLIframe ?> frameborder="1" 
                    style="scroll: hidden; overflow: hidden; height: 900px; width: 100%; " 
                    allowfullscreen
                >
                    <p>Your browser does not support iframes.</p>
                </iframe>
        <!-- Small boxes (Stat box) -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
<?php $this->load->view('_partials/footer.php'); ?>

</body>
</html>

