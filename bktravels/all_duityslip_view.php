<?php
include('config.php');
function month_list(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	month
	 FROM months
       ");
	//$stmt->bind_param("s",$duty_of);
	$stmt->execute();
	$stmt->bind_result($id,$name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'month'=>$name);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "a";
       }
}
function corporate_list($status){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	name
	 FROM aacorporate
	 WHERE status= ?;
       ");
	$stmt->bind_param("s",$status);
	$stmt->execute();
	$stmt->bind_result($id,$name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'name'=>$name);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "a";
       }
}
  function fetchdutyslip(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
	date,
	dityslipno,
	bookedby,
	driver_name,
	totalkm,
	status,
	guest_name,
	vehicle_no,
	total_time,
	vehicle_name,
	drop_location,
	owner_slip_no,
	o_p,
	travel_advance,
	guest_advance,
	toll,
	netadvance,
	cash_return
      FROM duitysliprecord ORDER BY dityslipno DESC
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$date,$dityslipno,$bookedby,$driver_name,$totalkm,$status,$guest_name,$vehicle_no,$total_time,$vehicle_name,$drop_location,$owner_slip_no,$o_p,$travel_advance,$guest_advance,$toll,$netadvance,$cash_return);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'date'=>$date,'dityslipno'=>$dityslipno,'bookedby'=>$bookedby,'driver_name'=>$driver_name,'totalkm'=>$totalkm,'status'=>$status,'guest_name'=>$guest_name,'vehicle_no'=>$vehicle_no,'total_time'=>$total_time,'vehicle_name'=>$vehicle_name,'drop_location'=>$drop_location,'owner_slip_no'=>$owner_slip_no,'o_p'=>$o_p,'travel_advance'=>$travel_advance,'guest_advance'=>$guest_advance,'toll'=>$toll,'netadvance'=>$netadvance,'cash_return'=>$cash_return);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "";
       }
  }











$corporate_list = corporate_list(1);
$month_list = month_list();
$fetchdutyslip = fetchdutyslip();

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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Dutyslip Info</h6>
										<br>
										
										
									<!--<div class="search_div">
							<form method="post" action="">
								<div class="col-md-3">
								
									<select name="month" id="months" class="form-control">
									<option value="">Select Month</option>
									<?php foreach($month_list as $month_list){ ?>
									<option value="<?php echo($month_list['id']); ?>"><?php echo($month_list['month']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<div class="col-md-3">
									<select name="corporate_name" id="crname" class="form-control">
									<option value="">Select Corporate Name</option>
									<?php foreach($corporate_list as $corporate_list){ ?>
									<option value="<?php echo($corporate_list['name']); ?>"><?php echo($corporate_list['name']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<button type="submit" name="serach_by_corporate" id="serach_by_corporate" class="form-control" style="width: 50px; border: none"><i class="fa fa-search"></i></button>
							</form>
						</div>-->
						 
						 
							 <hr class="light-grey-hr"/>
							 				
									
									
													<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php  
                          if(!empty($fetchdutyslip)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Guest Name</th>
															<th>Vehicle Name</th>
															<th>Dutyslip No</th>
															<th>K.M</th>
															<th>Hour</th>
															<th>Vehicle</th>
															<th>Place</th>
															<th>Ownerslip No</th>
															<th>O/P</th>
															<th>Total Advance</th>
															<th>Toll</th>
															<th>Net Advance</th>
															<th>Cash Rerturn</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
										 					$i = 1;
                              foreach ($fetchdutyslip as $v1) {
										 					?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $v1['date'];?></td>
															<td><?php echo $v1['guest_name'];?></td>
															<td><?php echo $v1['vehicle_no'];?></td>
															<td><?php echo $v1['dityslipno'];?></td>
															<td><?php echo $v1['totalkm'];?></td>
															<td><?php echo $v1['total_time'];?></td>
															<td><?php echo $v1['vehicle_name'];?></td>
															<td><?php echo $v1['drop_location'];?></td>
															<td><?php echo $v1['owner_slip_no'];?></td>
															<td><?php echo $v1['o_p'];?></td>
															<td><?php echo 'T - '. $v1['guest_advance'].'   G - '. $v1['travel_advance'];?></td>
															<td><?php echo $v1['toll'];?></td>
															<td><?php echo $v1['netadvance'];?></td>
															<td><?php echo $v1['cash_return'];?></td>
															<td class="text-nowrap">
															<?php
																if($v1['status']==0){ 
																?>
																	<a href="dutyslip_print_relax.php?printid=<?php echo $v1['dityslipno']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
																<?php	
																}
								  								if($v1['status']==1){ 
																?>
								  									<a href="dutyslip_print_relax_corporate.php?printid=<?php echo $v1['dityslipno']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
																<?php	
																}
																?>
																
																
																
																
																
																
																<?php
																if($v1['status']==0){ 
																?>
																	<a href="edit_dutyslip.php?name=<?php echo $v1['dityslipno']?>" o data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-edit"></i> </a>
																<?php	
																}
								  								if($v1['status']==1){ 
																?>
								  									<a href="edit_dutyslip_corporate.php?name=<?php echo $v1['dityslipno']?>" o data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-edit"></i> </a>
																<?php	
																}
																?>
																
																
																
																
																
																
																
																
																
																
																
																
																<?php
																if($v1['status']==0){ 
																?>
																	<a onClick="delete_buyer(<?php echo $v1['dityslipno']?>)" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a>
																<?php	
																}
								  								if($v1['status']==1){ 
																?>
								  									<a onClick="delete_buyer1(<?php echo $v1['dityslipno']?>)" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a>
																<?php	
																}
																?>
															 </td>
														</tr>
															<?php $i++; } ?>
													</tbody>
                        <?php } else echo "No data Found"; ?>
												</table>
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
	
		function delete_buyer(val){
			
			$.ajax({
			type: "POST",
			url: "ajax_delete_dutyslip_all.php",
			data:{id:val,name:"duityslip"},
			success: function(data){
				//alert(data);
        swal("Good Job","The Record is Successfully Removed",'success');
				$("#msg").html(data);
				$('#pks1').load(document.URL +  ' #pks1');
		}
			});    
		}
function delete_buyer1(val){
			
			$.ajax({
			type: "POST",
			url: "ajax_delete_dutyslip_all.php",
			data:{id:val,name:"duityslip_corporate"},
			success: function(data){
				//alert(data);
       swal("Good Job","The Record is Successfully Removed",'success');
				$("#msg").html(data);
				$('#pks1').load(document.URL +  ' #pks1');
		}
			});
		}

	</script> 

	</body>

</html>

