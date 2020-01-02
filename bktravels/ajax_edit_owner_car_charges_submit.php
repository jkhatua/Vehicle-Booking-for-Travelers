<?php
include('config.php');

function editDetails($id,$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE ownercarcharges
  SET
  vehicle_id = ?,
  vehicle_name = ?,
  charging_type = ?,
  day_charge = ?,
  night_holt_charge = ?,
  km_cover_in_one_litre = ?,
  extra_hour_charges = ?,
  price_per_km = ?
  WHERE
  id = ?
  LIMIT 1
   ");
  $stmt->bind_param("sssssssss",$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$id);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}

print_r($_POST);

$charging_type = $_POST['charging_type'];
$day_charge = $_POST['day_charge'];
$night_holt_charge = $_POST['night_holt_charge'];
$km_cover_in_one_litre = $_POST['km_cover_in_one_litre'];
$extra_hour_charges = $_POST['extra_hour_charges'];
$price_per_km = $_POST['price_per_km'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[1];
$vehicle_id = $option[0];
//$status =1;
$id = $_POST['sl_no'];

print_r($id);

if(!empty($id)){
  $sql = editDetails($id,$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km);
}

