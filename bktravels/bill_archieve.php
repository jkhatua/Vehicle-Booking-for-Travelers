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
    remark,
	night_halt1
    FROM customer_payment_slip WHERE 
    id = ?
    ");
    $stmt->bind_param("s",$printid);
    $stmt->execute();
    $stmt->bind_result($id,$duty_slip_no,$duty_date,$place_from,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark,$night_halt1);
    while($stmt->fetch()){
      $row = array('id'=>$id,'duty_slip_no'=>$duty_slip_no,'duty_date'=>$duty_date,'place_from'=>$place_from,'journey_to'=>$journey_to,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'starting_km'=>$starting_km,'closing_km'=>$closing_km,'total_km'=>$total_km,'starting_time'=>$starting_time,'closing_time'=>$closing_time,'total_time'=>$total_time,'charging_type'=>$charging_type,'extra_hour'=>$extra_hour,'extrahour_price'=>$extrahour_price,'night_halt'=>$night_halt,'tool_gate'=>$tool_gate,'parking'=>$parking,'kmforlitre'=>$kmforlitre,'day_basic'=>$day_basic,'fuel_rate'=>$fuel_rate,'priceper_km'=>$priceper_km,'amount'=>$amount,'day_charge'=>$day_charge,'advance_office'=>$advance_office,'advance_guest'=>$advance_guest,'total_adv'=>$total_adv,'total_amount'=>$total_amount,'detaintion_hour'=>$detaintion_hour,'detaintion_charges'=>$detaintion_charges,'remark'=>$remark,'night_halt1'=>$night_halt1);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}

$result1 = fetchSellItems($printid);
//echo $result1['duty_slip_no'];
$dutyid = $result1['duty_slip_no'];
function getduity_details($dutyid){
	global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    duty_of,
	vehicle_id
    FROM duty_slip WHERE 
    dutyslip_slno = ?
    ");
    $stmt->bind_param("s",$dutyid);
    $stmt->execute();
    $stmt->bind_result($duty_of,$vehicle_id);
    while($stmt->fetch()){
      $row = array('duty_of'=>$duty_of,'vehicle_id'=>$vehicle_id);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}
$duity_details = getduity_details($dutyid);
	$vehicle_id = $duity_details['vehicle_id'];
	$charging_type = $result1['charging_type'];
	
	function get_car_details($vehicle_id,$charging_type){
			global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    vehicle_name,
	night_holt_charge,
	km_cover_in_one_litre,
	extra_hour_charges,
	price_per_km,
	detaintion_charges
    FROM customercarcharges WHERE 
    vehicle_id = ? AND
	charging_type = ?
    ");
    $stmt->bind_param("ss",$vehicle_id,$charging_type);
    $stmt->execute();
    $stmt->bind_result($vehicle_name,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$detaintion_charges);
    while($stmt->fetch()){
      $row = array('vehicle_name'=>$vehicle_name,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'extra_hour_charges'=>$extra_hour_charges,'price_per_km'=>$price_per_km,'detaintion_charges'=>$detaintion_charges);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
	}
	$cardetails = get_car_details($vehicle_id,$charging_type);
	//print_r($cardetails);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GST Bill</title>

<table width="100%" border="1">
  <tr>
    <td colspan="4" align="center"><h3>BK TRAVELS</h3>
    <p align="center" style="font-size:15px;"><span class="text">(A Complete Travel Unit Ready to Help Round the Clock)<br />N-5/534, IRC Village, Nayapalli, Bhubaneswar<br />Ph No.:94372-04671, 2553671, 6570205(O)</span></p>
 <p align="center" style="font-size:15px">GSTIN-21AFEPB3102R2ZV<br />PAN : AFEPB3102</p> 
    <p align="left" style="padding-left:50px;">Date <span style="border-bottom: 1.2px dotted"><?php echo(date('d-m-Y')); ?></span></p>
    <p align="right" style="padding-right:50px;">Bill No <span style="border-bottom: 1.2px dotted"><?php echo $result1['duty_slip_no']; ?></span></p>
    <p align="left" style="padding-left:10px;">Name & Address of the Hirer <span style="border-bottom: 1.2px dotted"><?php echo($duity_details['duty_of']) ?></span></p> </td>
  </tr>
  <tr>
    <td colspan="2" align="center">PARTICULARS</td>
    <td colspan="2">AMOUNT</td>
  </tr>
  <tr>
    <td colspan="2">
    <p align="left" style="padding-left:10px;">Vehicle No <span><?php echo $result1['vehicle_name']; ?></span> No <span><?php echo $result1['vehicle_no']; ?></span><br />
    Date of Journey <span><?php echo $result1['duty_date']; ?></span>Duty Slip No<span><?php echo $result1['duty_slip_no']; ?></span><br />
    Destination <span><?php echo $result1['journey_to']; ?></span><br />
    Total K.Ms Covered <span><?php echo $result1['total_km']; ?></span><br />
    Total Hours Engaged <span><?php echo $result1['total_time']; ?></span>    </p>
  <p style="padding-left:15px;">CHARGES<br />
  	Local Hour<span><?php echo $result1['extra_hour']; ?></span> @Rs <?php echo $cardetails['extra_hour_charges']; ?>Per Hour<br />
    Chargeable kilometer<span><?php echo $result1['total_km']; ?></span> @Rs <span><?php echo $cardetails['price_per_km']; ?></span>Per K.M.<br />
    
    Destination Hour<span><?php echo $result1['total_time']; ?></span> @Rs <span>.......</span>Per Hour<br />
    
    Night Halt Charges <span><?php echo $result1['night_halt']*$result1['night_halt1']; ?></span>Night @Rs <span><?php echo $result1['night_halt']; ?></span>Per Night<br />
    
    Journey of Date Basis <span><?php echo $result1['extra_hour']; ?></span> @Rs <span><?php echo $result1['extra_hour']; ?></span>Per Night<br />
    
    Toll Gate & Parking Charge......<br />
    
    Fuel.........................  </p>
     
      <p align="left" style="padding-left:10px;">Towards COST OF TICKET<br />
      Form <span><?php echo $result1['extra_hour']; ?></span> To <span><?php echo $result1['extra_hour']; ?></span><br />
      
      On <span><?php echo $result1['extra_hour']; ?></span> By <span><?php echo $result1['extra_hour']; ?></span><br />
      
      Cost of Ticket <span><?php echo $result1['extra_hour']; ?></span>No. of Ticket <span><?php echo $result1['extra_hour']; ?></span><br />
      
      PNR No <span><?php echo $result1['extra_hour']; ?></span> Services Charge <span><?php echo $result1['extra_hour']; ?></span><br />
      
      Ticket No <span><?php echo $result1['extra_hour']; ?></span> Cancellation Charge Rs <span><?php echo $result1['extra_hour']; ?></span><br />
      
      Class <span><?php echo $result1['extra_hour']; ?></span>		</p> 
         </td>
    <td rowspan="6">&nbsp;</td>
    <td rowspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="5">&nbsp;</td>
    <td>TOTAL</td>
  </tr>
  <tr>
    <td>CGST @........</td>
  </tr>
  <tr>
    <td>SGST @........</td>
  </tr>
  <tr>
    <td>ADVANCE</td>
  </tr>
  <tr>
    <td height="5">GRAND TOTAL</td>
  </tr>
  <tr>
    <td colspan="4"><p align="right" style="padding-right:18px">E. & O.E.</p>
    <p style="margin-left:5px;">(Rupees...............................................................................................................................only)</p>
    <p align="right">For M/s.B.K.TRAVELS.</p></td>
  </tr>
</table>















<!--<style>
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
</style>-->
</head>

<body>
<!--<table width="99%" >
  <tr>
  <td height="31" colspan="7">
  
	  <div class="invoice-top" align="center" style="font-size:36px; padding-top:20px;">
	  		<img src="Saibaba.jpg" height="50px" width="50px" align="left">
			SAI SRADHA TRAVELS <br />
		  <p class="address">MOBILE NO - 9583091260, 9439102954, 0674 - 2556970 <br />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N-1/12, I.R.C. VILLAGE, NAYAPALLI, BHUBANESWAR - 15 <br />
		  </p> 
  		</div>  </td>
  </tr>

  <tr>
    <td colspan="6" rowspan="2" align="center">Lepra Vihaan, Bhubaneswar </td>
    <td width="12%">Bill No : <?php echo $result1['duty_slip_no']; ?></td>
  </tr>
  <tr>
    <td>Date - <?php echo $result1['duty_date']; ?> </td>
  </tr>
  <tr>
    <td colspan="6" rowspan="2">Description</td>
    <td align="right">Amount</td>
  </tr>
  <tr>
    <td align="right">Rs.</td>
  </tr>
  <tr>
    <td width="20%">Type of Vehicle </td>
    <td width="14%"><?php echo $result1['vehicle_name']; ?></td>
    <td width="14%">Vehicle No </td>
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
    <!--<td>Starting K.M. </td>
    <td><?php echo $result1['starting_km']; ?></td>
    <td>Closing K.M. </td>
    <td width="12%"><?php echo $result1['closing_km']; ?></td>
    <td width="10%">Total K.M. </td>
    <td width="18%"><?php echo $result1['total_km']; ?></td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <!--<td>Starting Time </td>
    <td><?php echo $result1['starting_time']; ?></td>
    <td>Closing Time </td>
    <td><?php echo $result1['closing_time']; ?> </td>
    <td>Total</td>
    <td><?php echo $result1['total_time']; ?> Hours Engaged </td>
    <td colspan="5">&nbsp;</td>
    
  </tr>
 
  <?php 
  $chargetype = $result1['charging_type'];
  
  // long charge
  if($chargetype =='long')
  {
  ?>
  <tr>
    <td colspan="6">Long Trip</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total Distance Cover </td>
    <td><?php echo $result1['total_km']; ?></td>
    
    <td><?php echo $result1['priceper_km'];?></td>
    <td>Per K.M. </td>
    <td colspan="2"><?php echo $result1['amount'];?></td>
    <td><div align="right"><?php echo $result1['amount'];?></div></td>
  </tr>
  <tr>
    <td>Detention Hour </td>
    <td><?php echo $result1['detaintion_hour'];?></td>
    <td>Hours</td>
    <?php
    $detaionhr = $result1['detaintion_hour'];
	  if($detaionhr=="0"){$detaionhr1 = 1; }else{$detaionhr1 = $detaionhr; }
    $detaiontotalcharges = $result1['detaintion_charges'];
    $perhr = $detaiontotalcharges / $detaionhr1;
    ?>
    <td>Per Hour: <?php echo $perhr;?>/-</td>
    <td colspan="2"><?php echo $result1['detaintion_charges'];?></td>
    <td><div align="right"><?php echo $result1['detaintion_charges'];?></div></td>
  </tr>
  <tr>
    <td colspan="6">Night Halt Charges </td>
    <td><div align="right"><?php echo $result1['night_halt'];?></div></td>
  </tr>
  <?php } 
  // local charge
  elseif($chargetype == 'local') 
  {
  ?>
  <tr>
    <td colspan="6">Local Trip</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fuel Charge</td>
    <td>Total Distance <?php echo $result1['total_km']; ?></td>
    <td>fuel per Liter</td>
    <td><?php echo $result1['kmforlitre'];?>/-</td>
	<td>Total Amount</td>
	<?php
	$totalkmrate = $result1['total_km'] * $result1['kmforlitre'];
    ?>
    <td><?php echo $totalkmrate;?>/-</td>
    <td></td>
  </tr>
  <tr>
    <td>Day Charge</td>
    <td><?php echo $result1['day_charge'];?></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td colspan="6">Extra Hour</td>
    <td  align="right"><?php echo $result1['extra_hour'];?></td>
  </tr>
  <tr>
    <td colspan="6">Per Hour Charge</td>
    <td  align="right"><?php echo $result1['extrahour_price'];?></td>
  </tr>
  <?php }
  ?>
  
  <tr>
    <td colspan="6"><div align="right">Total</div></td>
    <td><div align="right"><?php echo $result1['total_amount'];?></div></td>
  </tr>
  <tr>
    <td colspan="6">GST (5%) </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">CGST (2.5%) </td>
	<?php
    $gst1 = (($result1['total_amount']*2.5)/100);
    ?>
    <td><div align="right"><?php echo $gst1;?></div></td>
  </tr>
  <tr>
    <td colspan="6">SGST (2.5%) </td>
    <td><div align="right"><?php echo $gst1;?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Sub Total </div></td>
	<?php
	$subtotal = (($result1['total_amount']*5)/100)+$result1['total_amount'];
    ?>
    <td><div align="right"><?php echo $subtotal;?></div></td>
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
	$grandtotal = (($result1['total_amount']*5)/100)+$result1['total_amount']+$result1['tool_gate']+$result1['parking'];
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
	$finalamount =(($result1['total_amount']*5)/100)+$result1['total_amount']+$result1['tool_gate']+$result1['parking']-$result1['advance_guest'];
    ?>
    <td><div align="right"><?php echo $finalamount;?></div></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="3">GSTIN NO : 21AKGPM2672J1Z7 </td>
    <td colspan="4">PAN NO : AKGPM2672J </td>
  </tr>
</table>-->
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