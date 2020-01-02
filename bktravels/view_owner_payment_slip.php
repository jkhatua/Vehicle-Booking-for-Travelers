<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}

function fetchSellItems(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  	id,
    duty_slip_no,
    duty_date,
    journey_to,
    vehicle_name,
    vehicle_no,
    starting_km,
    closing_km,
    total_km,
	starting_time,
	closing_time,
	total_time,
    charging_type,
	extra_hour,
    extrahour_price,
	night_halt,
	tool_gate,
	parking,
    kmforlitre,
	day_basic,
    fuel_rate,
    priceper_km,
    amount,
	day_charge,
	advance_office,
	advance_guest,
    total_adv,
	total_amount,
    remark
    FROM owner_payment_slip
    ");
    $stmt->execute();
    $stmt->bind_result($id,$duty_slip_no,$duty_date,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$remark);
    while($stmt->fetch()){
      $row[] = array('id'=>$id,'duty_slip_no'=>$duty_slip_no,'duty_date'=>$duty_date,'journey_to'=>$journey_to,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'starting_km'=>$starting_km,'closing_km'=>$closing_km,'total_km'=>$total_km,'starting_time'=>$starting_time,'closing_time'=>$closing_time,'total_time'=>$total_time,'charging_type'=>$charging_type,'extra_hour'=>$extra_hour,'extrahour_price'=>$extrahour_price,'night_halt'=>$night_halt,'tool_gate'=>$tool_gate,'parking'=>$parking,'kmforlitre'=>$kmforlitre,'day_basic'=>$day_basic,'fuel_rate'=>$fuel_rate,'priceper_km'=>$priceper_km,'amount'=>$amount,'day_charge'=>$day_charge,'advance_office'=>$advance_office,'advance_guest'=>$advance_guest,'total_adv'=>$total_adv,'total_amount'=>$total_amount,'remark'=>$remark);
    }
    $stmt->close();
  	if(!empty($row)){
  	return ($row); }
  	else
  	{ return ""; }
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
		<!-- /Right Sidebar Backdrop -->

		<!-- Right Sidebar Backdrop -->
			<div class="right-sidebar-backdrop"></div>
			<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">View Owner Payment Slip</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li class="active"><span>View Owner Payment Slip</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">View Owner Payment Slip</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr>
														<th>#</th>
														
														<th>V.</th>
														<th>V.N</th>
														<th>Dt</th>
														<th>S.k</th>
														<th>C.k</th>
														<th>T.k</th>
														<th>fuel</th>
														<th>p/km</th>
														<th>D.chgs</th>
														<th>N.h</th>
														<th>T.c</th>
														<th>Total</th>
														<th>Total adv</th>
														<th>Pay</th>
														<th>Remark</th>
														<th class="text-nowrap">Action</th>
													</tr>
												</thead>
												<tbody>
														  <?php
														  $items = fetchSellItems();
														  $i = 1;
														  foreach ($items as $v1) {
														   ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $v1['vehicle_name'];?></td>
														<td><?php echo $v1['vehicle_no'];?></td>
														<td><?php echo $v1['duty_date'];?></td>
														<td><?php echo $v1['starting_km'];?></td>
														<td><?php echo $v1['closing_km'];?></td>
														<td><?php echo $v1['total_km'];?></td>
														<td><?php echo $v1['fuel_rate'];?></td>
														<td><?php echo $v1['priceper_km'];?></td>
														<td><?php echo $v1['day_charge'];?></td>
														<td><?php echo $v1['night_halt'];?></td>
														<td><?php echo $v1['tool_gate'];?></td>
														<td><?php echo $v1['amount'];?></td>
														<td><?php echo $v1['total_adv'];?></td>
														<td><?php echo $v1['total_amount'];?></td>
														<td><?php echo $v1['remark'];?></td>
														<td><a href="owners_archieve.php?printid=<?php echo $v1['id']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>&nbsp; &nbsp;<a  data-toggle="modal" data-id="<?php echo $v1['duty_slip_no']?>"
data-amount="<?php echo $v1['total_amount']?>" data-target="#exampleModal"  class="open-AddBookDialog mr-25" data-toggle="tooltip" data-original-title="Pay"><i class="fa fa-cc-mastercard  text-danger"></i> </a></td>

														
													</tr>
													  <?php $i++; } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
													<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">Pay Pending Balance</h5>
													</div>
													<div class="modal-body">
														<form action="ajax_pay_pending_amount.php" method="POST">
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Pending Balance:</label>
																<input type="text" class="form-control" id="pending_bal" readonly style='background-color:#212121' name="pending_bal">
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Paying Amount:</label>
																<input type="text" class="form-control" name="amount" autocomplete="off">
															</div>
															  <input type="hidden" name="userID" id="bookId">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<input type="submit" class="btn btn-primary" value="Submit">
													</div>
												</form>
												</div>
											</div>
										</div>

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
	<script src="dist/js/dataTables-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>

<script>
	
	  function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_tax_invoice.php",
			data:'id='+val,
			success: function(data){
        swal("Good Job","The Supplier is Successfully Removed",'success');
				$("#msg").html(data);
				$('#pks1').load(document.URL +  ' #pks1');
		}
			});
		}



		$(document).on("click", ".open-AddBookDialog", function () {
		   var myBookId = $(this).data('id');
		   var amount = $(this).data('amount');
		   $(".modal-body #pending_bal").val( amount );
		   $(".modal-body #bookId").val( myBookId );
		});
	</script>

</body>


</html>
<?php } ?>
