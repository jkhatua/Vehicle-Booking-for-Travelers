<?php  if(!empty($_GET['printid'])) {
include("config.php");
require_once("include/numbertowords.php");
$printid = $_GET['printid'];
function fetchSellItems($printid){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    id,
    duty_slip_no,
    duty_date,
    place_from,
    journey_to,
    vehicle_name,
    vehicle_no,
    starting_km,
    closing_km,
    total_km,
  	starting_time,
  	closing_time,
  	total_time,
    charging_type,
  	extra_hour,
    extrahour_price,
  	night_halt,
  	tool_gate,
  	parking,
    kmforlitre,
  	day_basic,
    fuel_rate,
    priceper_km,
    amount,
  	day_charge,
  	advance_office,
  	advance_guest,
    total_adv,
  	total_amount,
  	detaintion_hour,
  	detaintion_charges,
    remark
    FROM customer_payment_slip WHERE 
    id = ?
    ");
    $stmt->bind_param("s",$printid);
    $stmt->execute();
    $stmt->bind_result($id,$duty_slip_no,$duty_date,$place_from,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark);
    while($stmt->fetch()){
      $row = array('id'=>$id,'duty_slip_no'=>$duty_slip_no,'duty_date'=>$duty_date,'place_from'=>$place_from,'journey_to'=>$journey_to,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'starting_km'=>$starting_km,'closing_km'=>$closing_km,'total_km'=>$total_km,'starting_time'=>$starting_time,'closing_time'=>$closing_time,'total_time'=>$total_time,'charging_type'=>$charging_type,'extra_hour'=>$extra_hour,'extrahour_price'=>$extrahour_price,'night_halt'=>$night_halt,'tool_gate'=>$tool_gate,'parking'=>$parking,'kmforlitre'=>$kmforlitre,'day_basic'=>$day_basic,'fuel_rate'=>$fuel_rate,'priceper_km'=>$priceper_km,'amount'=>$amount,'day_charge'=>$day_charge,'advance_office'=>$advance_office,'advance_guest'=>$advance_guest,'total_adv'=>$total_adv,'total_amount'=>$total_amount,'detaintion_hour'=>$detaintion_hour,'detaintion_charges'=>$detaintion_charges,'remark'=>$remark);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}

$result1 = fetchSellItems($printid);
//echo $result1['duty_slip_no'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GST Bill</title>
</head>
<style>
table {
 border-collapse: collapse;
}

table, td, th {
 border: 1px solid black;

}
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
</style>

<body>
<table width="100%" border="1">
  <tr>
  <td height="31" colspan="7"><img src="Saibaba.jpg" height="75px" width="75px" align="left"><div align="center" style="font-size:36px; padding-top:20px;">BK TRAVELS</div></td>
  </tr>
  <tr>
    <td height="34" colspan="7"><div align="center" style="font-size:20px">(A Complete Travel Unit Ready to Help Round the Clock)</div></td>
  </tr>
  <tr>
    <td height="35" colspan="7"><div align="center" style="font-size:20px">N-5/534, IRC Village, Nayapalli, Bhubaneswar</span></td>
  </tr>
  <tr>
    <td height="35" colspan="7"><div align="center" style="font-size:20px">Ph No.:94372-04671, 2553671, 6570205(O)</div></td>
  </tr>
  <tr>
    <td colspan="2">Date: 01/01/1990 </td>
    <td colspan="4">&nbsp;</td>
    <td>Bill No - 376 </td>
  </tr>
  <tr>
    <td colspan="7">To</td>
  </tr>
  <tr>
    <td colspan="6">Journey From : xxxxxxxxxxxxxxxxxx To: xxxxxxxxxxxxxxxxxxxxxxx </td>
    <td>Amount</td>
  </tr>
  <tr>
    <td colspan="6">By xxxxxxxxxxxxxxxxxxxxxxxx On : xxxxxxxxxxxxxxxxxxxxxxxxxx </td>
    <td>Rs.</td>
  </tr>
  <tr>
    <td>Total K.M. Covered </td>
    <td>5000</td>
    <td>Total Hr </td>
    <td colspan="3">12 Hours </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Type of Vehicles </td>
    <td colspan="5">Tata Sumo (Big) </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Minimum Use </td>
    <td>10</td>
    <td>Hour</td>
    <td colspan="2">5000</td>
    <td>KM</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>For Extra Hour </td>
    <td>xxxxxx</td>
    <td>@Rs.</td>
    <td>xxxxxxxx</td>
    <td colspan="2">Per Hour  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>For Extra KM </td>
    <td>xxxxx</td>
    <td>@Rs.</td>
    <td>xxxxxxx</td>
    <td colspan="2">Per KM </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">Long Duty (A/C / Non -A/C) </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>For</td>
    <td>xxxxxxx</td>
    
    <td>KM</td>
    <td>@Rs</td>
    <td colspan="2">xxxxxx</td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td>For Extra  Hour </td>
    <td>xxxxxxx</td>
    <td>Detention</td>
    <?php
    $detaionhr = $result1['detaintion_hour'];
    $detaiontotalcharges = $result1['detaintion_charges'];
    $perhr = $detaiontotalcharges / $detaionhr;
    ?>
    <td>@Rs.</td>
    <td colspan="2">xxxxxx</td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="6">Day Basis A/C / NON A/C </td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="5"><div>Per day (12 Hr.) Rs xxxxxxxxxxxxxxxx </div></td>
    <td>Rs.</td>
    <td><div align="right"></div></td>
  </tr>
  
  
  
  <tr>
    <td colspan="5"><div>Ex. Hr. xxxxxxxxxxxxxxxxxxx </div></td>
	
    <td>Rs.</td>
    <td><div></div></td>
  </tr>
  <tr>
    <td colspan="6">Fuel @ xxxxxxxxxx K.M. / 1 Ltr. Diesel Total KM xxxxxxxxxxxxxxx </td>
    <td><div></div></td>
  </tr>
  <tr>
    <td colspan="6">Toll Gate and Parking Charges (If any)xxxxxxxxxxxxx </td>
    <td><div></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Service Tax as applicable by Govt.l </div></td>
	<?php
	$grandtotal = $result1['total_amount']+$result1['tool_gate']+$result1['parking'];
    ?>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Total Rs. </div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="6" align="right">Advance Rs. (-)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Grand Total Rs. </div></td>
	<?php
	$finalamount =$result1['total_amount']+$result1['tool_gate']+$result1['parking']-$result1['advance_guest'];
    ?>
    <td><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="7">(Rupees xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx only)</td>
  </tr>
  <tr>
    <td colspan="7">N.B.:</td>
  </tr>
  <tr>
    <td colspan="7">1. Advanced / Payment Accepted by Cash/ Cheque / Draft </td>
  </tr>
  <tr>
    <td colspan="7">2. Payment Should be made within 7 days. </td>
  </tr>
  <tr>
    <td colspan="7">3. If no an additional intrest @ 18% p.a. will be charged. </td>
  </tr>
  <tr>
    <td colspan="7">4. Parking and Toll Gate charges born by the Hirer. </td>
  </tr>
  <tr>
    <td colspan="7">5. Cheque subject to realisation. --------------------- FOR BK TRAVELS </td>
  </tr>
</table>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>