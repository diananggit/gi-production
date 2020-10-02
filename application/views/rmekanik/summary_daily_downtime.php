<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Downtime | Dashboard</title>
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
					<h2 style="text-align: center; color: #007bff"><b>Intimates - Downtime Report</b></h3>
					</br>
					<div class="form-group">
					<div class="input-group">
							<div class="input-group-prepend">
							</div>
							<div class="col-md-2">
								<input type="text" name="date" id="date" class="datepicker form-control">
							</div>
							
						</div>
						</br>
						<div class="card" >
							<div class="card-body">
								<table id="dailyTable" class="table table-bordered table-striped" style="width: Auto; ">
									<thead>
										<tr>
											<td class='bg-secondary'width=100px>Line</td>
											<td class='bg-secondary'>Merk</td>
											<td class='bg-secondary' width=70px>Date</td>
											<td class='bg-secondary' width= 150px>Attended Mechanic</td>
											<td class='bg-secondary' width= 110px>Symptom</td>
											<td class='bg-secondary' >Start Time</td>
											<td class='bg-secondary'>Respond Time</td>
											<td class='bg-secondary'>Finished Time</td>
											<td class='bg-secondary'>Respon Duration</td>
											<td class='bg-secondary'>Repair Duration</td>
											<td class='bg-secondary'>Total Duration</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
										<th colspan="11" style="text-align:right">Total:</th>
											<!-- <th></th> -->
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="card" >
							<div class="card-body">
								
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


	<script type="text/javascript">
	var table
	// $(".select2").select2();

		$(document).ready(function() {
			table = $('#dailyTable').DataTable({
				// "scrollY": 200,
				"scrollX": true,
				dom: 'Blfrtip',
				lengthMenu: [
					[10, 25, 50, 100, 200, 300, 400],
					[10, 25, 50, 100, 200, 300, 400]
				],
				buttons: [
					'excel', 'csv'
				],

				"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
			//computing column Total of the complete result
			var respon = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

				var repair = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

				var total = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

				// update footer by showing the total with the reference of the table
				$(api.column(0).footer()).html('');
				$(api.column(1).footer()).html('');
				$(api.column(2).footer()).html('');
				$(api.column(3).footer()).html('');
				$(api.column(4).footer()).html('');
				$(api.column(5).footer()).html('');
				$(api.column(6).footer()).html('');
				$(api.column(7).footer()).html('Total');
				$(api.column(8).footer()).html(respon);
				$(api.column(9).footer()).html(repair);
				$(api.column(10).footer()).html(total);
 
        },
		"processing": true,
        // "serverSide": enable,
        // "ajax": "Downtime.php"
			
			});

			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
			});

            //search by tanggal
			$('#date').change(function(){
				tgl_waiting = $(this).val()
                 $.ajax({
                     url: '<?php echo site_url("ReportSummaryDowntime/get_datas"); ?>/' + tgl_waiting,
                     type: 'GET',
                     dataType: 'json',
                 }).done(function(data){
					
                     table.clear();
					 $.each(data, function(i,item){
						var hms = item.respon_duration;   
						var as = hms.split(':'); 
						// console.log('hms', hms);
						var respon = (+as[0]) * 60 + (+as[1]);
						console.log('respon', respon);

						var times = item.repair_duration;
						var bs = times.split(':');
						var repair = (+bs[0]) * 60 + (+bs[1]);

						var total = [respon + repair];
						console.log('total', total);

						
						table.row.add([
							item.line,
							item.machine_brand,
							item.tgl_waiting,
							item.Nama,
							item.sympton,
							item.start_waiting,
							item.start_repairing,
							item.end_repairing,
							respon,
							repair,
							total,
						 ]).draw();
					 })
                 })
				
					
				});	
			// })

		});
	</script>
</body>

</html>