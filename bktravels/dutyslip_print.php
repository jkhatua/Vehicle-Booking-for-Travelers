<?php  if(!empty($_GET['printid'])) {
include("config.php");
require_once("include/numbertowords.php");
$printid = $_GET['printid'];

	function duityslip_details($printid)	{
			global $mysqli;
  $stmt = $mysqli->prepare("SELECT
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
    FROM duty_slip WHERE 
	id = ?
    ");
    $stmt->bind_param("s",$printid);
    $stmt->execute();
    $stmt->bind_result($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel);
    while($stmt->fetch()){
      $row = array('dutyslip_slno'=>$dutyslip_slno,'duty_of'=>$duty_of,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'vehicle_size'=>$vehicle_size,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'charging_type'=>$charging_type,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
	}	
	
	
$dutyslip_details = duityslip_details($printid)	;
	print("<pre>");
	print_r($dutyslip_details);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>
<table width="100%" border="1" height="200px">
  <tr>
    <td colspan="9" align="center">
    <h3>DUTY SLIP</h3>
    <div align="center"><h1>M/s. B.K.TRAVEL</h1></div>
    <p align="left" style="padding-left:50px;">Date ........</p><p align="right" style="padding-right:50px;">Duty Slip No <span class="span_class"><?php echo($dutyslip_details['dutyslip_slno']); ?></span></p>     </td>
  </tr>
    
  <tr>
    <td colspan="9"><p align="left" style="padding-left:50px; font-size:24px">
    	<span class="position">Name of Guest/off <span class="span_class"><?php echo($dutyslip_details['duty_of']); ?></span></span>
        <span class="position" style="float: right; margin-right: 5%">Place of Journey <span class="span_class"><?php echo($dutyslip_details['place_to']); ?></span></span>
        <br>
        <span class="position">Address  <span class="span_class"><?php echo($dutyslip_details['place_from']); ?></span></span>
        <span class="position" style="float: right; margin-right: 5%">Vehicle No <span class="span_class"><?php echo($dutyslip_details['vehicle_no']); ?></span></span>
        <br>
        <span class="position">Booked by <span class="span_class"><?php echo($dutyslip_details['booked_by']); ?></span></span>
        <span class="position" style="float: right; margin-right: 5%">Driver's Name <span class="span_class"><?php echo($dutyslip_details['driver_name']); ?></span></span>
        <br>
        <span class="position">Report to <span class="span_class"><?php echo($dutyslip_details['report_at']); ?></span></span>
        <span class="position" style="float: right; margin-right: 5%">Vehicle type <span class="span_class"><?php echo($dutyslip_details['vehicle_name']); ?></span></span>
        
        
    </p>    </td>
  </tr>
  <tr>
    <td>Date</td>
    <td>Starting K.M</td>
    <td>Starting Time </td>
    <td>Closing K.M </td>
    <td>Closing Time </td>
    <td>Closing Date </td>
    <td>Total K.M</td>
    <td>Total Hour</td>
    <td>Remarks</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" rowspan="6">
    <p align="left" style="padding-left:10px;">Note:<br />
     1. Kilometer & Time will be charged from office to office.<br />
     2. Please check the reading before signing the Duty slip.<br />
     3. Toll Gate, Stand fee shall be paid by guest.     </p>    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Adv. By</td>
    <td>Cash</td>
    <td>Fuel P / D</td>
    <td>Total</td>
  </tr>
 <tr>
    <td>Guest</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Travel</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><p align="left" style="padding-left:30px; font-size:24px">Next Day Programme..........................Report at.....................AM / PM </td>
  </tr>
 </table>
 <p style="padding-left:30px; font-size:20px">For. M/s. B.K.TRAVEL             Thanking you         Visit Agian    Signature of the Guest</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
 //window.print();
 //window.close();
});
</script>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>