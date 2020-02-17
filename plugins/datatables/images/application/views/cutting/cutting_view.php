
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
                          <h3 class="card-title">Data Cutting</h3>
                          <div class="card-tools">
                            <a href="<?php echo site_url('cutting/add_cutting'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
                          </div>
                      </div>
                      <div class="card-body">
                          <table id="cuttingTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <th>ID</th>
                                <th>ORC</th>
                                <th>STYLE</th>
                                <th>COLOR</th>
                                <th>BUYER</th>
                                <th>COMM</th>
                                <th>SO</th>
                                <th>QTY</th>
                                <th>BOXES</th>
                                <th>PREPARE ON</th>
                                <th>Actions</th>
                            </thead>
                            <tfoot>
                              <th>ID</th>
                              <th>ORC</th>
                              <th>STYLE</th>
                              <th>COLOR</th>
                              <th>BUYER</th>
                              <th>COMM</th>
                              <th>SO</th>
                              <th>QTY</th>
                              <th>BOXES</th>
                              <th>PREPARE ON</th>
                              <th>Actions</th>                                
                            </tfoot>
                          </table>
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

<script>
  $(document).ready(function(){
    var table = $('#cuttingTable').DataTable({
      "autoWidth": true,      
      "processing": true,
      "serverSide": true,      
      "order" :[],
      "ajax": {
        "url" : "<?php echo site_url('Cutting/ajax_list'); ?>",
        "type": "POST",
        "dataType": "json",
      },
      "columnDefs": [
        {
          "tergets" : [-1],
          "defaultContent": '',
          "orderable": false
        },
      ]
    });
  });

  function showDetail(idCutting){
    $('#modal_show_bundle').modal('show');

    var detailTable = $('#showBundleTable').DataTable({
      // "autoWidth": true,      
      // "processing": true,
      // "serverSide": true,      
      // "order" :[],
      "destroy": true,
      "ajax": {
        "url" : "<?php echo site_url('cutting/ajax_get_by_id_cutting'); ?>/" + idCutting,
        "type": "POST",
        "dataType": "json",
        "dataSrc": ""
      },
      "columns": [
        {"data": "id_cutting_detail"},
        {"data": "size"},
        {"data": "qty"},
        {"data": "no_bundle"},
      ],
    });
   

  }  
    
</script>
</body>
</html>
