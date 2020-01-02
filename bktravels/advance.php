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

    function fetchEmployee($status){
      global $mysqli;
      $stmt = $mysqli->prepare("SELECT
      emp_name,
      id
      FROM employee_details
      WHERE status = ?
      ");
      $stmt->bind_param("s",$status);
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



    $fetchEmployee = fetchEmployee(1);

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
							<h5 class="txt-dark">Loan/Advance Amount</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Loan/Advance Amount</span></li>
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
                          <form id="submit_seller" action="ajax_submit_adv.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Pay Advance/loan Salary</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Employee Name</label>
                                    <select name="employee" class="form-control" id="employee">
                                      <option value="" selected disabled>Select Employee</option>
                                    <?php foreach ($fetchEmployee as $v1) { ?>
                                      <option value="<?php echo $v1['id'];?>"><?php echo $v1['name'];?></option>
                                      <?php } ?>
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Designation</label>
                                    <input type="text"  name="designation" id="designation"  class="form-control"  placeholder="Designation" readonly style="background-color:#212121;">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Employee ID </label>
                                    <input type="text"  name="eid" id="eid"  class="form-control" placeholder="Employee ID" readonly style="background-color:#212121;">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <!-- <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">PAN Number </label>
                                    <input type="text"  name="pan" id="pan" style="text-transform:uppercase;background-color:#212121;" data-mask="a****9999a" class="form-control"  placeholder="PAN Number" readonly >
                                    <span class="help-block">  </span>
                                  </div>
                                </div> -->

                              
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Month</label>
                                    <select name="month" class="form-control" required>
                                      <option value=""selected disabled>Select Month</option>
                                      <option value="1">January</option>
                                      <option value="2">February</option>
                                      <option value="3">March</option>
                                      <option value="4">April</option>
                                      <option value="5">May</option>
                                      <option value="6">June</option>
                                      <option value="7">July</option>
                                      <option value="8">August</option>
                                      <option value="9">September</option>
                                      <option value="10">October</option>
                                      <option value="11">November</option>
                                      <option value="12">December</option>
                                    </select>
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">Advance Amouunt</label>
                                    <input type="text"  name="advance" id="advance" required class="form-control"  placeholder="Advance Amount">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                              
                              
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Salary</label>
                                    <input type="text"  name="salary" id="salary"  class="form-control"  placeholder="Salary of the Employee" readonly style="background-color:#212121;">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Date</label>
                                    <input type="text"  name="date" class="form-control"  value="<?= date('Y-m-d');?>" readonly style="background-color:#212121;">
                                    <span class="help-block">  </span>
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
                  swal("Good job!", "Advance is Successfully Paid in the Portal.", "success")
                  $('#submit_seller')[0].reset();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });

      $(document).on('change','#employee',function(){
        var emp = $('#employee').val();
        $.ajax({
          type: 'POST',
          url: 'ajax_pay_salary.php',
          data:{id:emp,action:"eDesignation"},
          success: function(data){
            $('#designation').val(data);
          }
        });
        $.ajax({
          type: 'POST',
          url: 'ajax_pay_salary.php',
          data:{id:emp,action:"eid"},
          success: function(data){
            $('#eid').val(data);
          }
        });
        // $.ajax({
        //   type: 'POST',
        //   url: 'ajax_pay_salary.php',
        //   data:{id:emp,action:"pan"},
        //   success: function(data){
        //     $('#pan').val(data);
        //   }
        // });
        $.ajax({
          type: 'POST',
          url: 'ajax_pay_salary.php',
          data:{id:emp,action:"salary"},
          success: function(data){
            $('#salary').val(data);
          }
        });
      });




  </script>
	</body>

</html>
<?php } ?>
