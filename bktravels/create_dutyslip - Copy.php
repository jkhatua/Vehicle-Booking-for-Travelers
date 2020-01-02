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

    function fetchemployee($driver){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      emp_name
      FROM employee_details WHERE 
      emp_catagory = ?
       ");
       $stmt->bind_param("s",$driver);
       $stmt->execute();
       $stmt->bind_result($id,$emp_name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'emp_name'=>$emp_name);
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }
  function fetchcar(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      vehicle_name
      FROM car
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$vehicle_name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'vehicle_name'=>$vehicle_name);
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }
    function fetchcarno(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      vehicle_no,
      vehicle_id,
      vehicle_name
      FROM car_details
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$vehicle_no,$vehicle_id,$vehicle_name);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name);
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }

  global $mysqli;
if ($sql = $mysqli->prepare("SELECT MAX(dutyslip_slno) AS id FROM duty_slip "))
 {
//SELECT MAX( customer_id ) + 1, 'jim', 'sock' FROM customers;
    $sql->execute();
    
    $result = $sql->get_result();
    if ($result->num_rows > 0) {    
    $row11 = $result->fetch_assoc();
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
							<h5 class="txt-dark">Add Duty Slip Details</h5>
						</div>


						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li class="active"><span>Add Duty Slip Details</span></li>
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
                          <form id="submit_seller" action="ajax_submit_dutyslip.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add Duty Slip Details</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Serial No</label>
                                    <input type="number" name="dutyslipsl_no" id="dutyslipsl_no" class="form-control"   
                                    value="<?php 
                                    $val1= $row11['id'];
                                    echo $val1;?>" style="background-color: black;" >
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Duty of</label>
                                    <input type="text" name="duty_of" id="duty_of" class="form-control"  placeholder="Duty of">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Report At</label>
                                    <input type="text"  maxlength="50" name="report_at"  class="form-control"  placeholder="Report at">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
								              <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Booked By</label>
                                    <input type="text"  maxlength="30" name="booked_by"  class="form-control"  placeholder="Booked By">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                
                                 <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle Name</label>
                                      <select name="vehicle_name" id="vehicle_name" class="form-control" >
                                      <option value="" selected disabled>Select vehicle Name</option>
                                      <?php $fetchcarno1 = fetchcar();
                                           foreach ($fetchcarno1 as $v2) { ?>
                                      <option value="<?php echo $v2['id'];?>"><?php echo $v2['vehicle_name'];?></option>
                                      <?php }?>
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                              
  								              <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle No</label>
                                      <select name="vehicle_no" id="vehicle_no" class="form-control" >
                                      
                                      
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
  								              <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Driver Name</label>
                                      <select name="driver_name" class="form-control" >
                                      <option value="" selected disabled>Select Driver</option>
                                      <?php $fetchdrivername = fetchemployee("driver");
                                           foreach ($fetchdrivername as $v1) { ?>
                                      <option value="<?php echo $v1['emp_name'];?>"><?php echo $v1['emp_name'];?></option>
                                      <?php }?>
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Today Date</label>
                                      <input type='date' name="today_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                
                                
                             
                             
                                  <div class="col-md-4">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Place From</label>
                                      <input type="text"  maxlength="50" name="place_from"  class="form-control"  placeholder="Enter Starting Place">
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Place To</label>
                                    <input type="text"  maxlength="50" name="place_to"  class="form-control"  placeholder="Enter Ending Place">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                  <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Date</label>
                                    <input type='date' name="start_date" class="form-control"  id="start_date" placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Date</label>
                                    <input type='date' name="closing_date" class="form-control"  id="closing_date" placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Kilometer</label>
                                    <input type="text"  maxlength="50" name="starting_km" id="starting_km" class="form-control"  placeholder="Kilometer Starting From">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Kilometer</label>
                                    <input type="text"  maxlength="50" name="closing_km" id="closing_km" class="form-control"  placeholder="Ending Kilometer">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Kilometer</label>
                                    <input type="text"  maxlength="50" name="total_km" id="total_km" class="form-control"  placeholder="Total Kilometer">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Time</label>
                                    <input type="time"  maxlength="50" name="start_time"  id="start_time" class="form-control"  placeholder="Starting Time" value="08:56">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                 <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Time</label>
                                    <input type="time"  maxlength="50" name="closing_time" id="closing_time" class="form-control"  placeholder="closing Time" value="10:36">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Time</label>
                                    <input type="text"  maxlength="50" name="total_time" id="total_time" class="form-control"  placeholder="Total Time">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                               
                                
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Charging Type</label>
                                    <select name="charging_type" id="charging_type" class="form-control" >
                                      <option value="" selected disabled>Select Charging Type</option>
                                      
                                      <option value="long">Long</option>
                                      <option value="local">Local</option>
                                      <option value="fixed">Fixed</option>
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                 <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">AC/NON-AC</label>
                                    <select name="ac_nonac" class="form-control" >
                                      <option value="" selected disabled>Select AC/NON-AC</option>
                                      
                                      <option value="ac">AC</option>
                                      <option value="nonac">NON-AC</option>
                                      
                                    </select>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                   <div class="col-md-4" id="nighthalt_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Night Holt Charge</label>
                                    <input type="text"  maxlength="50" name="day_night_holt"  class="form-control"  placeholder="Price For Night Holt">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="toolgate_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Tool Gate Charge</label>
                                    <input type="text"  maxlength="50" name="tool_gate"  class="form-control"  placeholder="Enter Toll Gate Charge">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                                 <div class="col-md-4" id="parking_div">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">Parking Charge</label>
                                    <input type="text"  maxlength="50" name="parking_charge"  class="form-control"  placeholder="Price For Parking Charge">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                             
                              <!--   <div class="col-md-4" id="day_charge_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Day Charge</label>
                                    <input type="text"  maxlength="50" name="day_charge" id="day_charge" class="form-control"  placeholder="Price For Night Holt">
                                    <span class="help-block"> </span>
                                  </div>
                                </div> -->
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Advance Paid by Client</label>
                                    <input type="text"  maxlength="50" name="advance_paid_client"  class="form-control"  placeholder="Enter Client Advance">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                  <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Advance Paid by Travels</label>
                                    <input type="text"  maxlength="50" name="advance_paid_travel"  class="form-control"  placeholder="Enter Travels Advance">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                               <!--  <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total</label>
                                    <input type="text"  maxlength="50" name="total"  class="form-control"  placeholder="Total Price">
                                    <span class="help-block"> </span>
                                  </div>
                                </div> -->
                               
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
                 swal("Good job!", "Vehicle Details Successfully Added!!", "success")
				          //alert (data);
                 $('#submit_seller')[0].reset();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });

// $(document).ready(function(){
    // valueStart = $("#start_time").val();
//     valueStop = parseInt($("#closing_time").val());

//     var totaltime=valueStop - valueStart;

// var diff=(Date.parse(str1)-Date.parse(str0))/1000/60;
// var hours=String(100+Math.floor(diff/60)).substr(1);
// var mins=String(100+diff%60).substr(1);
$("#closing_km").on("change paste keyup", function(){
  //alert("valgjhueStart");
   var startingkilometer=$("#starting_km").val();
   var closingkilometer=$("#closing_km").val();
   var totalkilometer=closingkilometer - startingkilometer;
  // //alert(totalkilometer);
   $("#total_km").val(totalkilometer);
});
// $('#total_time').mouseenter(function() {

// var startingtime=$("#start_time").val();
// var closingtime=$("#closing_time").val();
// alert(closingtime);
// //alert('ddgdh');

// });
$( "#closing_time" ).keyup(function() {
var startdt = new Date($("#start_date").val() + " " + $("#start_time").val());

var enddt = new Date($("#closing_date").val() + " " + $("#closing_time").val());

var diff = enddt - startdt;
//alert(enddt);
var days = Math.floor(diff / (1000 * 60 * 60 * 24));
diff -=  days * (1000 * 60 * 60 * 24);

var hours = Math.floor(diff / (1000 * 60 * 60));
diff -= hours * (1000 * 60 * 60);

var mins = Math.floor(diff / (1000 * 60));
diff -= mins * (1000 * 60);

var seconds = Math.floor(diff / (1000));
diff -= seconds * (1000);

$("#total_time").val(days + " days : " + hours + " hours : " + mins + " minutes : " + seconds + " seconds");
});

// $( document ).ready(function() {
//    //if($("#charging_type").val()=="fixed"){
//     alert("fix");
//    } 
// });
$(document).on('change', '#charging_type', function()
            {
              if($("#charging_type").val()=="local")
                  {
                    $('#nighthalt_div').hide();
                    $('#day_charge_div').show();
                  }
                if($("#charging_type").val()=="long"){
                  $('#nighthalt_div').show();
                  $('#day_charge_div').hide();
                }
                if($("#charging_type").val()=="fixed"){
                  
                  $('#nighthalt_div').hide();
                  $('#toolgate_div').hide();
                  $('#day_charge_div').hide();

                }
              //alert('fgdfh');
            });

$(document).on('change', '#vehicle_name', function()
            {

              var vehicle_id = $("#vehicle_name").val();

              jQuery.ajax
              ({
                type:"post",
                url:"ajax_get_vehicle_no.php",
                dataType:"html", // Data type, HTML, json etc.
                data:{vehicle_id:vehicle_id},
                success:function(response)
                {
                 // var abc = json_decode(response);
                  //alert(response);vehicle_no
                 //document.getElementById("vehicle_no").innerHTML=response;
                 $('#vehicle_no').html(response);
                 //alert(response);
                }
              });
              
            });
$(document).on('change', '#total_km', function()
  
            {

              var vehicle_id = $("#vehicle_name").val();
              alert(vehicle_id);
              // jQuery.ajax
              // ({
              //   type:"post",
              //   url:"ajax_get_car_charges.php",
              //   dataType:"html", // Data type, HTML, json etc.
              //   data:{vehicle_id:vehicle_id},
              //   success:function(response)
              //   {
              //    // var abc = json_decode(response);
              //     //alert(response);vehicle_no
              //    //document.getElementById("vehicle_no").innerHTML=response;
              //    $('#vehicle_no').html(response);
              //    //alert(response);
              //   }
              // });
              
            });

  </script>
 
	</body>

</html>
<?php } ?>
