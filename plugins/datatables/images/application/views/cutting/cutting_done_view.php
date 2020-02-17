
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
  <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
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
                          <h3 class="card-title">Data Cutting</h3>
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
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


<script>
  var table;
  var detailTable;

  $(document).ready(function(){
    table = $('#cuttingTable').DataTable({
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

    $('#btnSaveSelected').click(function(){
      var selectedRows = detailTable.rows({selected: true}).data();
      // console.log('selectedRows: ', selectedRows[2].no_bundle);

      var dateNow = new Date();
      // var tgl = dateNow.getFullYear() + "-" + (dateNow.getUTCMonth()+1) + "-" + dateNow.getDate();
      var thn = dateNow.getFullYear();
      var bln = dateNow.getMonth()+1;
      var hr = dateNow.getDate();

      var tgl = thn + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString()) + "-" + (hr < 10 ? "0" + hr.toString() : hr.toString());

      $.each(selectedRows, function(i, item){
        var id = item.id_cutting_detail;

        var dataStr = {id, tgl};

        $.ajax({
          type:'POST',
          url: '<?php echo site_url("cutting/ajax_update_tgl_cutting"); ?>',
          data: {"dataStr" : dataStr},
          dataType: "json",
        });
      });

      Swal.fire({
        type: 'success',
        title: 'Data Bundle UPDATED!',
        showConfirmButton: false,
        timer: 1300
      });
      
      reloadDetailTable();
    });

    function reloadDetailTable(){
      detailTable.ajax.reload(null, false);
    }

  });

  function showDetail(idCutting){
    $('#modal_cutting_done').modal('show');

    detailTable = $('#showCuttingDoneTable').DataTable({
      // "autoWidth": true,      
      "processing": true,
      // "serverSide": true,      
      "order" :[],
      "destroy": true,
      "select" :{
        "style" : "multi"
      },
      "ajax": {
        "url" : "<?php echo site_url('cutting/ajax_get_by_id_cutting'); ?>/" + idCutting,
        "type": "POST",
        "dataType": "json",
        "dataSrc": ""
      },
      "columns":[
          {"data": "id_cutting_detail"},
          {"data": "size"},
          {"data": "qty"},
          {"data": "no_bundle"},
          {"data": "cutting_date", "visible": false},
      ],
    });
  }

// function updateCuttingDate(id){
//     var dateNow = new Date();
//     // var tgl = dateNow.getFullYear() + "-" + (dateNow.getUTCMonth()+1) + "-" + dateNow.getDate();
//     var thn = dateNow.getFullYear();
//     var bln = dateNow.getMonth()+1;
//     var hr = dateNow.getDate();

//     var tgl = thn + "-" + (bln < 10 ? "0" + bln.toString() : bln.toString()) + "-" + (hr < 10 ? "0" + hr.toString() : hr.toString());

//     var dataStr = {id, tgl};
//     $.ajax({
//         type:'POST',
//         url: '<?php echo site_url("cutting/ajax_update_tgl_cutting"); ?>',
//         data: {"dataStr" : dataStr},
//         dataType: "json",
//         success: function(dt){
//             if(dt > 0){
//                 Swal.fire({
//                     type: 'success',
//                     title: 'Data Bundle UPDATED!',
//                     showConfirmButton: false,
//                     timer: 1300
//                 });                
//             }
//         }
//     })
// }
    
</script>
</body>
</html>
