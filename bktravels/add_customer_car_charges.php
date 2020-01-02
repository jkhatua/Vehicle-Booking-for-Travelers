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
              <h5 class="txt-dark">Add Car Charges For customer</h5>
            </div>


            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="active"><span>Add Car Charges For customer</span></li>
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
                          <form id="submit_seller" action="ajax_add_customer_car_charges.php" method="post" >
                            <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add Car Charges For customer</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                
                                
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle Name</label>
                                      <select name="vehicle_name" class="form-control" >
                                      <option value="" selected disabled>Select vehicle Name</option>
                                      <?php $fetchcarno = fetchcar();
                                           foreach ($fetchcarno as $v1) { ?>
                                      <option value="<?php echo $v1['id']."$".$v1['vehicle_name'];?>"><?php echo $v1['vehicle_name'];?></option>
                                      <?php }?>
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                <div class="col-md-6">
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
                                
                <div class="col-md-6" id="day_charge_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Day Charge</label>
                                    <input type="text"  maxlength="50" name="day_charge" id="day_charge" class="form-control"  placeholder="Day charge">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                <div class="col-md-6" id="nighthalt_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Night Holt Charge</label>
                                    <input type="text"  maxlength="50" name="night_holt_charge"  class="form-control"  placeholder="Price For Night Holt">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6"  id="kmforlitrediv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Kilometer Cover in 1 Litre </label>
                                    <input type="text"  name="km_cover_in_one_litre"  id="km_cover_in_one_litre" class="form-control" placeholder="Enter Distance in km">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                <div class="col-md-6" id="hour_charges_div">
                                  <div class="form-group">
                                   <label class="control-label mb-10">Extra Hour charges (hourly)</label>
                                    <input type="text" name="extra_hour_charges" id="extra_hour_charges" class="form-control" placeholder="Extra Hour">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                 <div class="col-md-6" id="priceper_kmdiv">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">price(per kilometer)</label>
                                    <input type='text' name="price_per_km" id="price_per_km" class="form-control"  placeholder="price/kilometer">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                 <div class="col-md-6" id="detaintion_div">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">Detaintion Charges</label>
                                    <input type='text' name="detaintion_charges" id="detaintion_charges" class="form-control"  placeholder="Detaintion Charges">
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


$(document).on('change', '#charging_type', function()
            {
              if($("#charging_type").val()=="local")
                  {
                    $('#nighthalt_div').show();
                    $('#day_charge_div').show();
                     $('#hour_charges_div').show();
                  $('#priceper_kmdiv').hide();
                  $('#kmforlitrediv').show();
                  $('#detaintion_div').hide();
                  }
                if($("#charging_type").val()=="long"){
                  $('#nighthalt_div').show();
                  $('#day_charge_div').hide();
                  $('#hour_charges_div').hide();
                  $('#priceper_kmdiv').show();
                  $('#kmforlitrediv').hide();
                  $('#detaintion_div').show();
                }
                // if($("#charging_type").val()=="fixed"){
                  
                //   $('#nighthalt_div').hide();
                //   $('#toolgate_div').hide();
                //   $('#day_charge_div').hide();hour_charges_divpriceper_kmdivkmforlitredivnighthalt_div

                // }
              //alert('fgdfh');
            });

  </script>
  </body>

</html>
<?php } ?>
