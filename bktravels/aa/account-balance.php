<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>
<style>
.table_align{
	text-align: center;
	height: 100%;
}
</style>

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

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"> Expenses Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="javascript:void()">Invantory Management System</a></li>
							<li class="active"><span>Expenses Report</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

        <div class="row">
          <div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title inline-block txt-dark">Total Expenses : <i class="fa fa-inr"></i></h6>
									</div>
									<div class="pull-right">
										<span class="label label-info capitalize-font inline-block ml-10">Income</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div  class="panel-wrapper collapse in">
									<!-- <div  class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
									</div> -->
								</div>
							</div>
						</div>
          </div>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Expenses as per Month</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr class="table_align">
                            							<th>#</th>
														<th>Challan No</th>
                            							<th>Client<br>Name</th>
                            							<th>Employee<br>Name</th>
														<th>details</th>
														<th>Mode of Payment</th>
														<th>Credit</th>
														<th>Debit</th>
														<th>Balance</th>
														<th>Generated Date/Time</th>
													</tr>
												</thead>

												<tbody>
                                                     	<th>1</th>
														<th>SS/0001</th>
                            							<th>Dhaneswar</th>
                            							<th>Bikash</th>
														<th>Tour to Puri</th>
														<th>Cash</th>
														<th>2500</th>
														<th>0</th>
														<th>2500</th>
														<th>19/03/2018</th>
														
												</tbody>
												<tbody>
                                                     	<th>2</th>
														<th>SS/0002</th>
                            							<th>Manoranjan</th>
                            							<th>Ramesh</th>
														<th>Tour to Baleswar</th>
														<th>Cash</th>
														<th>4000</th>
														<th>0</th>
														<th>6500</th>
														<th>20/03/2018</th>
														
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


</body>


</html>

