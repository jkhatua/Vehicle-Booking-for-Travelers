<?php
include('config.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}

  function fetchdutyslip(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
    dutyslip_slno,
    duty_of,
    report_at,
    booked_by,
    vehicle_no,
    vehicle_id,
    vehicle_name,
    driver_name,
    place_from,
    place_to,
    start_date,
    starting_km,
    start_time,
    closing_km,
    closing_time,
    closing_date,
    total_km,
    total_time,
    charging_type,
    ac_nonac,
    toll_gate,
    parking_charge,
    advance_paid_client,
    advance_paid_travel
      FROM duty_slip
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'dutyslip_slno'=>$dutyslip_slno,'duty_of'=>$duty_of,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'charging_type'=>$charging_type,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "";
       }
  }
	$sessionname = $_SESSION['login_user'];
	if($sessionname){

?>
<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>

	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper theme-4-active pimary-color-red">

			<!-- Top Menu Items -->
			<?php include("include/top_nav.php"); ?>
			<!-- /Top Menu Items -->

			<!-- Left Sidebar Menu -->
			<?php include("include/nav.php"); ?>
			<!-- /Left Sidebar Menu -->

			<!-- Right Sidebar Menu -->
			<?php include("include/dash_supplier.php"); ?>
			<!-- /Right Sidebar Menu -->

			<!-- Right Setting Menu -->
			<?php include("include/theme_color.php"); ?>
			<!-- /Right Setting Menu -->

			<!-- Right Sidebar Backdrop -->
			<div class="right-sidebar-backdrop"></div>
			<!-- /Right Sidebar Backdrop -->

			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">

					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Manage Dutyslip</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span> Dutyslip Details</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

					</div>
					<!-- /Title -->

					<div id="msg"></div>

					<!-- Row -->
					<div id="form11">
          </div>

					<!-- /Row -->

					<!-- Row -->
					<div class="row" id="pks1">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
                    <div class="pull-right">
    									<a href="#" class="pull-left inline-block full-screen mr-15">
    										<i class="zmdi zmdi-fullscreen"></i>
    									</a>
    								</div>
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Dutyslip Info<a href="dutyslip_corporate.php" style="float: right;margin-right: 60%">View Corporate Dutyslip</a></h6>

                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php $fetchdutyslip = fetchdutyslip(1); 
                          if(!empty($fetchdutyslip)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Booked By</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Booked By</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
										 					$i = 1;
                              $fetchdutyslip = fetchdutyslip(1);
                              foreach ($fetchdutyslip as $v1) {
										 					?>
														<tr>
															<td>#<?php echo $i;?></td>
															<td><?php echo $v1['start_date'];?></td>
															<td><?php echo $v1['dutyslip_slno'];?></td>
															
															<td><?php echo $v1['booked_by'];?></td>
															<td><?php echo $v1['driver_name'];?></td>
															<td><?php echo $v1['total_km'];?></td>
															
															
															
															<td class="text-nowrap"><a href="dutyslip_print_relax.php?printid=<?php echo $v1['id']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a><a onClick="delete_buyer(<?php echo $v1['id'];?>);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
														</tr>
															<?php $i++; } ?>
													</tbody>
                        <?php } else echo "No data Found"; ?>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

				<!-- Footer -->
				<?php include("include/footer.php"); ?>
				<!-- /Footer -->

			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->

		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
  <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script>
	function edit(val) {
		$.ajax({
		type: "POST",
		url: "ajax_edit_dutyslip.php",
		data:'id='+val,
		success: function(data){
			$("#form11").html(data);
			//$('#pks1').load(document.URL +  ' #pks1');

		}
		});
		}

		function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_dutyslip.php",
			data:'id='+val,
			success: function(data){
        swal("Good Job","The Supplier is Successfully Removed",'success');
				$("#msg").html(data);
				$('#pks1').load(document.URL +  ' #pks1');
		}
			});
		}

	</script> 

	</body>

</html>
<?php } ?>
