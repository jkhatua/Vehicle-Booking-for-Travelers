<?php
include("config.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
if(!$_SESSION){
	header('location:index.php'); }
$sessionname = $_SESSION['login_user'];
$today_date =  date('d-m-Y');
$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;

function todayExpenses(){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  ename,
  details,
  mode,
  amount,
  id,
  creationDate,
  payType,
  balance
  FROM expenses
  ");
  $stmt->execute();
  $stmt->bind_result($ename,$details,$mode,$amount,$id,$creationDate,$payType,$balance);
  while ($stmt->fetch()) {
    $row[] = array('name' =>$ename ,'details'=>$details,'mode'=>$mode,'amount'=>$amount,'id'=>$id,'creationDate'=>$creationDate ,'payType'=>$payType,'balance'=>$balance);
  }
  $stmt->close();
  if(!empty($row)){
    return $row;
  } else {
    return "";
  }
}
if($sessionname){
?>
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
                            							<th>Emploee<br>Name</th>
														<th>details</th>
														<th>Mode of Payment</th>
														<th>Credit</th>
														<th>Debit</th>
														<th>Balance</th>
														<th>Generated Date/Time</th>
													</tr>
												</thead>
												<tbody>
													  <?php
													  $items = todayExpenses($from,$to);
													  $i = 1;
													  foreach ($items as $v1) {
													   ?>
													<tr class="table_align">
														<td>#<?php echo $i; ?></td>
														<td>CHLN/0<?php echo $v1['id'];?>/17-18</td>
														<td><?php echo $v1['name'];?></td>
														<td><?php echo $v1['details'];?></td>
														<td><?php if($v1['mode'] == 2) echo "Cheque"; else echo "Online Transfer";?></td>
														<td><?php if($v1['payType'] == 1) echo '<i class="fa fa-inr"></i> '.$v1['amount'];?></td>
														<td><?php if($v1['payType'] == 0) echo '<i class="fa fa-inr"></i> '.$v1['amount'];?></td>
														<td><i class="fa fa-inr"></i> <?php echo $v1['balance'];  ?></td>
														<td><?php echo $v1['creationDate'];?></td>
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
<?php } ?>
