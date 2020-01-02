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
	  client_name,
      invoice_no,
      start_date,
      gst_no,
      sac_code,
      bill_no,
      month,
      total_km_cover,
	  km_cover_liter,
	  fuel_consume,
	  fuel_rate,
	  sub_total,
	  km_covers_engine_oil,
	  engine_oil_consumed,
	  engine_oil_rate,
	  engine_oil_charge,
	  sub_total1,
	  no_of_working_days,
	  per_day_charge,
	  sub_total2,
	  sgst,
	  cgst,
	  grand_total
	  FROM  corporate_bill
      WHERE status = ?
       ");
       $stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$client_name,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$no_of_working_days,$per_day_charge,$sub_total2,$sgst,$cgst,$grand_total);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'client_name'=>$client_name,'invoice_no'=>$invoice_no,'start_date'=>$start_date,'gst_no'=>$gst_no,'sac_code'=>$sac_code,'bill_no'=>$bill_no,'month'=>$month,'total_km_cover'=>$total_km_cover,'km_cover_liter'=>$km_cover_liter,'fuel_consume'=>$fuel_consume,'fuel_rate'=>$fuel_rate,'sub_total'=>$sub_total,'km_covers_engine_oil'=>$km_covers_engine_oil,'engine_oil_consumed'=>$engine_oil_consumed,'engine_oil_rate'=>$engine_oil_rate,'engine_oil_charge'=>$engine_oil_charge,'sub_total1'=>$sub_total1,'no_of_working_days'=>$no_of_working_days,'per_day_charge'=>$per_day_charge,'sub_total2'=>$sub_total2,'sgst'=>$sgst,'cgst'=>$cgst,'grand_total'=>$grand_total);
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
							<h5 class="txt-dark">Office Bill Details</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Office Bill Details</span></li>
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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>car's Info</h6>

                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php $fetchResult = fetchemployee(1); 
                          if(!empty($fetchResult)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Client Name</th>
															<th>Bill No</th>
															<th>Month</th>
															<th>Date</th>
															<th>Total K.M.</th>
															<th>Grand Total</th>
															
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Client Name</th>
															<th>Bill No</th>
															<th>Month</th>
															<th>Date</th>
															<th>Total K.M.</th>
															<th>Grand Total</th>
															
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
															<td><?php echo $v1['client_name'];?></td>
															<td><?php echo $v1['bill_no'];?></td>
															<td><?php echo $v1['month'];?></td>
															<td><?php echo $v1['start_date'];?></td>
															<td><?php echo $v1['total_km_cover'];?></td>
															<td><?php echo $v1['grand_total'];?></td>
															
															<td class="text-nowrap"><a href="monthly_bill_print_corporate.php?printid=<?php echo $v1['id']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
															<a  data-toggle="modal" data-id="<?php echo $v1['id']?>"
data-amount="<?php echo $v1['grand_total']?>" data-target="#exampleModal"  class="open-AddBookDialog mr-25" data-toggle="tooltip" data-original-title="Pay"><i class="fa fa-cc-mastercard  text-danger"></i> </a>
															  <a onClick="delete_buyer(<?php echo $v1['id'];?>);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
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
<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">Pay Pending Balance</h5>
													</div>
													<div class="modal-body">
														<form action="ajax_pay_pending_amount_corporate.php" method="POST">
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
			url: "ajax_delete_office_bill_corporate.php",
			data:'id='+val,
			success: function(data){
        swal("Good Job","Office Bill is Successfully Removed",'success');
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
