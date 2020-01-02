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

  function fetchownercarcharges($status){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      vehicle_name,
      charging_type,
      day_charge,
      night_holt_charge,
	  km_cover_in_one_litre,
      extra_hour_charges,
      price_per_km,
      detaintion_charges
      FROM customercarcharges
      WHERE status = ?
       ");
       $stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$detaintion_charges);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'vehicle_name'=>$vehicle_name,'charging_type'=>$charging_type,'day_charge'=>$day_charge,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'extra_hour_charges'=>$extra_hour_charges,'price_per_km'=>$price_per_km,'detaintion_charges'=>$detaintion_charges);
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
							<h5 class="txt-dark">Add Car Charges For Owner</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Add Car Charges For Owner</span></li>
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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add Car Charges For Owner</h6>

                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php $fetchResult = fetchownercarcharges(1); 
                          if(!empty($fetchResult)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Vehicle Name</th>
															<th>Charging Type</th>
															<th>price/km</th>
															<th>Night Holt Charge</th>
															<th>Day Charge</th>
															
															<th>Km Cover in 1 Lt</th>
															<th>hourly chages</th>
															<th>Detaintion chages</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Vehicle Name</th>
															<th>Charging Type</th>
															<th>price/km</th>
															<th>Night Holt Charge</th>
															<th>Day Charge</th>
															
															<th>Km Cover in 1 Lt</th>
															<th>hourly chages</th>
															<th>Detaintion chages</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
										 					$i = 1;
                              $fetchResult = fetchownercarcharges(1);
                              foreach ($fetchResult as $v1) {
										 					?>
														<tr>
															<td>#<?php echo $i;?></td>
															<td><?php echo $v1['vehicle_name'];?></td>
															<td><?php echo $v1['charging_type'];?></td>
															<td><?php echo $v1['price_per_km'];?></td>
															<td><?php echo $v1['night_holt_charge'];?></td>
															<td><?php echo $v1['day_charge'];?></td>
															
															<td><?php echo $v1['km_cover_in_one_litre'];?></td>
															<td><?php echo $v1['extra_hour_charges'];?></td>
															<td><?php echo $v1['detaintion_charges'];?></td>
															
															<td class="text-nowrap"><a onClick="edit(<?php echo $v1['id'];?>);" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a onClick="delete_buyer(<?php echo $v1['id'];?>);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
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
		url: "ajax_edit_customer_car_charges.php",
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
			url: "ajax_delete_customer_car_charges.php",
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
