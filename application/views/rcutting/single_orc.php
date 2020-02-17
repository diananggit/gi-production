
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('_partials/css.php'); ?>
  <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
  

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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
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
                      <div class="card-header">
                          <h3 class="card-title">Cutting Report By Single ORC</h3>
                          <div class="card-tools">
                            <a href="<?php echo site_url('cutting'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
                          </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ORC:</label>
                              <select id="orc" name="orc" class="form-control select2" data-placeholder="Select an ORC"></select>
                            </div>
                            <div class="form-group">
                              <label>STYLE:</label>
                              <input type="text" id="style" name="style" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                              <label>COLOR:</label>
                              <input type="text" id="color" name="color" class="form-control" disabled>
                            </div>                            
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>QTY ORDER:</label>
                              <input type="text" id="buyer" name="buyer" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>DDD:</label>
                              <input type="number" id="comm" name="comm" class="form-control" max="4" min="1">
                            </div>
                          </div>

                        </div>
                        <hr/>
                        <!-- <div class="row"> -->
                          <table id="bundlingTable" class="table table-border table-striped">
                            <thead>
                              <th>DATE/th>
                              <th>CUTTINTG QTY</th>
                            </thead>
                            <tfoot>
                            <th>DATE/th>
                            <th>CUTTINTG QTY</th>
                            </tfoot>
                          </table>                          
                        <!-- </div> -->
                      </div>
                      
                  </div>
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
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view('_partials/js.php'); ?>
<?php $this->load->view('_partials/modal.php'); ?>
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('plugins/jquery-barcode/jquery-barcode.min.js'); ?>"></script> -->
<!-- <script src="<?php echo base_url('plugins/JSBarcode/JsBarcode.all.min.js'); ?>"></script> -->

<script>
  
  
    
</script>
</body>
</html>
