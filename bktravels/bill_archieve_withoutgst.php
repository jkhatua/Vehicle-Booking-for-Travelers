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
  <td height="31" colspan="7"><img src="Saibaba.jpg" height="75px" width="75px" align="left"><div align="center" style="font-size:36px; padding-top:20px;">SAI SRADHA TRAVELS </div></td>
  </tr>
  <tr>
    <td height="34" colspan="7"><div align="center" style="font-size:20px">N-1/12, I.R.C. VILLAGE, NAYAPALLI, BHUBANESWAR - 15 </div></td>
  </tr>
  <tr>
    <td height="35" colspan="7"><div align="center" style="font-size:20px">MOBILE NO - 9583091260, 9439102954, 0674 - 2556970 </div></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2">Ref No . 0060 </td>
    <td colspan="4" rowspan="2">Lepra Vihaan, Bhubaneswar </td>
    <td>Bill No - 376 </td>
  </tr>
  <tr>
    <td>Date - <?php echo date('Y-m-d'); ?> </td>
  </tr>
  <tr>
    <td colspan="6" rowspan="2">Description</td>
    <td>Amount</td>
  </tr>
  <tr>
    <td>Rs.</td>
  </tr>
  <tr>
    <td>Type of Vehicle </td>
    <td><?php echo $result1['vehicle_name']; ?></td>
    <td>Vehicle No </td>
    <td colspan="3"><?php echo $result1['vehicle_no']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Date of Journey </td>
    <td><?php echo $result1['duty_date']; ?></td>
    <td>Duty Slip No </td>
    <td colspan="3"><?php echo $result1['duty_slip_no']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Starting Point </td>
    <td><?php echo $result1['place_from']; ?></td>
    <td>Destination Point </td>
    <td colspan="3"><?php echo $result1['journey_to']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Starting K.M. </td>
    <td><?php echo $result1['starting_km']; ?></td>
    <td>Closing K.M. </td>
    <td><?php echo $result1['closing_km']; ?></td>
    <td>Total K.M. </td>
    <td><?php echo $result1['total_km']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Starting Time </td>
    <td><?php echo $result1['starting_time']; ?></td>
    <td>Closing Time </td>
    <td><?php echo $result1['closing_time']; ?> </td>
    <td>Total</td>
    <td><?php echo $result1['total_time']; ?> Hours Engaged </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">Long Trip (Above 250 K.M.) </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total Distance Cover </td>
    <td><?php echo $result1['total_km']; ?> *</td>
    
    <td><?php echo $result1['priceper_km'];?>/-</td>
    <td>Per K.M. </td>
    <td colspan="2"><?php echo $result1['amount'];?>/-</td>
    <td><div align="right"><?php echo $result1['amount'];?>/-</div></td>
  </tr>
  <tr>
    <td>Detention Hour </td>
    <td><?php echo $result1['detaintion_hour'];?></td>
    <td>Hours</td>
    <?php
    $detaionhr = $result1['detaintion_hour'];
    $detaiontotalcharges = $result1['detaintion_charges'];
    $perhr = $detaiontotalcharges / $detaionhr;
    ?>
    <td>Per Hour: <?php echo $perhr;?>/-</td>
    <td colspan="2"><?php echo $result1['detaintion_charges'];?>/-</td>
    <td><div align="right"><?php echo $result1['detaintion_charges'];?>/-</div></td>
  </tr>
  <tr>
    <td colspan="6">Night Halt Charges </td>
    <td><div align="right"><?php echo $result1['night_halt'];?>/-</div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Total</div></td>
    <td><div align="right"><?php echo $result1['total_amount'];?>/-</div></td>
  </tr>
  
  
  
  <tr>
    <td colspan="6"><div align="right">Sub Total </div></td>
	
    <td><div align="right"><?php echo $result1['total_amount'];?>/-</div></td>
  </tr>
  <tr>
    <td colspan="6">Toll Gate </td>
    <td><div align="right"><?php echo $result1['tool_gate'];?></div></td>
  </tr>
  <tr>
    <td colspan="6">Parking</td>
    <td><div align="right"><?php echo $result1['parking'];?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Grand Total </div></td>
	<?php
	$grandtotal = $result1['total_amount']+$result1['tool_gate']+$result1['parking'];
    ?>
    <td><div align="right"><?php echo $grandtotal;?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Advance Paid (-) </div></td>
    <td><div align="right"><?php echo $result1['advance_guest'];?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Final Amount Due</div></td>
	<?php
	$finalamount =$result1['total_amount']+$result1['tool_gate']+$result1['parking']-$result1['advance_guest'];
    ?>
    <td><div align="right"><?php echo $finalamount;?></div></td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="3">GSTIN NO : 21AKGPM2672J1Z7 </td>
    <td colspan="4">PAN NO : AKGPM2672J </td>
  </tr>
</table>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>