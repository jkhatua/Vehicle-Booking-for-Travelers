<?php
   include("config.php");
   $id = $_POST['id'];
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
   function fetchownercarcharges($status,$id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
       id,
       vehicle_id,
       vehicle_name,
       charging_type,
       day_charge,
       night_holt_charge,
       km_cover_in_one_litre,
       extra_hour_charges,
       price_per_km
       FROM ownercarcharges
       WHERE status = ? AND id = ?
        ");
        $stmt->bind_param("ss",$status,$id);
        $stmt->execute();
        $stmt->bind_result($id,$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'charging_type'=>$charging_type,'day_charge'=>$day_charge,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'extra_hour_charges'=>$extra_hour_charges,'price_per_km'=>$price_per_km);
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
   $fetchownercarcharges = fetchownercarcharges(1,$id);
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
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Edit Owner's car charges</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Vehicle Name</label>
                                       <select name="vehicle_name" class="form-control" >
                                      <option value="" selected disabled>Select vehicle Name</option>
                                      <?php $fetchcarno = fetchcar();
                                           foreach ($fetchcarno as $v1) { ?>
                                      <option value="<?php echo $v1['id']."$".$v1['vehicle_name'];?>" <?php if($v2['vehicle_name'] == $v1['vehicle_name']) echo "selected"; ?>><?php echo $v1['vehicle_name'];?></option>
                                      
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
                                          <option value="<?php echo $v2['charging_type'];?>" <?php if($v2['charging_type'] == "long") echo "selected"; ?>>Long</option>
                                          <option value="<?php echo $v2['charging_type'];?>" <?php if($v2['charging_type'] == "local") echo "selected"; ?>>Local</option>
                                          <option value="<?php echo $v2['charging_type'];?>" <?php if($v2['charging_type'] == "fixed") echo "selected"; ?>>Fixed</option>
                                          
                                       </select>
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6" id="day_charge_div">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Day Charge</label>
                                       <input type="text"  maxlength="50" name="day_charge" id="day_charge" class="form-control" value="<?php echo $v2['day_charge']; ?>" >
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6" id="nighthalt_div">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Night Holt Charge</label>
                                       <input type="text"  maxlength="50" name="night_holt_charge"  class="form-control"  value="<?php echo $v2['night_holt_charge']; ?>" >
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6"  id="kmforlitrediv">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Kilometer Cover in 1 Litre </label>
                                       <input type="text"  name="km_cover_in_one_litre"  id="km_cover_in_one_litre" class="form-control" value="<?php echo $v2['km_cover_in_one_litre']; ?>">
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6" id="hour_charges_div">
                                    <div class="form-group">
                                       <label class="control-label mb-10">Extra Hour charges (hourly)</label>
                                       <input type="text" name="extra_hour_charges" id="extra_hour_charges" class="form-control" value="<?php echo $v2['extra_hour_charges']; ?>">
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6" id="priceper_kmdiv">
                                    <div class="form-group " >
                                       <label class="control-label mb-10">price(per kilometer)</label>
                                       <input type='text' name="price_per_km" id="price_per_km" class="form-control"  value="<?php echo $v2['price_per_km']; ?>">
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <input type="hidden" value="<?php echo $v2['id'];?>" name="sl_no">
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
{
  if($("#charging_type").val()=="local")
                  {
                    $('#nighthalt_div').show();
                    $('#day_charge_div').show();
                     $('#hour_charges_div').show();
                  $('#priceper_kmdiv').hide();
                  $('#kmforlitrediv').show();
                  }
  if($("#charging_type").val()=="long"){
    $('#nighthalt_div').show();
    $('#day_charge_div').hide();
    $('#hour_charges_div').hide();
    $('#priceper_kmdiv').show();
    $('#kmforlitrediv').hide();
  }
}


   
</script>