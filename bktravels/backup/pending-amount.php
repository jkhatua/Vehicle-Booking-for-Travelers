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
  function stockDetails(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    pdc_Buyer.name,
    order_no,
    rdate,
    invoice_no,
    place_of_supply,
    freight,
    pay_cost,
    bill
    FROM insertProduct
    INNER JOIN pdc_Buyer ON insertProduct.customer_details = pdc_Buyer.id
  ");
  $stmt->execute();
  $stmt->bind_result($name,$order_no,$rdate,$invoice_no,$place_of_supply,$freight,$pay_cost,$bill);
  while($stmt->fetch()){
    $row[] = array('name'=>$name,'order_no'=>$order_no,'rdate'=>$rdate,'invoice_no'=>$invoice_no,'place_of_supply'=>$place_of_supply,'freight'=>$freight,'pay_cost'=>$pay_cost,'bill'=>$bill);
  }
  $stmt->close();
	if(!empty($row))
	{
		return ($row);
	}
	else
	{
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
							<h5 class="txt-dark">Stock Details</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Stock Details</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

					</div>
					<!-- /Title -->

					<div id="msg"></div>

					<!-- Row -->


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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Stock Details</h6>
										<hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
													<thead>
														<tr>
															<th>#</th>
                              <th>Supplier Name</th>
															<th>Invoice No</th>
                              <th>Order No</th>
                              <th>Date</th>
                              <th>Place of Supply</th>
                              <th>Amount Paid</th>
                              <th>Pending Amount</th>
                              <th>Pay Amount</th>
                              <th>Pay Balance</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
                              <th>#</th>
                              <th>Supplier Name</th>
                              <th>Invoice No</th>
                              <th>Order No</th>
                              <th>Date</th>
                              <th>Place of Supply</th>
                              <th>Amount Paid</th>
                              <th>Pending Amount</th>
                              <th>Pay Amount</th>
                              <th>Pay Balance</th>
														</tr>
													</tfoot>
													<tbody>
                            <?php
                            $i = 1;
                            $fetchStock = stockDetails();
                            foreach ($fetchStock as $v1) {
                                ?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo $v1['name'];?></td>
                              <td><?php echo $v1['invoice_no'];?></td>
															<td><?php echo $v1['rdate'];?></td>
                              <td><?php echo $v1['order_no'];?></td>
															<td><?php echo $v1['place_of_supply'];?></td>
                              <td><?php echo $v1['pay_cost'] - $v1['freight']; ?>.00</td>
															<td><?php echo ($v1['freight']);?></td>
                              <td><?php echo $v1['pay_cost']; ?></td>
                              <td class="text-nowrap"><a href="pay_order.php?id=<?php echo $v1['bill']; ?>" class="mr-25" data-toggle="tooltip" data-original-title="Pay Amount"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a></td>
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


	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script>
	function pks(val) {
		$.ajax({
		type: "POST",
		url: "ajax_form_supplier.php",
		data:'id='+val,
		success: function(data){
			$("#form11").html(data);
			$('#pks1').load(document.URL +  ' #pks1');

		}
		});
		}

		function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_supplier.php",
			data:'id='+val,
			success: function(data){
				$("#msg").html(data);
				$('#pks1').load(document.URL +  ' #pks1');
		}
			});
		}

	</script>
	</body>

</html>
<?php } ?>
