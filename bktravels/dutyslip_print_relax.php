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
	advance_paid_travel,
	remarks
    FROM duty_slip WHERE 
	dutyslip_slno = ?
    ");
    $stmt->bind_param("s",$printid);
    $stmt->execute();
    $stmt->bind_result($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$remarks);
    while($stmt->fetch()){
      $row = array('dutyslip_slno'=>$dutyslip_slno,'duty_of'=>$duty_of,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'vehicle_size'=>$vehicle_size,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'charging_type'=>$charging_type,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel,'remarks'=>$remarks);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
	}	
	
	
$dutyslip_details = duityslip_details($printid)	;
	//print("<pre>");
	//print_r($dutyslip_details);
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style>
/*table {
 border-collapse: collapse;
}*/

/*table, td, th {
 *border: 1px solid black;

}*/
span{
 text-transform: uppercase;
}
p{
 margin-top: 2px;
 margin-bottom: 2px;
}
body{
 margin-left: 40px;
 margin-right: 40px;
}
hr{
 margin-top: 2px;
 margin-bottom: 2px;
}
@media print {
html,body{height:100%;width:100%;margin:0;padding:0;}
 @page {
 size: 21cm 29.7cm;
 max-height:100%;
 max-width:100%
 font-size: 8pt;
 overflow: hidden;
 }
}
 #printbtn{
 visibility: : none !important;
 }
 p.address{
 	text-align:center;
 	font-size:13px;
 }
 .invoice-top
 {
 	    font-size: 36px;
    padding-top: 20px;
    width: 600px;
    margin: 0 auto;
 }
 .invoice-top img{
     border-radius: 50%;
 }
span.span_class {
    border-bottom: dotted 1.4px;
}
	td {
    border-top: none;
}
</style>
</head>

<body>

<table width="100%" border="0">
 <tr>
 	 <td colspan="9" align="center">
 	 	<tr style="border: none">
       <!-- <td rowspan="3"><img src="dist/log-bkg.png" height="100px" width="150px"></td>-->
        	<td colspan="9" align="center" style="border: 0">DUTY SLIP</td>
        </tr>
 	 	 <tr>
       	 <td colspan="9"  align="center" style="font-size:36px; font-family:Arial, Helvetica, sans-serif; border: none"> M/S. B.K. TRAVEL</td>
        </tr>
 	 	<tr>
       	 <td colspan="9"  align="center" style="font-size:17px; border: none"><br />N-5/534, IRC Village, Nayapalli, Bhubaneswar<br /></td>
        </tr>
 	 	
 	 </td>
 </tr>
<tr>
	<td>Date: <?php echo(date('d-m-Y')); ?></td>
	<td> <p align="left" style="padding-left:50px;"></p><p align="right" style="padding-right:50px;">Duty Slip No:  <span class="span_class"><?php echo($dutyslip_details['dutyslip_slno']); ?></span></p>   </td>
</tr>   
    </table>
    
 
    <table width="100%" border="1" height="200px" >
  <tr>
   <td colspan="5" style="padding-left:50px; border: none">
  		<br>
   		<span class="position-left">Name of the Guest/Off  </span><span class="span_class"><?php echo($dutyslip_details['duty_of']); ?></span></span><br><br>
   		<span class="position-left">Address </span><span class="span_class"><?php echo($dutyslip_details['report_at']); ?></span></span><br><br>
   		<span class="position-left">Booked by </span><span class="span_class"><?php echo($dutyslip_details['booked_by']); ?></span></span><br><br>
   		<span class="position-left">Report to </span><span class="span_class"><?php echo($dutyslip_details['report_at']); ?></span></span><br><br>
   </td>
   <td colspan="4" style="padding-left:50px; border: none">
  		<br>
   		<span class="position-left">Place of Journey </span><span class="span_class"><?php echo($dutyslip_details['place_to']); ?></span></span><br><br>
   		<span class="position-left">Vehicle No </span><span class="span_class"><?php echo($dutyslip_details['vehicle_no']); ?></span></span><br><br>
   		<span class="position-left">Driver's Name </span><span class="span_class"><?php echo($dutyslip_details['driver_name']); ?></span></span><br><br>
   		<span class="position-left">Vehicle Type </span><span class="span_class"><?php echo($dutyslip_details['vehicle_name']); ?></span></span><br><br>
   </td>
  </tr>
  <tr style="border-top: 1px solid">
    <td style="border-top: 1px solid; border-right: none" width="5%" style="border-left: none">Date</td>
    <td style="border-top: 1px solid" width="11%">Starting K.M</td>
    <td style="border-top: 1px solid" width="12%">Starting Time </td>
    <td style="border-top: 1px solid" width="12%">Closing K.M </td>
    <td style="border-top: 1px solid" width="12%">Closing Time </td>
    <td style="border-top: 1px solid" width="11%">Closing Date </td>
    <td style="border-top: 1px solid" width="8%">Total K.M</td>
    <td style="border-top: 1px solid" width="14%">Total Hour</td>
    <td style="border-top: 1px solid; border-right: none" width="15%">Remarks</td>
  </tr>
  <tr>
    <td style="border-left: none; border-right: none"><?php echo($dutyslip_details['start_date']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['starting_km']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['start_time']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['closing_km']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['closing_time']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['closing_date']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['total_km']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['total_time']); ?></td>
    <td style="border-right: none"><?php echo($dutyslip_details['remarks']); ?></td>
    
  </tr>
 <!-- <tr>
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
  </tr>-->
  <tr>
    <td style="border-left: none; border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
    <td style="border-top: none; border-right: none">&nbsp;</td>
  </tr>
  <tr>
    <td  style="border-top: none; border-right: none" colspan="5">Name <!--&amp;--> <!--Address--> of Hirer : <?php echo($dutyslip_details['booked_by']); ?></td>
    <td  style="border-top: none; border-right: none" colspan="4">Advance Paid by Hirer <?php echo($dutyslip_details['advance_paid_client']); ?></td>
  </tr>
  <tr>
    <td style=" border-right: none" colspan="5">&nbsp;</td>
    <td style=" border-right: none" colspan="4">&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="9">1.  Kilomiter & Time will be charged from Office to Office. </td>
  </tr>
  <tr>
    <td colspan="9">2. Please check the reading before signing the Duty slip. </td>
  </tr>
  <tr>
    <td colspan="9">3. Toll Gate, Stand fee shall be paid by thr Guest.  </td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"></td>
    <td><!--Next Day Programme--> </td>
    <td>Report at........................  </td>
  </tr>
  <tr>
  	<td  style=" border-right: none; border-bottom: none" colspan="2">For M/S. B. K. TRAVEL</td>
  	<td style=" border-right: none; border-bottom: none" colspan="2">Thanking You</td>
  	<td style=" border-right: none; border-bottom: none" colspan="2">Visit Again</td>
  	<td style=" border-right: none; border-bottom: none" colspan="3">Signeture of thr Guest</td>
  </tr>
 </table>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
 window.print();
 window.close();
});
</script>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>