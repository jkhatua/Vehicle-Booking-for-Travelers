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
              <h5 class="txt-dark">Customer's Payment Slip</h5>
            </div>


            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="active"><span>Customer's Payment Slip</span></li>
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
                    <h6 class="panel-title txt-dark"> </h6>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                          <form id="submit_seller" action="ajax_submit_customer_payment_slip.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Customer's Payment Slip</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                   <label class="control-label mb-10">Duty Slip No</label>
                                    <input type="text" name="duty_slip_no" id="duty_slip_no" class="form-control" placeholder="Duty Slip No">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Duty Date</label>
                                    <input type="date" name="duty_date" id="duty_date" class="form-control">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Journey To</label>
                                    <input type="text" name="journey_to" id="journey_to" class="form-control"  placeholder="Journey To">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Vehicle No</label>
                                    <input type="text"  maxlength="20" name="vehicle_no" id="vehicle_no" class="form-control"  placeholder="Vehicle No">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting K.M.</label>
                                    <input type="text"  name="starting_km" id="starting_km" class="form-control" placeholder="Starting K.M.">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing K.M.</label>
                                    <input type='text' name="closing_km" id="closing_km" class="form-control"  placeholder="Closing K.M.">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total K.M.</label>
                                  <input type='text' name="total_km" id="total_km" class="form-control"  placeholder="Total K.M.">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Time</label>
                                  <input type="text" name="starting_time" id="starting_time" style="text-transform:uppercase"  class="form-control" placeholder="Starting Time">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Time</label>
                                  <input type="text"  name="closing_time" id="closing_time" class="form-control"  placeholder="Closing Time">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Time</label>
                                    <input type="text"  name="total_time" id="total_time"   class="form-control" placeholder="Total Time">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Charging Type</label>
                                    <input type="text"  name="charging_type" id="charging_type"   class="form-control" placeholder="charging type">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                <div class="col-md-6">
                                  <div class="form-group">
                                   <label class="control-label mb-10">Extra Hour</label>
                                    <input type="text" name="extra_hour" id="extra_hour" class="form-control" placeholder="Extra Hour">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6" id="night_haltdiv">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Night Halt</label>
                                    <input type="text" name="night_halt" id="night_halt" class="form-control" placeholder="Night Halt">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6" id="tool_gatediv">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Toll Gate</label>
                                    <input type="text" name="tool_gate" id="tool_gate" class="form-control"  placeholder="Tool Gate">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6"  id="parking_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Parking</label>
                                    <input type="text" name="parking" id="parking" class="form-control"  placeholder="Parking Charge">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6"  id="kmforlitrediv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Distance Cover in 1 Litre (in km) </label>
                                    <input type="text"  name="kmforlitre"  id="kmforlitre" class="form-control" placeholder="Enter Distance in km">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6" id="fuel_ratediv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Fuel Rate</label>
                                    <input type='text' name="fuel_rate" id="fuel_rate" class="form-control"  placeholder="Fuel Rate">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6"  id="day_basicdiv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Day Basic</label>
                                    <input type="text"  name="day_basic"  id="day_basic" class="form-control" placeholder="Enter Distance in km">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                
                                <div class="col-md-6" id="priceper_kmdiv">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">price(per kilometer)</label>
                                    <input type='text' name="priceper_km" id="priceper_km" class="form-control"  placeholder="price/kilometer">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                
                                <div class="col-md-6" id="day_chargediv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Day Charge</label>
                                  <input type="text" name="day_charge" id="day_charge" class="form-control" placeholder="Day Charge">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Amount</label>
                                  <input type='text' name="amount" id="amount" class="form-control"  placeholder="Amount">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                <!-- <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Advance From Office</label>
                                  <input type="text"  name="advance_office" id="advance_office" class="form-control"  placeholder="Advance From Office">
                                    <span class="help-block">  </span>
                                  </div>
                                </div> -->
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Advance From Guest</label>
                                    <input type="text"  name="advance_guest"  id="advance_guest" class="form-control" placeholder="Advance From Guest">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                               <!--  <div class="col-md-6" id="total_advdiv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Advance</label>
                                    <input type="text"  name="total_adv"  id="total_adv" class="form-control" placeholder="Total Advance">
                                    <span class="help-block">  </span>
                                  </div>
                                </div> -->
                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Pay Amount</label>
                                    <input type="text"  name="total_amount"  id="total_amount"  class="form-control" placeholder="Total Amount">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Remarks</label>
                                    <input type="text"  name="remark"  id="remark"  class="form-control" placeholder="Remark">
                                    <span class="help-block">  </span>
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
        </div>

        <!-- Footer -->
        <?php include("include/footer.php"); ?>
        <!-- /Footer -->

      </div>
      <!-- /Main Content -->

    </div>
    
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

$(document).on('blur', '#duty_slip_no', function()
            {
              //alert("asd");
             
              var serial_no = $("#duty_slip_no").val();
              //alert(itemtypeid);

              jQuery.ajax
              ({
                type:"post",
                url:"ajax_dutyslip_get.php",
                dataType:"html", // Data type, HTML, json etc.
                data:{serial_no:serial_no},
                success:function(response)
                {
                  //console.log(response);
                  obj = JSON.parse(response);
                  //console.log(obj.length);
                  console.log(obj);
                 // alert(obj['place_to']);
                  $('#journey_to').val(obj['place_to']);
                  $('#duty_date').val(obj['start_date']);
                  $('#vehicle_no').val(obj['car_no']);
                  $('#starting_km').val(obj['starting_km']);
                  $('#closing_km').val(obj['closing_km']);
                  $('#total_km').val(obj['total_km']);
                  $('#starting_time').val(obj['start_time']);
                  $('#closing_time').val(obj['closing_time']);
                  $('#total_time').val(obj['total_time']);
                  $('#night_halt').val(obj['day_night_holt']);
                  $('#day_charge').val(obj['day_charge']);
                  $('#tool_gate').val(obj['toll_gate']);
                  $('#parking').val(obj['parking_charge']);
                  //$('#advance_office').val(obj['advance_paid_travel']);
                  $('#advance_guest').val(obj['advance_paid_client']);
                  $('#charging_type').val(obj['charging_type']);
                  
                  if($("#charging_type").val()=="long")
                  {
                  //alert('dfgh');
                  
                  //$('#night_haltdiv').hide();
                  $('#day_basicdiv').hide();
                  $('#fuel_ratediv').hide();
                  $('#day_chargediv').hide();
                   $('#night_haltdiv').show();
                   $('#kmforlitrediv').hide();
                  //$('#day_basicdiv').hide();
                  //$('#fuel_ratediv').hide();
                  //$('#day_chargediv').hide();
                  $('#total_advdiv').show();
                  $('#tool_gatediv').show();
                  $('#parking_div').show();
                  $('#priceper_kmdiv').show();
                  
                  $('#total_amount').val(0);
                  $('#amount').val(0);
                  
                  $("#priceper_km").on("keyup change", function() {
                     
                     var totalkm=$('#total_km').val();
                     var priceper_km=$('#priceper_km').val();
                     var totalinitialamount = priceper_km * totalkm;
                     //alert( totalinitialamount );
                     $('#amount').val(totalinitialamount);
                     //var parking_charge=$('#parking').val();
                     //var tool_charge=$('#tool_gate').val();
                     //var nighthalt=$('#night_halt').val();
                     var advguest_amount=$('#advance_guest').val();
                     //var advoffice_amount=$('#advance_office').val();
                     var tot_amnt = $('#amount').val();
                     //var totalchargespaid =parseInt(tool_charge)+parseInt(parking_charge)+parseInt(nighthalt)+parseInt(advguest_amount)+parseInt(advoffice_amount);
                     var totalhavetopay = parseInt(tot_amnt) - parseInt(advguest_amount);
                     //$('#total_adv').val(totalchargespaid);
                     //var totalchargespaid =totalchargespaid.toFixed();
                    $('#total_amount').val(totalhavetopay);
                  });
                  
                  }
                   if($("#charging_type").val()=="local")
                  {
                  //alert('dfgh');
                  $('#night_haltdiv').hide();
                  $('#kmforlitrediv').show();
                  $('#day_basicdiv').show();
                  $('#fuel_ratediv').show();
                  $('#priceper_kmdiv').hide();
                  $('#day_chargediv').show();
                  $('#total_amount').val(0);
                  $('#amount').val(0);
                  $('#total_adv').val(0);
                  $("#fuel_rate").on("keyup change", function() {
                     //alert('fdhgf');
                      var totalkm=$('#total_km').val();
                      var kmforlitre=$('#kmforlitre').val();
                      var fuelrate=$('#fuel_rate').val();
                      var totalfuel=totalkm/kmforlitre;
                      var daybasic=Math.round(totalfuel*fuelrate);
                       $('#day_basic').val(daybasic);
                     //alert(daybasic);
                     var day_charge=$('#day_charge').val();
                     var totalamount=parseInt(daybasic)+parseInt(day_charge);
                     $('#amount').val(totalamount);
                     var adv_guest=$('#advance_guest').val();
                     //var adv_off=$('#advance_office').val();
                     //var totaladv=parseInt(adv_guest)+parseInt(adv_off);
                     //$('#total_adv').val(totaladv);
                     var payamount=parseInt(totalamount)-parseInt(adv_guest);
                     $('#total_amount').val(payamount);
                      
                  });
                  }
                    if($("#charging_type").val()=="fixed")
                  {
                  //alert('dfgh');
                  $('#night_haltdiv').hide();
                  $('#day_basicdiv').hide();
                  $('#kmforlitrediv').hide();
                  $('#fuel_ratediv').hide();
                  $('#day_chargediv').hide();
                  //$('#total_advdiv').show();
                  $('#tool_gatediv').hide();
                  $('#parking_div').hide();
                  $('#priceper_kmdiv').hide();
                  $('#total_amount').val(0);
                  $('#amount').val(0);
                  //$('#total_adv').val(0);

                   $("#amount").on("keyup change", function() {
                     
                      var advguest_amount=$('#advance_guest').val();
                      //var advoffice_amount=$('#advance_office').val();
                      var tot_amnt = $('#amount').val();
                      //var totalchargespaid =parseInt(advguest_amount)+parseInt(advoffice_amount);
                      var totalhavetopay = parseInt(tot_amnt) - parseInt(advguest_amount);
                     
                      //$('#total_adv').val(totalchargespaid);
                      $('#total_amount').val(totalhavetopay);
                  });
                  
                  }
                  
                }
              });


            });

  </script>
  </body>

</html>
<?php } ?>