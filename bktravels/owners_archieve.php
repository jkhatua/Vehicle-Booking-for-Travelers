<?php  if(!empty($_GET['printid'])) {
include("config.php");
require_once("include/numbertowords.php");
$printid=$_GET['printid'];
function fetchSellItems($printid){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    id,
    duty_slip_no,
    duty_date,
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
    remark
    FROM owner_payment_slip
	WHERE id = ?
    ");
	$stmt->bind_param('s',$printid);
    $stmt->execute();
    $stmt->bind_result($id,$duty_slip_no,$duty_date,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$remark);
    while($stmt->fetch()){
      $row = array('id'=>$id,'duty_slip_no'=>$duty_slip_no,'duty_date'=>$duty_date,'journey_to'=>$journey_to,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'starting_km'=>$starting_km,'closing_km'=>$closing_km,'total_km'=>$total_km,'starting_time'=>$starting_time,'closing_time'=>$closing_time,'total_time'=>$total_time,'charging_type'=>$charging_type,'extra_hour'=>$extra_hour,'extrahour_price'=>$extrahour_price,'night_halt'=>$night_halt,'tool_gate'=>$tool_gate,'parking'=>$parking,'kmforlitre'=>$kmforlitre,'day_basic'=>$day_basic,'fuel_rate'=>$fuel_rate,'priceper_km'=>$priceper_km,'amount'=>$amount,'day_charge'=>$day_charge,'advance_office'=>$advance_office,'advance_guest'=>$advance_guest,'total_adv'=>$total_adv,'total_amount'=>$total_amount,'remark'=>$remark);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}
$duty_date=fetchSellItems($printid);
$totaladv = $duty_date['advance_office'] + $duty_date['advance_guest'];
$diutyslipno = $duty_date['duty_slip_no'];	
function extradata($diutyslipno){
	 global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    start_date,
	start_time,
	closing_time,
	closing_date
    FROM duty_slip
	WHERE id = ?
    ");
	$stmt->bind_param('s',$diutyslipno);
    $stmt->execute();
    $stmt->bind_result($start_date,$start_time,$closing_time,$closing_date);
    while($stmt->fetch()){
      $row = array('start_date'=>$start_date,'start_time'=>$start_time,'closing_time'=>$closing_time,'closing_date'=>$closing_date);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}	
	
$extra_data = extradata($diutyslipno);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sai Sraddha Travels</title>
</head>

<body>

<table width="100%" border="0">
	<tr>
		<td width="30%"><center><!--<img src="dist/logo-bkg.png" height="100px" width="150px">--></center></td>
		<td width="70%"><center><span style="background-color: black; color: white;">OWNER SLIP</span>
		<br>
		<span style="font-size: 20px">BK TRAVELS</span>
		<br>
		<span><br />N-5/534, IRC Village, Nayapalli, Bhubaneswar<br />Ph No.:(0674)2361275, 9437008075(M)</span>
		</center></td>
	</tr>
</table>
<table width="100%" style="margin-top: 30px">
	<tr>
		<td>V no <span style="border-bottom: dotted 2px"><?php echo $duty_date['vehicle_no']; ?></span></td>
		<td>Type <span style="border-bottom: dotted 2px"><?php echo $duty_date['charging_type']; ?></span></td>
		<td>OS No <span style="border-bottom: dotted 2px"><?php echo $duty_date['id']; ?></td>
	</tr>
</table>

<table width="100%" border="1" style="margin-top: 30px" id="data_tavle">
	<tr>
		<td>Starting Date</td>
		<td>Starting K.M.</td>
		<td>Starting Time</td>
		<td>Closing K.M.</td>
		<td>Closing Time</td>
		<td>Closing Date</td>
		<td>Ds No.</td>
		<td>Total K.M./Hr</td>
		<td>Place</td>
	</tr>
	<tr>
		<td><?php echo $extra_data['start_date'] ?></td>
		<td><?php echo $duty_date['starting_km']; ?></td>
		<td><?php echo $extra_data['start_time'] ?></td>
		<td><?php echo $duty_date['closing_km']; ?></td>
		<td><?php echo $extra_data['closing_time'] ?></td>
		<td><?php echo $extra_data['closing_date'] ?></td>
		<td><?php echo $duty_date['duty_slip_no']; ?></td>
		<td></td>
		<td><?php echo $duty_date['journey_to']; ?></td>
		
	</tr>
</table>
<div style="margin-top: 20px; margin-bottom: 20px"><center><span style="margin-right: 30%; font-size: 20px">Advance</span></center></div>
<table width="100%" border="1">
	<tr>
		<!--<td>1st day</td>
		<td>2nd Day</td>
		<td>3rd Day</td>-->
		<td>Total</td>
		<td width="30%" style="border: none"></td>
		
	</tr>
	<tr>
		<!--<td></td>
		<td></td>
		<td></td>-->
		<td><?php echo $totaladv; ?></td>
		<td width="30%" style="border: none;height: 50px"><center>Signature<br>For M/s B.K. TRAVEL</center></td>
		
	</tr>
</table>



























<!--<table width="1220" border="1">
  <tr>
    <td colspan="6" align="center"><h2>OWNER'S PAYMENT SLIP</h2> </td>
  </tr>
  <tr>
    <td colspan="6" align="center"><b>BK TRAVELS<br />
    N-1/12,IRC VILLAGE,NAYAPALLI,BHUBANESWAR-15<br />
	MOB: 9853091260, 9439102954, PH: 0674-2556970</b></td>
  </tr>
  
  <tr>
    <td>Duty Slip No </td>
    <td><?php echo $duty_date['duty_slip_no']; ?></td>
    <td>Duty Date </td>
    <td colspan="3"><?php echo $duty_date['duty_date']; ?></td>
  </tr>
  <tr>
    <td>Journey To </td>
    <td colspan="5"><?php echo $duty_date['journey_to']; ?></td>
  </tr>
  <tr>
    <td>Vehicle No </td>
    <td colspan="5"><?php echo $duty_date['vehicle_no']; ?></td>
  </tr>
  <tr>
    <td>Starting K.M </td>
    <td><?php echo $duty_date['starting_km']; ?></td>
    <td>Closing K.M </td>
    <td><?php echo $duty_date['closing_km']; ?></td>
    <td>Total K.M </td>
    <td><?php echo $duty_date['total_km']; ?></td>
  </tr>
  <tr>
    <td>Starting Time </td>
    <td><?php echo $duty_date['starting_time']; ?></td>
    <td>Closing Time </td>
    <td><?php echo $duty_date['closing_time']; ?> </td>
    <td>Total Time </td>
    <td><?php echo $duty_date['total_time']; ?></td>
  </tr>
  <tr>
    <td>Extra Hour </td>
    <td><?php echo $duty_date['extra_hour']; ?></td>
    <td>Night Halt </td>
    <td colspan="3"><?php echo $duty_date['night_halt']; ?></td>
  </tr>
  <tr>
    <td>Toll Gate </td>
    <td><?php echo $duty_date['tool_gate']; ?></td>
    <td>Parking</td>
    <td colspan="3"><?php echo $duty_date['parking']; ?></td>
  </tr>
  <tr>
    <td>Day Basic </td>
    <td colspan="5"><?php echo $duty_date['day_basic']; ?></td>
  </tr>
  <tr>
    <td>Day Charges </td>
    <td colspan="5"><?php echo $duty_date['day_charge']; ?></td>
  </tr>
  <tr>
    <td>Adv. From Office </td>
    <td colspan="5"><?php echo $duty_date['advance_office']; ?></td>
  </tr>
  <tr>
    <td>Adv. From Guest </td>
    <td colspan="5"><?php echo $duty_date['advance_guest']; ?></td>
  </tr>
  <tr>
    <td>Total Amount </td>
    <td colspan="5"><?php echo $duty_date['total_amount']; ?></td>
  </tr>
  <tr>
    <td>Total Advance </td>
    <td colspan="5"><?php echo $duty_date['total_adv']; ?></td>
  </tr>
  <tr>
    <td colspan="6"><p>&nbsp;</p>
    <p>&nbsp; </p>
    <p align="right">For BK TRAVELS. </p></td>
  </tr>
</table>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
	

//window.print();
 window.print();
 window.close();
});
</script>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>