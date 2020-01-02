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

function month_list(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	month
	 FROM months
       ");
	//$stmt->bind_param("s",$duty_of);
	$stmt->execute();
	$stmt->bind_result($id,$name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'month'=>$name);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "a";
       }
}

function corporate_list($status){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	id,
	name
	 FROM aacorporate
	 WHERE status= ?;
       ");
	$stmt->bind_param("s",$status);
	$stmt->execute();
	$stmt->bind_result($id,$name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'name'=>$name);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "a";
       }
}

function select_dutyof_name($duty_of){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	name
	 FROM aacorporate
	 WHERE id = ?
       ");
	$stmt->bind_param("s",$duty_of);
	$stmt->execute();
	$stmt->bind_result($name);
       while($stmt->fetch()){
         $row[]=array('name'=>$name);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row[0]);
      }
     	else {
         return "a";
       }
}

function get_data_by_corporate($month,$corporate){
	$year = date('Y');
	 global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
    dutyslip_slno,
    corporate_id,
    corporate_name,
    report_at,
    booked_by,
    vehicle_no,
    vehicle_id,
    vehicle_name,
    driver_name,
    place_from,
    place_to,
    start_date,
    starting_km,
    start_time,
    closing_km,
    closing_time,
    closing_date,
    total_km,
    total_time,
    ac_nonac,
    toll_gate,
    parking_charge,
    advance_paid_client,
    advance_paid_travel
      FROM duty_slip_corporate
	  WHERE monthof = ? AND 
	  yearof = ? AND
	  corporate_name = ?
       ");
       $stmt->bind_param("sss",$month,$year,$corporate);
       $stmt->execute();
       $stmt->bind_result($id,$dutyslip_slno,$corporate_id,$corporate_name,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'dutyslip_slno'=>$dutyslip_slno,'corporate_id'=>$corporate_id,'corporate_name'=>$corporate_name,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel);
       }
       $stmt->close();
     	if(!empty($row)){
     	return ($row);
      }
     	else {
         return "";
       }
}

  function fetchdutyslip(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
    dutyslip_slno,
    corporate_id,
    corporate_name,
    report_at,
    booked_by,
    vehicle_no,
    vehicle_id,
    vehicle_name,
    driver_name,
    place_from,
    place_to,
    start_date,
    starting_km,
    start_time,
    closing_km,
    closing_time,
    closing_date,
    total_km,
    total_time,
    ac_nonac,
    toll_gate,
    parking_charge,
    advance_paid_client,
    advance_paid_travel
      FROM duty_slip_corporate
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$dutyslip_slno,$corporate_id,$corporate_name,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'dutyslip_slno'=>$dutyslip_slno,'corporate_id'=>$corporate_id,'corporate_name'=>$corporate_name,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel);
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
	$month_list = month_list();
	$corporate_list = corporate_list(1);
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
							<h5 class="txt-dark">Manage Dutyslip</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span> Dutyslip Details</span></li>
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
					
					<?php 
					 if(isset($_POST['serach_by_corporate'])){ ?>
					 <?php
						 //print("<pre>");
						 //print_r($_POST);
						 $month = $_POST['month'];
						 $corporate = $_POST['corporate_name'];
						 $get_data_by_corporate = get_data_by_corporate($month,$corporate);
						// print_r($get_data_by_corporate);
						 
						 ?>
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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Dutyslip Info</h6>
										<br>
									
						<div class="search_div">
							<form method="post" action="">
								<div class="col-md-3">
								
									<select name="month" id="months" class="form-control">
									<option value="">Select Month</option>
									<?php foreach($month_list as $month_list){ ?>
									<option value="<?php echo($month_list['id']); ?>"<?php if($month_list['id']==$month) echo("selected") ?>><?php echo($month_list['month']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<div class="col-md-3">
									<select name="corporate_name" id="crname" class="form-control">
									<option value="">Select Corporate Name</option>
									<?php foreach($corporate_list as $corporate_list){ ?>
									<option value="<?php echo($corporate_list['name']); ?>"<?php if($corporate_list['name']==$corporate) echo("selected") ?>><?php echo($corporate_list['name']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<button type="submit" name="serach_by_corporate" id="serach_by_corporate" class="form-control" style="width: 50px; border: none"><i class="fa fa-search"></i></button>
							</form>
						</div>
							
						
                   <br> <br> 
                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                          <?php //print_r($get_data_by_corporate) ?>
                           <?php //$fetchdutyslip = fetchdutyslip(1); 
                          if($get_data_by_corporate!="") { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Duty Of</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th>Total Time</th>
															<th>Toll Gate Charge</th>
															<th>Parking Charge</th>
															<th>Advance Paid by Client</th>
															<th>Advance paid by Travels</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<!--<tfoot>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Duty Of</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</tfoot>-->
													<tbody>
														<?php
										 					$i = 1;
							  $tkm = 0;
							  $ttg = 0;
							  $pcharge = 0;
							  $adv_p_b_c = 0;
							  $adv_p_b_t = 0;
							  $totaltime = 0;
                              //$fetchdutyslip = fetchdutyslip(1);
							   if($get_data_by_corporate!="") { 
                              foreach ($get_data_by_corporate as $v1) {
								  $duty_of = $v1['corporate_id'];
								  $select_dutyof_name = select_dutyof_name($duty_of);
								 // print_r($select_dutyof_name)
										 					?>
														<tr>
															<td>#<?php echo $i; ?></td>
															<td><?php echo $v1['start_date'];?></td>
															<td><?php echo $v1['dutyslip_slno'];?></td>
															
															<td><?php echo $select_dutyof_name['name'];?></td>
															<td><?php echo $v1['driver_name'];?></td>
															<td><?php echo $v1['total_km'];?></td>
															<td><?php echo $v1['total_time'];?></td>
															<td><?php echo $v1['toll_gate'];?></td>
															<td><?php echo $v1['parking_charge'];?></td>
															<td><?php echo $v1['advance_paid_client'];?></td>
															<td><?php echo $v1['advance_paid_travel'];?></td>
															
															
															<td class="text-nowrap"><a onClick="delete_buyer(<?php echo $v1['id'];?>);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
														</tr>
														
															<?php 
								  						$tkm = $tkm+$v1['total_km'];
								  						$ttg = $ttg+$v1['toll_gate'];
								  						$pcharge = $pcharge+$v1['parking_charge'];
								  						$adv_p_b_c = $adv_p_b_c+$v1['advance_paid_client'];
								  						$adv_p_b_t = $adv_p_b_t+$v1['advance_paid_travel'];
								  
								  $a = explode(" : ",$v1['total_time']);
								  $day = explode(" ",$a[0])[0]*86400;
								  $hour = explode(" ",$a[1])[0]*3600;
								  $minute = explode(" ",$a[2])[0]*60;
								  $second = explode(" ",$a[3])[0];
								  $oneday = $day+$hour+$minute+$second;
								  $totaltime = $totaltime+$oneday;
									 
														  $i++; }} ?>
													
                       <tr>
                       	<td>Total</td>
                       	<?php
							  $tday = $totaltime/86400;
							  $tday = floor($tday);
							  $tsec = $tday*86400;
							  $remsec = $totaltime-$tsec;
							  $thour = floor($remsec/3600);
							  $tsec = $thour*3600;
							  $remsec = $remsec-$tsec;
							  $tminute = floor($remsec/60);
							  $tsec = $tminute*60;
							  $remsec = $remsec-$tsec;
							  ?>
                       	<td></td>
                       		<td></td>
                       			<td></td>
                       				<td></td>
                       					<td id="tkm"><?php echo($tkm) ?></td>
                       					<td id="tday"><?php echo($tday." days : ".$thour." hour : ".$tminute." minute : ".$remsec." seconds") ?></td>
                       					<td id="ttg"><?php echo($ttg); ?></td>
                       					<td id="pcharge"><?php echo($pcharge); ?></td>
                       					<td id="adv_p_b_c"><?php echo($adv_p_b_c); ?></td>
                       					<td id="adv_p_b_t"><?php echo($adv_p_b_t); ?></td>
                       					<td></td>
                       </tr>
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
					 <script type="text/javascript">
						 $(document).ready(function(){
							 var month = "<?php echo($month) ?>";
							 var corporate = "<?php echo($corporate) ?>" ;
							 
								var tkm = $('td#tkm').html();
								var tday = $('td#tday').html();
								var ttg = $('td#ttg').html();
								var pcharge = $('td#pcharge').html();
								var adv_p_b_c = $('td#adv_p_b_c').html();
								var adv_p_b_t = $('td#adv_p_b_t').html();
							 	var name = "enter_total_month_data";
							  $.ajax({
								url:"enter_total_month_data_corporate.php",
								type:"post",
								data:{month:month,corporate:corporate,tkm:tkm,tday:tday,ttg:ttg,pcharge:pcharge,adv_p_b_c:adv_p_b_c,adv_p_b_t:adv_p_b_t,name:name},
								success:function(data){
									//alert(data)

								}
								 });
							 
						 })
						 </script>

					 <?php }else{ ?>
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
										<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Dutyslip Info<a href="dutyslip.php" style="float: right;margin-right: 60%">View Dutyslip</a>	</h6>
										<br>
										
						<div class="search_div">
							<form method="post" action="">
								<div class="col-md-3">
								
									<select name="month" id="months" class="form-control">
									<option value="">Select Month</option>
									<?php foreach($month_list as $month_list){ ?>
									<option value="<?php echo($month_list['id']); ?>"><?php echo($month_list['month']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<div class="col-md-3">
									<select name="corporate_name" id="crname" class="form-control">
									<option value="">Select Corporate Name</option>
									<?php foreach($corporate_list as $corporate_list){ ?>
									<option value="<?php echo($corporate_list['name']); ?>"><?php echo($corporate_list['name']) ?></option>
									
									<?php }?>
								</select>
								</div>
								<button type="submit" name="serach_by_corporate" id="serach_by_corporate" class="form-control" style="width: 50px; border: none"><i class="fa fa-search"></i></button>
							</form>
						</div>
							
						
                   <br> <br> 
                    <hr class="light-grey-hr"/>
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="example" class="table table-hover display  pb-30" >
                           <?php $fetchdutyslip = fetchdutyslip(1); 
                          if(!empty($fetchdutyslip)) { ?>
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Duty Of</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Dutyslip No</th>
															<th>Duty Of</th>
															<th>Driver Name</th>
															<th>Total Kilometer</th>
															<th class="text-nowrap">Action</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
										 					$i = 1;
                              $fetchdutyslip = fetchdutyslip(1);
                              foreach ($fetchdutyslip as $v1) {
								  $duty_of = $v1['corporate_id'];
								  $select_dutyof_name = select_dutyof_name($duty_of);
								 // print_r($select_dutyof_name)
										 					?>
														<tr>
															<td>#<?php echo $i; ?></td>
															<td><?php echo $v1['start_date'];?></td>
															<td><?php echo $v1['dutyslip_slno'];?></td>
															
															<td><?php echo $select_dutyof_name['name'];?></td>
															<td><?php echo $v1['driver_name'];?></td>
															<td><?php echo $v1['total_km'];?></td>
															
															
															
															<td class="text-nowrap"><a href="dutyslip_print_relax_corporate.php?printid=<?php echo $v1['id']; ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a> <a onClick="delete_buyer(<?php echo $v1['id'];?>);" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close  text-danger"></i> </a> </td>
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
					<?php  } ?>
					
					
					
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
  <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script>
	function edit(val) {
		$.ajax({
		type: "POST",
		url: "ajax_edit_dutyslip.php",
		data:'id='+val,
		success: function(data){
			$("#form11").html(data);
			//$('#pks1').load(document.URL +  ' #pks1');

		}
		});
		}

		function delete_buyer(val){
			$.ajax({
			type: "POST",
			url: "ajax_delete_dutyslip_corporate.php",
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
