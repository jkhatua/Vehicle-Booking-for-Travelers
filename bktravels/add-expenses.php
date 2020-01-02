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
	$sessionname = $_SESSION['login_user'];
	if($sessionname){

    // function fetchCustomer(){
    //   global $mysqli;
    //   $stmt = $mysqli->prepare("SELECT
    //   customer_details,
    //   id
    //   FROM quotation
    //   ");
    //   $stmt->execute();
    //   $stmt->bind_result($name,$id);
    //   while ($stmt->fetch()) {
    //     $row[] = array('name' => $name,'id'=>$id);
    //   }
    //   $stmt->close();
    //   if(!empty($row)){
    //     return $row;
    //   } else {
    //     return "";
    //   }
    // }
    function fetchEmployee(){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      emp_name,
      id
      FROM employee_details
      ");
      $stmt->execute();
      $stmt->bind_result($name,$id);
      while ($stmt->fetch()) {
        $row[] = array('name' => $name,'id'=>$id);
      }
      $stmt->close();
      if(!empty($row)){
        return $row;
      } else {
        return "";
      }
    }
    //$fetchCustomer = fetchCustomer();
    $fetchEmployee  = fetchEmployee();

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
							<h5 class="txt-dark">Add Expenses</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Expenses Details</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->

					</div>
					<!-- /Title -->

					<div id="msg"></div>

					<!-- Row -->
					<div id="table_data"></div>
					<!-- /Row -->
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">	</h6>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                          <form id="submit_seller" action="ajax_add_expenses.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Expenses Details</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Emloyee Name</label>
                                    <select class="form-control" name="name">
                                      <option value="" selected disabled>Select Employee Name</option>
                                      <?php foreach ($fetchEmployee as $v2) { ?>
                                        <option value="<?php echo $v2['name'];?>"><?php echo $v2['name'];?></option> <?php } ?>
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                                
								<div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Details</label>
                                    <input type="text"  maxlength="100" name="details"  class="form-control"  placeholder="Details of the Payment">

                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Mode of Payment </label>
                                    <select class="form-control" name="mode">
                                      <option value="" selected disabled>Select Mode of Payment</option>
                                      <option value="1">Cash</option>
                                      <option value="2">Cheque</option>
                                      <option value="3">Online Transfer</option>
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Amount</label>
                                    <input type="text"  name="amount" style="text-transform:uppercase"  class="form-control"  placeholder="Amount Paid">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Type</label>
                                    <select class="form-control" name="payType">
                                      <option value="" selected disabled>Select Payment Type</option>
                                      <option value="1">Credit</option>
                                      <option value="0">Debit</option>
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              </div>


                            </div>
                            <div class="form-actions mt-10">
                              <button type="submit" class="btn btn-success  mr-10"> Save</button>
                              <button type="reset" value="Reset" class="btn btn-default">Reset</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

					<!-- Row -->

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
  <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
  <script type="text/javascript">
      var frm = $('#submit_seller');
      frm.submit(function (e) {
          e.preventDefault();
          $.ajax({
              type: frm.attr('method'),
              url:  frm.attr('action'),
              data: frm.serialize(),
              success: function (data) {
                //alert(data);
                  swal("Good job!", "Regular Expenses is Successfully Added!!", "success")
                  //$('#submit_seller')[0].reset();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });

function disName(){
	document.getElementById("new").disabled = true;
}


  </script>
	</body>

</html>
<?php } ?>
