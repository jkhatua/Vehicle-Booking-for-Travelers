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

  function fetchemployee($status){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      emp_catagory,
      emp_name,
      father_name,
      contact_no,
      emailid,
      birth_date,
      joining_date,
      aadhar_cardno,
      dl_no,
      address
      FROM employee_details
      WHERE status = ?
       ");
       $stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'emp_catagory'=>$emp_catagory,'emp_name'=>$emp_name,'father_name'=>$father_name,'contact_no'=>$contact_no,'emailid'=>$emailid,'birth_date'=>$birth_date,'joining_date'=>$joining_date,'aadhar_cardno'=>$aadhar_cardno,'dl_no'=>$dl_no,'address'=>$address);
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
							<h5 class="txt-dark">Manage Employee</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Employee Details</span></li>
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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Employee's Info</h6>

                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php $fetchResult = fetchemployee(1); 
                          if(!empty($fetchResult)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Designation</th>
															
															<th>Father Name</th>
															<th>Contact No</th>
															<th>Email</th>
															
															<th>joining</th>
															<th>Adhar No</th>
															<th>D.L No</th>
															<th>Address</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Designation</th>
															
															<th>Father Name</th>
															<th>Contact No</th>
															<th>Email</th>
															
															<th>joining</th>
															<th>Adhar No</th>
															<th>D.L No</th>
															<th>Address</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
										 					$i = 1;
                              $fetchResult = fetchemployee(1);
                              foreach ($fetchResult as $v1) {
										 					?>
														<tr>
															<td>#<?php echo $i;?></td>
															<td><?php echo $v1['emp_name'];?></td>
															<td><?php echo $v1['emp_catagory'];?></td>
															
															<td><?php echo $v1['father_name'];?></td>
															<td><?php echo $v1['contact_no'];?></td>
															<td><?php echo $v1['emailid'];?></td>
															
															<td><?php echo $v1['joining_date'];?></td>
															<td><?php echo $v1['aadhar_cardno'];?></td>
															<td><?php echo $v1['dl_no'];?></td>
															<td><?php echo $v1['address'];?></td>
															
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
		url: "ajax_edit_employee.php",
		data:'id='+val,
		success: function(data){
			$("#form11").html(data);
			$('#pks1').load(document.URL +  ' #pks1');

		}
		});
		//alert(val);
		}

		function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_employee.php",
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
