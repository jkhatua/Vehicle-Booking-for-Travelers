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
 function fetchcorporatename(){
      global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      name
      FROM aacorporate
       ");
       //$stmt->bind_param("s",$status);
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
         return "";
       }
  }
   function fetchownercarcharges($id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
	 id,
	 corporate_id,
	 corporate_name,
	 vehicle_id,
	 vehicle_name,
	 vehicle_no,
	 ref_no,
	 gst_no,
	 sac_code,
	 fuel_price,
	 km_covers_onelitter_engineoil,
	 engine_oil_price,
	 day_charge,
	 night_holt_charge,
	 km_cover_in_one_litre,
	 extra_hour_charges,
	 price_per_km,
	 day_charge_client,
	 night_holt_charge_client,
	 price_per_km_client,
	 status
	 FROM corporate_car_charges
	 WHERE id=?
        ");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id,$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$day_charge_client,$night_holt_charge_client,$price_per_km_client,$status);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'corporate_id'=>$corporate_id,'corporate_name'=>$corporate_name,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'ref_no'=>$ref_no,'gst_no'=>$gst_no,'sac_code'=>$sac_code,'fuel_price'=>$fuel_price,'km_covers_onelitter_engineoil'=>$km_covers_onelitter_engineoil,'engine_oil_price'=>$engine_oil_price,'day_charge'=>$day_charge,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'extra_hour_charges'=>$extra_hour_charges,'price_per_km'=>$price_per_km,'day_charge_client'=>$day_charge_client,'night_holt_charge_client'=>$night_holt_charge_client,'price_per_km_client'=>$price_per_km_client,'status'=>$status);
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
                        <form id="form1" action="ajax_edit_corporate_car_charges_submit.php" method="post" >
                          	<div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Add Car Charges For Corporate</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
									<input type="hidden" name="id" value="<?php echo($id) ?>">
                                 <div class="col-md-4">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Corporate Name</label>
                                      <select name="corporate_name" class="form-control" >
                                      <option value="" selected disabled>Select Corporate Name</option>
                                      <?php $fetchcorporatename = fetchcorporatename();
                                           foreach ($fetchcorporatename as $v1) { ?>
                                      <option value="<?php echo $v1['id']."$".$v1['name'];?>"<?php if($v1['name'] == $v2['corporate_name']) echo "selected"; ?>><?php echo $v1['name'];?></option>
                                      <?php }?>
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                 <div class="col-md-4">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle Name</label>
                                      <select name="vehicle_name" id="vehicle_name" class="form-control" >
                                      <option value="" selected disabled>Select vehicle Name</option>
                                       <?php $fetchcarno = fetchcar();
                                           foreach ($fetchcarno as $v1) { ?>
                                      <option value="<?php echo $v1['id']."$".$v1['vehicle_name'];?>" <?php if($v2['vehicle_name'] == $v1['vehicle_name']) echo "selected"; ?>><?php echo $v1['vehicle_name'];?></option>
                                      
                                      <?php }?>
                                      
                                      
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group ">
                                      <label class="control-label mb-10">Vehicle No</label>
                                      <select name="vehicle_no" id="vehicle_no" class="form-control" >
                                      <option value="<?php echo $v2['vehicle_no'] ?>"><?php echo $v2['vehicle_no'] ?></option>
                                      
                                    </select>
                                      <span class="help-block"> </span>
                                    </div>
                                  </div>
                                
                               
                                <div class="col-md-4" id="ref_no_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Reference No</label>
                                    <input type="text"  maxlength="50" name="ref_no" id="ref_no" class="form-control"  placeholder="Enter Ref. no" value="<?php echo($v2['ref_no']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="gst_no_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">GST No</label>
                                    <input type="text"  maxlength="50" name="gst_no" id="gst_no" class="form-control"  placeholder="Enter Client GST No" value="<?php echo($v2['gst_no']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="sac_code_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">SAC Code</label>
                                    <input type="text"  maxlength="50" name="sac_code" id="sac_code" class="form-control"  placeholder="SAC Code" value="<?php echo($v2['sac_code']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
 
                                <div class="col-md-4" id="fuel_price_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">fuel Charge</label>
                                    <input type="text"  maxlength="50" name="fuel_price" id="fuel_price" class="form-control"  placeholder="Enter fuel price" value="<?php echo($v2['fuel_price']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="km_covers_onelitter_engineoil_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Kilometer covers in 1 litter (Engine Oil)</label>
                                    <input type="text"  maxlength="50" name="km_covers_onelitter_engineoil" id="km_covers_onelitter_engineoil" class="form-control"  placeholder="Kilometer Covers In 1 Litter (Engine Oil)" value="<?php echo($v2['km_covers_onelitter_engineoil']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="engine_oil_price_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Engine oil Price</label>
                                    <input type="text"  maxlength="50" name="engine_oil_price" id="engine_oil_price" class="form-control"  placeholder="Enter engine oil price" value="<?php echo($v2['engine_oil_price']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                
                               <div class="col-md-4" id="day_charge_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Per Day Charge (Owener)</label>
                                    <input type="text"  maxlength="50" name="day_charge" id="day_charge" class="form-control"  placeholder="Price For Night Holt" value="<?php echo($v2['day_charge']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                 <div class="col-md-4" id="day_charge_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Per Day Charge (Client)</label>
                                    <input type="text"  maxlength="50" name="day_charge_client" id="day_charge_client" class="form-control"  placeholder="Price For Night Holt" value="<?php echo($v2['day_charge_client']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                               <div class="col-md-4" id="nighthalt_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Night Holt Charge (Owener)</label>
                                    <input type="text"  maxlength="50" name="night_holt_charge"  class="form-control"  placeholder="Price For Night Holt" value="<?php echo($v2['night_holt_charge']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4" id="nighthalt_div">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Night Holt Charge (Client)</label>
                                    <input type="text"  maxlength="50" name="night_holt_charge_client"  class="form-control"  placeholder="Price For Night Holt" value="<?php echo($v2['night_holt_charge_client']) ?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-4"  id="kmforlitrediv">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Kilometer Cover in 1 Litre </label>
                                    <input type="text"  name="km_cover_in_one_litre"  id="km_cover_in_one_litre" class="form-control" placeholder="Enter Distance in km" value="<?php echo($v2['km_cover_in_one_litre']) ?>">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                
                                 <div class="col-md-4" id="priceper_kmdiv">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">price(per kilometer Owener)</label>
                                    <input type='text' name="price_per_km" id="price_per_km" class="form-control"  placeholder="price/kilometer" value="<?php echo($v2['price_per_km']) ?>">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
                                 <div class="col-md-4" id="priceper_kmdiv">
                                  <div class="form-group " >
                                    <label class="control-label mb-10">price(per kilometer Clent)</label>
                                    <input type='text' name="price_per_km_client" id="price_per_km_" class="form-control"  placeholder="price/kilometer" value="<?php echo($v2['price_per_km_client']) ?>">
                                    <span class="help-block">  </span>
                                  </div>
                                </div>
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
            window.location.href = "corporeate_car_charges.php";
                swal("Good job!", "Buyer is Successfully Updated!!", "success")
               $('#pks1').load(document.URL +  ' #pks1');
                //$('#form11').load(document.URL +  ' #form11');
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
                 
                 $('#vehicle_no').html(response);
                 
                }
              });
              
              
            });

   
</script>