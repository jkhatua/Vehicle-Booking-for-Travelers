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
							<h5 class="txt-dark">Add Emplyee</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Add Emplyee</span></li>
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
                          <form id="submit_seller" action="ajax_submit_detail_new.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Employee's Info</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Employee Categogry</label>
                                    <select name="emp_catagory" class="form-control" >
                  									    <option value="driver">Driver</option>
                  									    <option value="employee">Employee</option>
                  									</select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Employee Name</label>
                                    <input type="text" name="emp_name" id="firstName" class="form-control"  placeholder="Employee's Name">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Father Name</label>
                                    <input type="text" name="father_name" id="firstName" class="form-control"  placeholder="Father's Name">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Contact Number</label>
                                    <input type="text"  maxlength="12" name="contact_no"  class="form-control"  placeholder="Contact No">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                

                              </div>

                              <div class="row">
                              	<div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Email ID</label>
                                    <input type="text"  name="emailid"   class="form-control" placeholder="Enter your Email">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                              	<div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Date Of Birth </label>
                                    <input type='date' name="birth_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                              
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Date of joining </label>
                                	<input type='date' name="joining_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Adhar Card Number </label>
                                    <input type="text" name="aadhar_cardno" style="text-transform:uppercase"  class="form-control"
                                     placeholder="Enter Your Adhar Number">
                                
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
								
								
								
							                  <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Driving License Number </label>
                                    <input type="text"  name="dl_no" style="text-transform:uppercase"  class="form-control"  placeholder="Enter Driving License Number">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Address</label>
                                    <textarea type="text"  name="address"   class="form-control" placeholder="Enter your Address"></textarea>
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                              </div>
                                                          <div class="seprator-block"></div>

                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Salary Breakup</h6>
                              <hr class="light-grey-hr"/>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Basic</label>
                                    <input type="text" name="basic" id="basic" class="form-control"  placeholder="Basic Salary" value="0">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">EPF</label>
                                    <input type="text"  id="epf" name="epf"  class="form-control"  placeholder="Employee Provident Fund" value="0">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">ESIC</label>
                                    <input type="text" id="esic" name="esic" class="form-control"  placeholder="ESIC" value="0">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">HRA</label>
                                    <input type="text" id="hra"  name="hra"  class="form-control"  placeholder="House Rent Allowance" value="0">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">DA</label>
                                    <input type="text" id="da"  name="da"  class="form-control"  placeholder="DA" value="0">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Other Allowance</label>
                                  <input type="text" id="other" name="other" class="form-control"  placeholder="Other Allowance" value="0">
                                  <span class="help-block"> </span>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Gross Salary</label>
                                  <input type="text" id="gross" name="gross" class="form-control"  placeholder="Gross Salary" readonly style="background-color:#212121;">
                                  <span class="help-block"> Gross Salary = Basic + HRA + DA + Others</span>
                                </div>
                              </div>
                               <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Net Salary </label>
                                    <input type="text"  name="amount" id="amount" class="form-control"  placeholder="Salary to be paid" readonly style="background-color:#212121">
                                    <span class="help-block"> Net Salary = Gross Salary - (EPF + ESIC) </span>
                                  </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-actions mt-10">
                              <button type="submit" class="btn btn-success  mr-10">Save</button>
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
                  swal("Good job!", "Employee is Successfully Created!!", "success")
				 // alert (data);
                  $('#submit_seller')[0].reset();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });



$(document).on('blur','#other',function(){
      var basic = $('#basic').val();
      var hra = $('#hra').val();
      var da = $('#da').val();
      var other = $('#other').val();
      var amount = parseInt(basic) + parseInt(hra) + parseInt(da) + parseInt(other);
      $('#gross').val(amount);
      var epf = $('#epf').val();
      var esic = $('#esic').val();
      var net = parseInt(amount) - (parseInt(epf) + parseInt(esic));
      $('#amount').val(net);
    });
  </script>
	</body>

</html>
<?php } ?>
