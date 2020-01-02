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
    $stmt->bind_result($id,$duty_slip_no,$duty_date,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark);
    while($stmt->fetch()){
      $row = array('id'=>$id,'duty_slip_no'=>$duty_slip_no,'duty_date'=>$duty_date,'journey_to'=>$journey_to,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'starting_km'=>$starting_km,'closing_km'=>$closing_km,'total_km'=>$total_km,'starting_time'=>$starting_time,'closing_time'=>$closing_time,'total_time'=>$total_time,'charging_type'=>$charging_type,'extra_hour'=>$extra_hour,'extrahour_price'=>$extrahour_price,'night_halt'=>$night_halt,'tool_gate'=>$tool_gate,'parking'=>$parking,'kmforlitre'=>$kmforlitre,'day_basic'=>$day_basic,'fuel_rate'=>$fuel_rate,'priceper_km'=>$priceper_km,'amount'=>$amount,'day_charge'=>$day_charge,'advance_office'=>$advance_office,'advance_guest'=>$advance_guest,'total_adv'=>$total_adv,'total_amount'=>$total_amount,'detaintion_hour'=>$detaintion_hour,'detaintion_charges'=>$detaintion_charges,'remark'=>$remark);
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
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="6" align="center"><h2>CUSTOMER PAYMENT SLIP</h2> </td>
  </tr>
  <tr>
    <td height="69" colspan="6" align="center"><b>BK TRAVELS<br />
   N-5/534, IRC Village, Nayapalli, Bhubaneswar<br />Ph No.:94372-04671, 2553671, 6570205(O)<br />
	</b></td>
  </tr>
  <tr>
    <td width="140" height="31">Duty Slip No : </td>
    <td width="311"> <?php echo $result1['duty_slip_no']; ?> </td>
    <td width="121">Duty Date </td>
    <td colspan="3"><?php echo $result1['duty_date']; ?></td>
  </tr>
  <tr>
    <td height="33">Journey To </td>
    <td colspan="5"><?php echo $result1['journey_to']; ?></td>
  </tr>
  <tr>
    <td height="30">Vehicle No </td>
    <td colspan="5"><?php echo $result1['vehicle_no']; ?></td>
  </tr>
  <tr>
    <td height="33">Starting K.M </td>
    <td><?php echo $result1['starting_km']; ?></td>
    <td>Closing K.M </td>
    <td width="219"><?php echo $result1['closing_km']; ?></td>
    <td width="182">Total K.M </td>
    <td width="207"><?php echo $result1['total_km']; ?></td>
  </tr>
  <tr>
    <td height="34">Starting Time </td>
    <td><?php echo $result1['starting_time']; ?></td>
    <td>Closing Time </td>
    <td><?php echo $result1['closing_time']; ?> </td>
    <td>Total Time </td>
    <td><?php echo $result1['total_time']; ?></td>
  </tr>
  <tr>
    <td height="32">Detention Hour </td>
    <td><?php echo $result1['detaintion_hour']; ?> </td>
    <td>Detention Charges </td>
    <td colspan="3"><?php echo $result1['detaintion_charges']; ?></td>
  </tr>
  <tr>
    <td height="32">Extra Hour </td>
    <td><?php echo $result1['extra_hour']; ?></td>
    <td>Night Halt </td>
    <td colspan="3"><?php echo $result1['night_halt']; ?></td>
  </tr>
  <tr>
    <td height="32">Toll Gate </td>
    <td><?php echo $result1['tool_gate']; ?></td>
    <td>Parking</td>
    <td colspan="3"><?php echo $result1['parking']; ?></td>
  </tr>
  <tr>
    <td height="30">Day Basic </td>
    <td colspan="5"><?php echo $result1['day_basic']; ?></td>
  </tr>
  <tr>
    <td height="32">Day Charges </td>
    <td colspan="5"><?php echo $result1['day_charge']; ?></td>
  </tr>
  <tr>
    <td height="33">Adv. From Office </td>
    <td colspan="5"><?php echo $result1['advance_office']; ?></td>
  </tr>
  <tr>
    <td height="30">Adv. From Guest </td>
    <td colspan="5"><?php echo $result1['advance_guest']; ?></td>
  </tr>
  <tr>
    <td height="27">Total Amount </td>
    <td colspan="5"><?php echo $result1['total_amount']; ?></td>
  </tr>
  <tr>
    <td height="34">Total Advance </td>
    <td colspan="5"><?php echo $result1['total_adv']; ?></td>
  </tr>
  <tr>
    <td colspan="6"><p>&nbsp;</p>
    <p>&nbsp; </p>
    <p align="right">For BK TRAVELS. </p></td>
  </tr>
</table>
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