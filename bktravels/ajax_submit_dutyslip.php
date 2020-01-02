<?php
include('config.php');

function adddutyslip($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$advance_return_driver,$paid_to_owener,$remarks,$ownerslipno){
	
	
	
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO duty_slip(
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
	advance_return_driver,
	paid_to_owener,
	remarks,
	ownerslipno
  )
  VALUES(
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
$stmt->bind_param("sssssssssssssssssssssssssssss",$dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$advance_return_driver,$paid_to_owener,$remarks,$ownerslipno);
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
//print("<pre>");
 //print_r($_POST);

$dutyslip_slno = $_POST['dutyslip_slno'];
$duty_of = $_POST['duty_of'];
$report_at = $_POST['report_at'];
$booked_by = $_POST['booked_by'];

$vehicle_no = $_POST['vehicle_no'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[2];
$vehicle_size = $option[1];
$vehicle_id = $option[0];
//$vehicle_id = $_POST['vehicle_id'];
//$vehicle_name = $_POST['vehicle_name'];
$driver_name = $_POST['driver_name'];
//$today_date = $_POST['today_date'];
$place_from = $_POST['place_from'];
$place_to = $_POST['place_to'];
$start_date = $_POST['start_date'];
$starting_km = $_POST['starting_km'];
$start_time = $_POST['start_time'];
$closing_km = $_POST['closing_km'];
$closing_time = $_POST['closing_time'];
$closing_date = $_POST['closing_date'];
$total_km = $_POST['total_km'];
$total_time = $_POST['total_time'];
$charging_type = $_POST['charging_type'];
$ac_nonac = $_POST['ac_nonac'];
$toll_gate = $_POST['toll_gate'];
$parking_charge = $_POST['parking_charge'];
//$day_night_holt = $_POST['day_night_holt'];
//$day_charge = $_POST['day_charge'];
$advance_paid_client = $_POST['advance_paid_client'];
$advance_paid_travel = $_POST['advance_paid_travel'];
$advance_return_driver = $_POST['advance_return_driver'];
$paid_to_owener = $_POST['paid_to_owener'];
$remarks = $_POST['remarks'];
$ownerslipno = $_POST['ownerslipno'];

  $sql = adddutyslip($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$advance_return_driver,$paid_to_owener,$remarks,$ownerslipno);



function adddatatoall($data,$dutyslip_slno,$booked_by,$driver_name,$total_km,$status,$duty_of,$vehicle_no,$total_time,$vehicle_name,$place_to,$ownerslipno,$op,$advance_paid_client,$advance_paid_travel,$toll_gate,$total,$advance_return_driver){
	GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO duitysliprecord(
  	date,
	dityslipno,
	bookedby,
	driver_name,
	totalkm,
	status,
	guest_name,
	vehicle_no,
	total_time,
	vehicle_name,
	drop_location,
	owner_slip_no,
	o_p,
	travel_advance,
	guest_advance,
	toll,
	netadvance,
	cash_return
  )
  VALUES(
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
$stmt->bind_param("ssssssssssssssssss",$data,$dutyslip_slno,$booked_by,$driver_name,$total_km,$status,$duty_of,$vehicle_no,$total_time,$vehicle_name,$place_to,$ownerslipno,$op,$advance_paid_client,$advance_paid_travel,$toll_gate,$total,$advance_return_driver);
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
$data = date('Y-m-d');
$status = 0;
$op = "";
$total = $advance_paid_client+$advance_paid_travel;
$add_data_aldata = adddatatoall($data,$dutyslip_slno,$booked_by,$driver_name,$total_km,$status,$duty_of,$vehicle_no,$total_time,$vehicle_name,$place_to,$ownerslipno,$op,$advance_paid_client,$advance_paid_travel,$toll_gate,$total,$advance_return_driver);
  //print_r($sql);
?>