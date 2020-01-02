<?php
   include("config.php");
   $id = $_POST['id'];
   function fetchemployeeFromID($status,$id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
       id,
       emp_catagory,
       emp_name,
       father_name,
       contact_no,
       emailid,
       birth_date,
       joining_date,
       aadhar_cardno,
       dl_no,
       address
       FROM employee_details
       WHERE status = ? AND id = ?
        ");
        $stmt->bind_param("ss",$status,$id);
        $stmt->execute();
        $stmt->bind_result($id,$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'emp_catagory'=>$emp_catagory,'emp_name'=>$emp_name,'father_name'=>$father_name,'contact_no'=>$contact_no,'emailid'=>$emailid,'birth_date'=>$birth_date,'joining_date'=>$joining_date,'aadhar_cardno'=>$aadhar_cardno,'dl_no'=>$dl_no,'address'=>$address);
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
                        <form id="form1" action="ajax_edit_submit.php" method="post" >
                           <div class="form-body">
                              <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Employee's Info</h6>
                              <hr class="light-grey-hr"/>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label mb-10">Employee Categogry</label>
                                       <select name="emp_catagory" class="form-control" >
                                          <option value="<?php echo $v2['emp_catagory'];?>" <?php if($v2['emp_catagory'] == "driver") echo "selected"; ?>>Driver</option>
                                          <option value="<?php echo $v2['emp_catagory'];?>" <?php if($v2['emp_catagory'] == "employee") echo "selected"; ?>>Employee</option>
                                       </select>
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label mb-10">Employee Name</label>
                                       <input type="text" name="emp_name" id="firstName" class="form-control"  placeholder="Employee's Name" value="<?php echo $v2['emp_name'];?>">
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label mb-10">Father Name</label>
                                       <input type="text" name="father_name" id="firstName" class="form-control"  placeholder="Father's Name"  value="<?php echo $v2['father_name'];?>">
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Contact Number</label>
                                       <input type="text"  maxlength="12" name="contact_no"  class="form-control"  placeholder="Contact No" value="<?php echo $v2['contact_no'];?>">
                                       <span class="help-block"> </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Email ID</label>
                                       <input type="text"  name="emailid"   class="form-control" placeholder="Enter your Email" value="<?php echo $v2['emailid'];?>">
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Date Of Birth </label>
                                       <input type='date' name="birth_date" class="form-control"  placeholder="Enter Date & Time" value="<?php echo $v2['birth_date'];?>" />
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Date of joining </label>
                                       <input type='date' name="joining_date" class="form-control"  placeholder="Enter Date & Time"  value="<?php echo $v2['joining_date'];?>"/>
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Adhar Card Number </label>
                                       <input type="text" name="aadhar_cardno" style="text-transform:uppercase"  class="form-control"
                                          placeholder="Enter Your Adhar Number" value="<?php echo $v2['aadhar_cardno'];?>">
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Driving License Number </label>
                                       <input type="text"  name="dl_no" style="text-transform:uppercase"  class="form-control"  placeholder="Enter Driving License Number" value="<?php echo $v2['dl_no'];?>">
                                       <span class="help-block">  </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                       <label class="control-label mb-10">Address</label>
                                       <textarea type="text"  name="address"   class="form-control" placeholder="Enter your Address"><?php echo $v2['address']; ?></textarea>
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
               swal("Good job!", "Buyer is Successfully Updated!!", "success")
             //  $('#pks1').load(document.URL +  ' #pks1');
               $('#form11').load(document.URL +  ' #form11');
           },
           error: function (data) {
               alert('An error occurred.');
           },
       });
   });
</script>