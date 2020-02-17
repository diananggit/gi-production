
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
                          <h3 class="card-title">Data Cutting</h3>
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
                              <label>BUYER:</label>
                              <input type="text" id="buyer" name="buyer" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>COMM:</label>
                              <input type="number" id="comm" name="comm" class="form-control" max="4" min="1">
                            </div>
                            <div class="form-group">
                              <label>SO:</label>
                              <input type="text" id="so" name="so" class="form-control">
                            </div>                                                        
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>QUANTITY(PCS):</label>
                              <input type="number" id="qty" name="qty" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                              <label>BUNDLES QTY(BOX):</label>
                              <input type="number" id="boxes" name="boxes" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                              <label>PREPARE ON:</label>
                              <input type="text" id="prepare_on" name="prepare_on" class="form-control theDate">
                            </div>

                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>
                                <input type="checkbox" class="flat-red" id="outer_mold" name="outer_mold">
                                Outer Mold
                              </label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>
                                <input type="checkbox" class="flat-red" id="mid_mold" name="mid_mold">
                                Mid Cover Mold
                              </label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>
                                <input type="checkbox" class="flat-red" id="linning_mold" name="linning_mold">
                                Linning Mold
                              </label>
                            </div>
                          </div>                          

                        </div>
                        <hr/>
                        <!-- <div class="row"> -->
                          <table id="bundlingTable" class="table table-border table-striped">
                            <thead>
                              <th>Size</th>
                              <th>QTY</th>
                              <th>NO BUNDLE</th>
                              <th class="th-barcode">KODE BARCODE</th>
                            </thead>
                            <tfoot>
                              <th>Size</th>
                              <th>QTY</th>
                              <th>NO BUNDLE</th>
                              <th class="th-barcode">KODE BARCODE</th>
                            </tfoot>
                          </table>                          
                        <!-- </div> -->
                      </div>
                      <div class="card-footer">
                        <button type="button" id="btnAddBundle" class="btn btn-success">Add Bundle</button>
                        <button type="button" id="btnSaveBundle" class="btn btn-warning">Save Bundle</button>
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
<script src="<?php echo base_url('plugins/jquery-barcode/jquery-barcode.min.js'); ?>"></script>

<script>
  
  $(document).ready(function(){
    var dateNow = new Date();
    var orc;
    var qty;
    var sisaQty;
    var idx = 0;
    var boxCount = 0;
    var dataTable;
    var outerMoldChecked;
    var midMoldChecked;
    var linningMoldChecked;    

    // $('table thead th[class]').each(function(idx){
    //   $('table tbody td:nth-child(' + ($(this).index() + 1) + ')').addClass(this.className);
    // });

    $(".select2").select2();

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })    

    var bundlingTable = $('#bundlingTable').DataTable();


    $('.theDate').datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      language: "id",
      autoclose: true,
      todayHighlight: true
    });

    loadOrc();

    function loadOrc(){
      $('#orc').empty();
      $.ajax({
        url: '<?php echo site_url("cutting/ajax_get_order_all"); ?>',
        type: 'GET',
        dataType: 'json',
        success: function(dt){
          $.each(dt, function(i, item){
            $('#orc').append($('<option>', {
              value: item.orc,
              text: item.orc
            })).trigger('change')
          })
        }
      });
    }

    $('#orc').change(function(){
      orc = $(this).val()
      $.ajax({
        url: '<?php echo site_url("cutting/ajax_get_by_orc"); ?>/' + orc,
        type: 'GET',
        dataType: 'json',
        success: function(dt){
          $('#style').val(dt.style);
          $('#color').val(dt.color);
          $('#qty').val(dt.qty);
          qty = dt.qty;
          $('#bundles_qty').val("0");
        }

      });
    });

    $("#btnAddBundle").click(function(){
      addBundle();
    })

    function addBundle(){
      $('#modal_add_bundle').modal('show');
      $('#size').empty();
      loadSize();
    }

    function loadSize(){
      $.ajax({
        type: 'GET',
        url: '<?php echo site_url("cutting/ajax_get_all_size"); ?>',
        dataType: 'json',
        success: function(dt){
          $.each(dt, function(i, item){
            $('#size').append($('<option>', {
              value: item.name,
              text: item.name
            })).trigger('change')
          })
        }
      })
    }

    $('#btnCreateBundle').click(function(){
      var pcs_each_bundle = $('#pcs_each_bundle').val();

      var qty = $('#qty_modal').val();

      var box = Math.floor(qty / pcs_each_bundle);

      var selectedSize = $('#size').select2('data');

      var zero = "0";

      var bundleArr = [];

      var strIdx;

      var bundleNo;

      for(var x = 0 ; x < box; x++){
        idx++;
        strIdx = idx.toString();
        bundleNo = zero.repeat(4-strIdx.length) + strIdx + "(" + pcs_each_bundle.toString() + ")";

        bundleArr.push({
          'size' : selectedSize[0].text, 
          'qty': qty, 
          'no': bundleNo, 
          'barcode': orc + "-" + bundleNo
        });

      }
      // console.log('bundleArr: ', bundleArr);

      var sisa = Math.round(qty % pcs_each_bundle);

      if(sisa > 0){
        idx++
        strIdx = idx.toString();
        bundleNo = zero.repeat(4-strIdx.length) + idx.toString() + "(" + sisa.toString() + ")";
        bundleArr.push({
          'size' : selectedSize[0].text, 
          'qty': qty, 
          'no': bundleNo, 
          'barcode': orc + "-" + bundleNo
        });
        
        
      }

      boxCount += bundleArr.length;
      $('#boxes').val(boxCount);

      $.each(bundleArr, function(i, item){
        bundlingTable.row.add([
          item.size,
          item.qty,
          item.no,
          // $('.th-barcode > $td').barcode(item.barcode, "code128"),
          item.barcode
        ]).draw();
      });

      Swal.fire({
        type: 'success',
        title: 'Bundle Created',
        showConfirmButton: false,
        timer: 1500
      });

    });

    $('#btnSaveBundle').click(function(){
      dataTable = bundlingTable.rows().data();

      var style = $('#style').val();
      var color = $('#color').val();
      var buyer = $('#buyer').val();
      var comm = $('#comm').val();
      var so = $('#so').val();
      var qty = $('#qty').val();
      var boxes = $('#boxes').val();
      var prepare_on = $('#prepare_on').val();
      outerMoldChecked = $('#outer_mold').prop('checked');
      midMoldChecked = $('#mid_mold').prop('checked') ;
      linningMoldChecked = $('#linning_mold').prop('checked');      

      var dataStrCutting = {
        'orc' : orc, 
        'style' : style, 
        'color' : color, 
        'buyer' : buyer, 
        'comm': comm,
        'so': so,
        'qty' : qty,
        'boxes' : boxes,
        'prepare_on' : prepare_on
      }

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url("Cutting/ajax_save_cutting"); ?>',
        data: {'dataStrCutting' : dataStrCutting},
        dataType: 'json',
        success: function(valBack){
          if(valBack != null){
            saveDetail(valBack, dataTable, outerMoldChecked, midMoldChecked, linningMoldChecked);
          }
        }
      });
    });

  });
  
  function saveDetail(idCutting, dtTable, outer, mid, linning){

    $.each(dtTable, function(i, item){
      var dataCuttingDetail = {
        'id_cutting' : idCutting, 
        'size' : item[0], 
        'qty' : item[1], 
        'no_bundle' : item[2], 
        'kode_barcode' : item[3],
        'outermold_barcode' : (outer == true ? "O" + $('#style').val() : "" ),
        'midmold_barcode' : (mid == true ? "M" + $('#style').val() : "" ),
        'linningmold_barcode' : (linning == true ? "L" + $('#style').val() : "" )
      };

      $.ajax({
        type: 'POST',
        url : '<?php echo site_url("cutting/ajax_save_detail_cutting"); ?>',
        data : {'dataCuttingDetail' :dataCuttingDetail},
        dataType: 'json',
        success: function(rst){
          console.log(rst);
        }
      });
    });

    Swal.fire({
      type: 'success',
      title: 'Save data success!!',
      showConfirmButton: false,
      timer: 1500
    });

    bundlingTable.clear().draw();

  }
    
</script>
</body>
</html>
