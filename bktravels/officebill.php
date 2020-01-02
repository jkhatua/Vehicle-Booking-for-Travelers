<?php
   if(!isset($_SESSION))
   {
   	session_start();
   }
   if(!$_SESSION){
   header('location:index.php'); }
   $sessionname = $_SESSION['login_user'];
   if($sessionname){
   
   	$date = date ("Y-m-d H:i:s");//, strtotime($date1));
   //$today = getdate();
   include('config.php');
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <style>
      .table-align{
      text-align: center;
      height: 40px;
      }
   </style>
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
         <!-- Main Content -->
         <div class="page-wrapper">
            <div class="container-fluid">
               <!-- Title -->
               <div class="row heading-bg">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h5 class="txt-dark">Monthly Bill</h5>
                  </div>
                  <!-- Breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="#"><span>Component</span></a></li>
                        <li class="active"><span>Monthly Bill</span></li>
                     </ol>
                  </div>
                  <!-- /Breadcrumb -->
               </div>
               <!-- /Title -->
               <form method="post" id="monthly_bill" action="ajax_submit_officebill.php" name="monthly_bill">
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
                                          <div class="form-body">
                                             <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Enter Monthly Bill</h6>
                                             <hr class="light-grey-hr"/>
                                             <div class="row">
											 <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Client Name</label>
                                                      <input type="text" name="client_name" required class="form-control" placeholder="Enter Client Name">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Reference Number </label>
                                                      <input type="text" name="invoice_no" required class="form-control" placeholder="Enter Invoice no">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-sm-3">
                                                   <div class="form-group">
                                                      <label class="control-label mb-10 ">Date</label>
                                                      <input type='date' name="start_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo date('Y-m-d'); ?>"/ required>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">GST Number</label>
                                                      <input type="text" name="gst_no" required class="form-control" placeholder="Enter GST Number">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">SAC Code</label>
                                                      <input type="text" name="sac_code" required class="form-control" placeholder="Enter SAC Code">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Bill No</label>
                                                      <input type="text" name="bill_no" required class="form-control" placeholder="Enter Bill No">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Month</label>
                                                      <input type="text" name="month" required class="form-control" placeholder="Enter Month">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Total K.M. Cover</label>
                                                      <input type="text" name="total_km_cover" id="total_km_cover" required class="form-control" placeholder="Total K.M. Cover">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">K.M. Covers in 1 Ltr</label>
                                                      <input type="text" name="km_cover_liter" id="km_cover_liter" required class="form-control" placeholder="K.M. Covers in 1 Ltr">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Total Fuel Consume</label>
                                                      <input type="text" name="fuel_consume" id="fuel_consume" required class="form-control" placeholder="Total Fuel Consume" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Fuel Rate</label>
                                                      <input type="text" name="fuel_rate" id="fuel_rate" required class="form-control" placeholder="Enter Fuel Rate">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Sub Total</label>
                                                      <input type="text" name="sub_total" id="sub_total" required class="form-control" placeholder="Sub Total" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">K.M. Covers / Engine Oil</label>
                                                      <input type="text" name="km_covers_engine_oil" id="km_covers_engine_oil" required class="form-control" placeholder="Enter K.M. Covers / Engine Oil">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Total Engine Oil Consumed</label>
                                                      <input type="text" name="engine_oil_consumed" id="engine_oil_consumed" required class="form-control" placeholder="Enter Total Engine Oil Consumed" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Engine Oil Rate</label>
                                                      <input type="text" name="engine_oil_rate" id="engine_oil_rate" required class="form-control" placeholder="Enter Engine Oil Rate">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Charge for Engine Oil</label>
                                                      <input type="text" name="engine_oil_charge" id="engine_oil_charge" required class="form-control" placeholder="Enter Month" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Sub Total</label>
                                                      <input type="text" name="sub_total1" id="sub_total1" required class="form-control" placeholder="Enter Sub Total" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
												<div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">No of Working Days</label>
                                                      <input type="text" name="no_of_working_days" id="no_of_working_days" required class="form-control" placeholder="No of Working Days">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
												<div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Per day charge</label>
                                                      <input type="text" name="per_day_charge" id="per_day_charge" required class="form-control" placeholder="Per day charge">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
												<div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Sub Total</label>
                                                      <input type="text" name="sub_total2" id="sub_total2" required class="form-control" placeholder="Enter Sub Total" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">SGST</label>
                                                      <input type="text" name="sgst" id="sgst" required class="form-control" placeholder="Enter SGST" value="2.5 %">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">CGST</label>
                                                      <input type="text" name="cgst" id="cgst" required class="form-control" placeholder="Enter cgst" value="2.5 %">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-group ">
                                                      <label class="control-label mb-10">Grand Total</label>
                                                      <input type="text" name="grand_total" id="grand_total" required class="form-control" placeholder="Enter Grand Total" readonly="" style="color:#000000">
                                                      <span class="help-block">  </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <div class="form-actions mt-10">
                              <button type="submit" class="btn btn-success  mr-10">Save</button>
                              <button type="reset" value="Reset" class="btn btn-default">Reset</button>
                            </div>
               </form>
               <!-- /Row -->
               <!-- Footer -->
               <?php include("include/footer.php");?>
               <!-- /Footer -->
            </div>
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
      <script src="vendors/bower_components/moment/min/moment.min.js"></script>
      <!-- Slimscroll JavaScript -->
      <script src="dist/js/jquery.slimscroll.js"></script>
      <!-- Bootstrap-table JavaScript -->
      <script src="vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
      <script src="dist/js/bootstrap-table-data.js"></script>
      <!-- Fancy Dropdown JS -->
      <script src="dist/js/dropdown-bootstrap-extended.js"></script>
      <!-- Owl JavaScript -->
      <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
      <!-- Switchery JavaScript -->
      <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
      <!-- Bootstrap Datetimepicker JavaScript -->
      <script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Bootstrap Daterangepicker JavaScript -->
      <script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
      <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
      <!-- Init JavaScript -->
      <script src="dist/js/init.js"></script>
      </form>
	  <script type="text/javascript">
      
	  // form submit
	  var frm = $('#monthly_bill');
      frm.submit(function (e) {
          e.preventDefault();
          $.ajax({
              type: frm.attr('method'),
              url:  frm.attr('action'),
              data: frm.serialize(),
              success: function (data) {
                  swal("Good job!", "Monthly Bill Successfully Created!!", "success")
				 // alert (data);
                  $('#submit_seller')[0].reset();
              },
              error: function (data) {
                  alert('An error occurred.');
              },
          });
      });
	  
//Total Fuel Consume calculation
$("#km_cover_liter").on("change paste keyup", function(){
  
   var totalkm=$("#total_km_cover").val();
   var kmcoversliter=$("#km_cover_liter").val();
  
   var fuelconsume=parseFloat(totalkm)/parseFloat(kmcoversliter);
   
   $("#fuel_consume").val(fuelconsume);
   });
   
// Sub total calculation  
$("#fuel_rate").on("change paste keyup", function(){
  
   var fuelrate=$("#fuel_rate").val();
   var fuelconsume=$("#fuel_consume").val();
  
   var subtotall=(fuelrate*fuelconsume);
   $("#sub_total").val(subtotall);
   });
   
   
// Engine oil consumed calculation 
$("#km_covers_engine_oil").on("change paste keyup", function(){
  
   var totalkm=$("#total_km_cover").val();
   var kmcoversengine_oil=$("#km_covers_engine_oil").val();
  
   var kmcover=(totalkm/kmcoversengine_oil);
   $("#engine_oil_consumed").val(kmcover);
   });
   
// Charge for Engine oil calculation 
$("#engine_oil_rate").on("change paste keyup", function(){
  
   var engineoilconsumed=$("#engine_oil_consumed").val();
   var engineoilrate=$("#engine_oil_rate").val();
  
   var oilcharge=(engineoilconsumed*engineoilrate);
   $("#engine_oil_charge").val(oilcharge);
   });
   
// Total calculation (partly)
$("#engine_oil_charge").on("change paste keyup", function(){
  
   var subtotal=$("#sub_total").val();
   var engineoilcharge=$("#engine_oil_charge").val();
  
   var subtotal11=parseFloat(subtotal)+parseFloat(engineoilcharge);
   $("#sub_total1").val(subtotal11);
   });
   
 // Total no of working days charge
$("#per_day_charge").on("change paste keyup", function(){
  
   var subtota22=$("#no_of_working_days").val();
   var perdaycharge=$("#per_day_charge").val();
  
   var subtotal22=subtota22*perdaycharge;
   $("#sub_total2").val(subtotal22);
   });
   
// Grand Total calculation (final)
$("#sub_total2").on("change paste keyup", function(){
  
   var subtotal12 = $("#sub_total1").val();
   var subtota222 = $("#sub_total2").val();
   var total123 = parseFloat(subtotal12)+parseFloat(subtota222)
   
   var grandtotal=(parseFloat(total123)+(parseFloat(total123)*5)/100);
   $("#grand_total").val(grandtotal);
   });
  </script>
   </body>
</html>
<?php } ?>