<?php
   include("config.php");
   $id = $_POST['id'];
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
      vehicle_name,
      size
      FROM car
       ");
       //$stmt->bind_param("s",$status);
       $stmt->execute();
       $stmt->bind_result($id,$vehicle_name,$size);
       while($stmt->fetch()){
         $row[]=array('id'=>$id,'vehicle_name'=>$vehicle_name,'size'=>$size);
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
       
   function fetchownercarcharges($id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
       id,
       dutyslip_slno,
    duty_of,
    report_at,
    booked_by,
    vehicle_no,
    vehicle_id,
    vehicle_name,
    vehicle_size,
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
    charging_type,
    ac_nonac,
    toll_gate,
    parking_charge,
    advance_paid_client,
    advance_paid_travel
       FROM duty_slip
       WHERE id = ?
        ");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id,$dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'dutyslip_slno'=>$dutyslip_slno,'duty_of'=>$duty_of,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'vehicle_size'=>$vehicle_size,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'charging_type'=>$charging_type,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel);
        }
        $stmt->close();
       if(!empty($row)){
       return ($row);
       }
       else {
          return "";
        }
   }
   //print_r($id);
   $fetchownercarcharges = fetchownercarcharges($id);
   //print_r($fetchemployeeByID);
   foreach ($fetchownercarcharges as $v2) {
   ?>
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default card-view">
         <div class="panel-heading">
            <div class="pull-left">
               <h6 class="panel-title txt-dark">  </h6>
            </div>
            <div class="clearfix"></div>
         </div>
         <div class="panel-wrapper collapse in">
            <div class="panel-body">
               <div class="row">
                  <div class="col-sm-12 col-xs-12">
                     <div class="form-wrap">
                        <form id="form1" action="ajax_edit_owner_car_charges_submit.php" method="post" >
                           <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Edit Dutyslip</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Duty Slip No</label>
                                    <input type="number" name="dutyslip_slno" id="dutyslip_slno" class="form-control"   
                                    value="<?php echo $v2['dutyslip_slno'];?>" style="background-color: black;" readonly>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label mb-10">Duty of</label>
                                    <input type="text" name="duty_of" id="duty_of" class="form-control"  value="<?php echo $v2['duty_of'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Report At</label>
                                    <input type="text"  maxlength="50" name="report_at"  class="form-control"  value="<?php echo $v2['report_at'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Booked By</label>
                                    <input type="text"  maxlength="30" name="booked_by"  class="form-control" value="<?php echo $v2['booked_by'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                
                                 <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle Name</label>
                                     
                                    <input type="text"  maxlength="50" name="vehicle_name"  id="vehicle_name"  class="form-control" value="<?php echo $v2['vehicle_name'];?>" style="background-color: black;" readonly>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                              
                                <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle No</label>
                                      <input type="text"  maxlength="50" name="vehicle_no"  id="vehicle_no"  class="form-control" value="<?php echo $v2['vehicle_no'];?>" style="background-color: black;" readonly>
                                      
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Driver Name</label>
                                      
                                    <input type="text"  maxlength="50" name="driver_name"  id="driver_name"  class="form-control" value="<?php echo $v2['driver_name'];?>" style="background-color: black;" readonly>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Only Fixed</label>
                                      <select name="fixed_type" id="fixed_type" class="form-control" >
                                          <option value="" selected>Choose Fixed</option>
                                          <option value="fixed">Fixed</option>
                                      </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                
                                
                             
                             
                                  <div class="col-md-3">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Place From</label>
                                      <input type="text"  maxlength="50" name="place_from"  class="form-control" value="<?php echo $v2['place_from'];?>">
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Place To</label>
                                    <input type="text"  maxlength="50" name="place_to"  class="form-control" value="<?php echo $v2['place_to'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                  <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Date</label>
                                    <input type='date' name="start_date" class="form-control"  id="start_date" value="<?php echo $v2['start_date'];?>"/>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Date</label>
                                    <input type='date' name="closing_date" class="form-control"  id="closing_date" value="<?php echo $v2['closing_date'];?>"/>
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Kilometer</label>
                                    <input type="text"  maxlength="50" name="starting_km" id="starting_km" class="form-control" value="<?php echo $v2['starting_km'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Kilometer</label>
                                    <input type="text"  maxlength="50" name="closing_km" id="closing_km" class="form-control"  value="<?php echo $v2['closing_km'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Kilometer</label>
                                    <input type="text"  maxlength="50" name="total_km" id="total_km" class="form-control"  value="<?php echo $v2['total_km'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Starting Time</label>
                                    <input type="time"  maxlength="50" name="start_time"  id="start_time" class="form-control" value="<?php echo $v2['start_time'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                 <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Closing Time</label>
                                    <input type="time"  maxlength="50" name="closing_time" id="closing_time" class="form-control"  value="<?php echo $v2['closing_time'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Total Time</label>
                                    <input type="text"  maxlength="50" name="total_time" id="total_time" class="form-control"  value="<?php echo $v2['total_time'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                               
                                
                                <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Charging Type</label>
                                    <input type="text"   name="charging_type"  id="charging_type" class="form-control" value="<?php echo $v2['charging_type'];?>" >
                                    
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
                                  <!--  <div class="col-md-4" id="nighthalt_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Night Halt Charge</label>
                                    <input type="text"  maxlength="50" name="day_night_holt"  class="form-control"  placeholder="Price For Night Holt">
                                    <span class="help-block"> </span>
                                  </div>
                                </div> -->
                                <div class="col-md-4" id="toolgate_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Toll Gate Charge</label>
                                    <input type="text"  maxlength="50" name="toll_gate"  class="form-control" value="<?php echo $v2['toll_gate'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                              
                              
                                 <div class="col-md-4" id="parking_div">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">Parking Charge</label>
                                    <input type="text"  maxlength="50" name="parking_charge"  class="form-control"  value="<?php echo $v2['parking_charge'];?>">
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
                                    <input type="text"  maxlength="50" name="advance_paid_client"  class="form-control"  value="<?php echo $v2['advance_paid_client'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                  <div class="col-md-4">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Advance Paid by Travels</label>
                                    <input type="text"  maxlength="50" name="advance_paid_travel"  class="form-control"  value="<?php echo $v2['advance_paid_travel'];?>">
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
<?php } ?>
<script type="text/javascript">
   var frm = $('#form1');
   frm.submit(function (e) {
       e.preventDefault();
       $.ajax({
           type: frm.attr('method'),
           url:  frm.attr('action'),
           data: frm.serialize(),
           success: function (data) {
            window.location.href = "owner_car_charges.php";
             //   swal("Good job!", "Buyer is Successfully Updated!!", "success")
             // //  $('#pks1').load(document.URL +  ' #pks1');
             //   $('#form11').load(document.URL +  ' #form11');
           },
           error: function (data) {
               alert('An error occurred.');
           },
       });
   });

if (!$("#charging_type").val().length == 0)

}

$("#closing_km").on("change paste keyup", function(){
  //alert("valgjhueStart");
   var startingkilometer=$("#starting_km").val();
   var closingkilometer=$("#closing_km").val();
   var totalkilometer=closingkilometer - startingkilometer;
  // //alert(totalkilometer);
   $("#total_km").val(totalkilometer);
   var veh1 = $("#vehicle_name").val().split("$");
   var vehicle_id=veh1[0];
   var vehicle_size=veh1[1];
   var totalkm=$("#total_km").val();
   var fixedtype=$("#fixed_type").val();
   //alert(vehicle_size);fixed_type

   if(vehicle_size=="small")
   {
      if(fixedtype!=="fixed")
     {
      //alert(fixedtype);
      if(totalkm > 199)
     {
      //alert("long");charging_type
      $('#charging_type').val("long");
     // $('#nighthalt_div').show();
     }
     if(totalkm <= 199){
      //alert("local") ;
      $('#charging_type').val("local");
      //$('#nighthalt_div').show();
     }

     }
     if(fixedtype=="fixed")
     {
      $('#charging_type').val("fixed");
      //$('#nighthalt_div').hide();
     }
   }
   if(vehicle_size=="big")
   {
        if(fixedtype!=="fixed")
     {
      //alert(fixedtype);
      if(totalkm > 249)
     {
      //alert("long");charging_type
      $('#charging_type').val("long");
     // $('#nighthalt_div').show();
     }
     if(totalkm <= 249){
      //alert("local") ;
      $('#charging_type').val("local");
      //$('#nighthalt_div').show();
     }

     }
     if(fixedtype=="fixed")
     {
      $('#charging_type').val("fixed");
      //$('#nighthalt_div').hide();
     }
   }

   
  
 
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


$(document).on('change', '#vehicle_name', function()
            {

              var veh = $("#vehicle_name").val().split("$");

              var vehicle_id=veh[0];
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
              //alert(vehicle_id);
             
              
            });
   
</script>