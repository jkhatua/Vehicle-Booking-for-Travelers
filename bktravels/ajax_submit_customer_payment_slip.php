<?php
include('config.php');

function insertCustomerpayment($duty_slip_no,$duty_date,$place_from,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark,$night_halt1){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO customer_payment_slip(
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
  ) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
	?
  )");
  $stmt->bind_param("ssssssssssssssssssssssssssssssss",$duty_slip_no,$duty_date,$place_from,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark,$night_halt1);
  $stmt->execute();
  $inserted_id = $mysqli->insert_id;
  $stmt->close();
  if($inserted_id>0)
  {
    return $inserted_id;
  }
  else
  {
    return false;
  }
}
$duty_slip_no = $_POST['duty_slip_no'];
$duty_date = $_POST['duty_date'];
$place_from = $_POST['journey_from'];

$journey_to = $_POST['journey_to'];
$vehicle_no = $_POST['vehicle_no'];
$starting_km = $_POST['starting_km'];
$closing_km = $_POST['closing_km'];
$total_km = $_POST['total_km'];
$vehicle_name = $_POST['vehicle_name'];
$starting_time = $_POST['starting_time'];
$closing_time = $_POST['closing_time'];
$total_time = $_POST['total_time'];
$charging_type = $_POST['charging_type'];
$extra_hour = $_POST['extra_hour'];
$night_halt = $_POST['night_halt'];
$night_halt1 = $_POST['night_halt1'];
$tool_gate = $_POST['tool_gate'];
$parking = $_POST['parking'];
$kmforlitre = $_POST['kmforlitre'];
$day_basic = $_POST['day_basic'];
$fuel_rate = $_POST['fuel_rate'];
$priceper_km = $_POST['priceper_km'];
$amount = $_POST['amount'];
$day_charge = $_POST['day_charge'];
$advance_office = $_POST['advance_office'];
$advance_guest = $_POST['advance_guest'];
$total_adv = $_POST['total_adv'];
$total_amount = $_POST['total_amount'];
$detaintion_hour = $_POST['detaintion'];
$detaintion_charges = $_POST['detaintion_charges'];
$remark = $_POST['remark'];
$extrahour_price=$_POST['extra_hour_totalprice'];

$sql= insertCustomerpayment($duty_slip_no,$duty_date,$place_from,$journey_to,$vehicle_name,$vehicle_no,$starting_km,$closing_km,$total_km,$starting_time,$closing_time,$total_time,$charging_type,$extra_hour,$extrahour_price,$night_halt,$tool_gate,$parking,$kmforlitre,$day_basic,$fuel_rate,$priceper_km,$amount,$day_charge,$advance_office,$advance_guest,$total_adv,$total_amount,$detaintion_hour,$detaintion_charges,$remark,$night_halt1);

?>
