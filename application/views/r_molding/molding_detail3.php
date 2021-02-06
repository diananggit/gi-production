<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php $this->load->view('_partials/css.php'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title" style="color: #007bff;"><b>Detail Molding Shift 3</b></h3>
                      </div>
                      <div class="card-body">
                          <table id="Molding1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Machine</th>
                                    <th>Style</th>
                                    <th>Orc</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>No Bundle</th>
                                    <th>Time</th>
                                    <th>Time Periode</th>
                                    <th>Output Outer</th>
                                    <th>Output Midmold</th>
                                    <th>Output Linning</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            
                            </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->

</div>

  <!-- jQuery -->
  <?php $this->load->view('_partials/js.php'); ?>

  <script type="text/javascript">

  $(document).ready(function(){
    // var table = $('#Molding1').DataTable({
    //   dom: 'Blfrtip',
    //   lengthMenu: [[100,200,300,400], [100,200,300,400]],
    //   buttons: [
    //     'excel','print'
    //   ],
    //   "lengthChange": false,
   
    // });
// function slideOne(){
  // showDetail();

  function showDetail(style,no_mesin,size,orc){
    const getDataMolding= [];
    // const no_mesin= [];
    // const size =[];
    // const orc = [];

    $.ajax({
        url:"<?php echo site_url('report_molding/ReportMoldingShift3/getDataTotalShift3');?>",  
        method:"GET", 
        async: false, 
        dataType: 'json',
        data: {
          style : style,
          no_mesin : no_mesin,
          size : size,

        },
        success:function(data)  
        {  
          $.each(data, function(key, value){
           getDataMolding.push(value);
           var tr = $("<tr style= 'font-weight:bold;'/>")
            $.each(value, function(k,v){
              tr.append(
                $("<td />", {
                  html: v
                })[0].outerHTML
              );
              $("table tbody").append(tr)
            })
          });
                
        }, error: function(req, err) {
          console.log(err);
        } 
    })
    return getDataMolding;
  }

// }

    
  
});

  
   
  </script>
</body>

</html>