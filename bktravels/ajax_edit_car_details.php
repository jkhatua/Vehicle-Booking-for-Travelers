<?php
   include("config.php");
   $id = $_POST['id'];
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
   function fetchemployeeFromID($status,$id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
       id,
       vehicle_no,
    vehicle_id,
    vehicle_name,
    owner_name,
    owner_contact_no,
    owner_address,
  owner_email
       FROM car_details
       WHERE status = ? AND id = ?
        ");
        $stmt->bind_param("ss",$status,$id);
        $stmt->execute();
        $stmt->bind_result($id,$vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'owner_name'=>$owner_name,'owner_contact_no'=>$owner_contact_no,'owner_address'=>$owner_address,'owner_email'=>$owner_email);
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
   $fetchemployeeByID = fetchemployeeFromID(1,$id);
   //print_r($fetchemployeeByID);
   foreach ($fetchemployeeByID as $v2) {
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
                        <form id="form1" action="ajax_edit_car_details_submit.php" method="post" >
                           <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Edit Car Details</h6>
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
                                  <div class="form-group">
                                    <label class="control-label mb-10">Vehicle No</label>
                                    <input type="text" name="vehicle_no" id="firstName" class="form-control" value="<?php echo $v2['vehicle_no'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Owner Name</label>
                                    <input type="text"  maxlength="50" name="owner_name"  class="form-control"  value="<?php echo $v2['owner_name'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Owner Contact No</label>
                                    <input type="text"  maxlength="30" name="owner_contact_no"  class="form-control"  value="<?php echo $v2['owner_contact_no'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Owner Address</label>
                                    <input type="text"  maxlength="250" name="owner_address"  class="form-control" value="<?php echo $v2['owner_address'];?>">
                                    <span class="help-block"> </span>
                                  </div>
                                </div>
                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label class="control-label mb-10">Owner Email</label>
                                    <input type="text"  maxlength="50" name="owner_email"  class="form-control"  value="<?php echo $v2['owner_email'];?>">
                                    <span class="help-block"> </span>
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
            window.location.href = "car_details.php";
             //   swal("Good job!", "Buyer is Successfully Updated!!", "success")
             // //  $('#pks1').load(document.URL +  ' #pks1');
             //   $('#form11').load(document.URL +  ' #form11');
           },
           error: function (data) {
               alert('An error occurred.');
           },
       });
   });
</script>
