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
function fetchemployee($status){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      name,
      phone,
      email,
      address
      FROM aacorporate
      WHERE status = ?
       ");
       $stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$name,$phone,$email,$address);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,'address'=>$address);
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
							<h5 class="txt-dark">Add Corporate</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Add Corporate</span></li>
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
                          <form id="submit_seller" action="" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Corporate's Info</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label mb-10">Corporate Name</label>
											<input type="text" name="crname" id="crname" class="form-control" placeholder="Corporate Name" required>
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label mb-10">Corporate Address</label>
											<input type="text" name="craddress" id="craddress" class="form-control" placeholder="Corporate Address" >
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label mb-10">Corporate Phone no</label>
											<input type="text" name="phone" id="crphone" class="form-control" placeholder="Corporate Phone no"  maxlength="10">
											<span class="help-block"> </span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label mb-10">Corporate Email id</label>
											<input type="text" name="enail" id="creamail" class="form-control" placeholder="Corporate Email id" >
											<span class="help-block"> </span>
										</div>
									</div>
									<input type="hidden" name="id" id="input_hidden_field">
									<div class="col-md-6">
									 <div class="form-actions mt-10">
									  <button type="submit" class="btn btn-success  mr-10" id="corporate_sub_btn" value="create" name="corporate_form" onClick="return create_data()">Save</button>
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
                           <?php $fetchResult = fetchemployee(1); 
                          if(!empty($fetchResult)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Phone No</th>
															<th>Email Id</th>
															<th>Address</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Phone No</th>
															<th>Email Id</th>
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
															<td><?php echo $v1['name'];?></td>
															<td><?php echo $v1['phone'];?></td>
															
															<td><?php echo $v1['email'];?></td>
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
      /*frm.submit(function (e) {
          e.preventDefault();
          $.ajax({
              type: frm.attr('method'),
              url:  frm.attr('action'),
              data: frm.serialize(),
              success: function (data) {
                  swal("Good job!", "Employee is Successfully Created!!", "success")
				 // alert (data);
                  $('#submit_seller')[0].reset();
				  //location.reload();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });*/
	  
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
		url: "ajax_edit_corporate.php",
		data:'id='+val,
		success: function(data){
			//alert(data);
			var a = JSON.parse(data);
			//alert(a.id);
			$('#crname').val(a.name);
			$('#craddress').val(a.address);
			$('#crphone').val(a.phone);
			$('#creamail').val(a.email);
			$('#corporate_sub_btn').html("Update");
			$('#corporate_sub_btn').val("update");
			$('#input_hidden_field').val(a.id);
			window.scrollTo('0', '0');
		}
		});
		//alert(val);
		}
function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_corporate.php",
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
