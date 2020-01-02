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
<?php
function getalldata($status){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      date,
      vehicle_type,
      destination,
      dutyno,
	  report_person,
	  billno,
	  total,
	  advance,
	  balance
      FROM creditor_report
      WHERE status = ?
       ");
       $stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$date,$vehicle_type,$destination,$dutyno,$report_person,$billno,$total,$advance,$balance);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'date'=>$date,'vehicle_type'=>$vehicle_type,'destination'=>$destination,'dutyno'=>$dutyno,'report_person'=>$report_person,'billno'=>$billno,'total'=>$total,'advance'=>$advance,'balance'=>$balance);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "";
       }
  }
	
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
							<h5 class="txt-dark">Creditor Report</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Creditor Report</span></li>
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
                          <form id="submit_seller" action="ajax_create_creditor_report.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Creditor Report</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Date</label>
											<input type="date" name="rdate" id="rdate" class="form-control" placeholder="Date" value="<?php echo(date('Y-m-d')) ?>" required>
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Vehicle Type</label>
											<input type="text" name="rvtype" id="rvtype" class="form-control" placeholder="Vehicle Type" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Destition</label>
											<input type="text" name="rdestition" id="rdestition" class="form-control" placeholder="Destition"  maxlength="10">
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Duty No</label>
											<input type="number" name="rdutyno" id="rdutyno" class="form-control" placeholder="Duty No" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Report person</label>
											<input type="text" name="rreportperson" id="rreportperson" class="form-control" placeholder="Report person" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Bill No</label>
											<input type="number" name="rbillno" id="rbillno" class="form-control" placeholder="Bill No" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Total</label>
											<input type="number" name="total" id="total" class="form-control" placeholder="Total" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Advance</label>
											<input type="number" name="radvance" id="radvance" class="form-control" placeholder="Advance" >
											<span class="help-block"> </span>
										</div>
									</div><div class="col-md-4">
										<div class="form-group">
											<label class="control-label mb-10">Balance</label>
											<input type="number" name="rbalance" id="rbalance" class="form-control" placeholder="Balance" >
											<span class="help-block"> </span>
										</div>
									</div>
									<input type="hidden" name="id" id="input_hidden_field">
									<div class="col-md-4">
									 <div class="form-actions mt-10">
									  <button type="submit" class="btn btn-success  mr-10" id="corporate_sub_btn" value="create" name="corporate_form">Save</button>
									  <button type="reset" value="Reset" class="btn btn-default">Reset</button>
									</div></div>
                               	
                              
                                

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
                           <?php $fetchResult = getalldata(1); 
                          if(!empty($fetchResult)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Vehicle Type</th>
															<th>Destination</th>
															<th>Duty No</th>
															<th>Report person</th>
															<th>Bill No</th>
															<th>Total</th>
															<th>Advance</th>
															<th>Balance</th>
															
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													
													<tbody>
														<?php
										 					$i = 1;
                              $fetchResult = getalldata(1);
                              foreach ($fetchResult as $v1) {
										 					?>
														<tr>
															<td><?php echo $i;?></td>
															<td><?php echo($v1['date']); ?></td>
															<td><?php echo($v1['vehicle_type']); ?></td>
															<td><?php echo($v1['destination']); ?></td>
															<td><?php echo($v1['dutyno']); ?></td>
															<td><?php echo($v1['report_person']); ?></td>
															<td><?php echo($v1['billno']); ?></td>
															<td><?php echo($v1['total']); ?></td>
															<td><?php echo($v1['advance']); ?></td>
															<td><?php echo($v1['balance']); ?></td>
															
															
															
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
	  
function create_data(){
	var d = $('#corporate_sub_btn').val();
	var crname = $('#crname').val();
		var craddress = $('#craddress').val();
		var phone = $('#crphone').val();
		var enail = $('#creamail').val();
	if(craddress=="" || crname=="" || phone=="" || enail==""){
		return false;
	}else{
			if(d=="create"){
		var crname = $('#crname').val();
		var craddress = $('#craddress').val();
		var phone = $('#crphone').val();
		var enail = $('#creamail').val();
		$.ajax({
		url: "ajax_create_corporate_new.php",
		type: "POST",
		data: {crname:crname,craddress:craddress,phone:phone,enail:enail},
		success: function(data){
			swal("Good job!", "Corporate is Successfully Created!!", "success");
			$('#submit_seller')[0].reset();
			location.reload();
		}
	});
		
	}
	if(d=="update"){
		var corporate_form = d;
		var crname = $('#crname').val();
		var craddress = $('#craddress').val();
		var phone = $('#crphone').val();
		var enail = $('#creamail').val();
		var id = $('#input_hidden_field').val();
		$.ajax({
		url: "ajax_create_corporate_new.php",
		type: "POST",
		data: {crname:crname,craddress:craddress,phone:phone,enail:enail,corporate_form:corporate_form,id:id},
		success: function(data){
			swal("Good job!", "Employee is Successfully Created!!", "success")
			$('#submit_seller')[0].reset();
			location.reload();
		}
	});
	}
	}

}	  
	  
	  
function edit(val) {
	//alert(val);
	
		$.ajax({
		type: "POST",
		url: "ajax_create_creditor_report.php",
		data:{id:val,name:"edit_record"},
		success: function(data){
			//alert(data);
			var a = JSON.parse(data);
			//alert(a.id);
			$('#rdate').val(a.date);
			$('#rvtype').val(a.vehicle_type);
			$('#rdestition').val(a.destination);
			$('#rdutyno').val(a.dutyno);
			$('#rreportperson').val(a.report_person);
			$('#rbillno').val(a.billno);
			$('#total').val(a.total);
			$('#radvance').val(a.advance);
			$('#rbalance').val(a.balance);
			
			$('#input_hidden_field').val(a.id);
			$('#corporate_sub_btn').html("Update");
			$('#corporate_sub_btn').val("update");
			$('#corporate_sub_btn').attr('name',"update_data");
			window.scrollTo('0', '0');
		}
		});
		//alert(val);
		}
function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_create_creditor_report.php",
			data:{id:val,name:"delete_record"},
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
