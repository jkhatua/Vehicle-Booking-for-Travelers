<?php
include('config.php');

function addBuyer($vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$status){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO ownercarcharges(
    vehicle_id,
    vehicle_name,
    charging_type,
    day_charge,
    night_holt_charge,
	km_cover_in_one_litre,
  extra_hour_charges,
  price_per_km,
	status
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
  ?
)");
$stmt->bind_param("sssssssss",$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$status);
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
//print_r($_POST);

//$vehicle_no = $_POST['vehicle_no'];
//$vehicle_name = $_POST['vehicle_name'];
$charging_type = $_POST['charging_type'];
$day_charge = $_POST['day_charge'];
$night_holt_charge = $_POST['night_holt_charge'];
$km_cover_in_one_litre = $_POST['km_cover_in_one_litre'];
$extra_hour_charges = $_POST['extra_hour_charges'];
$price_per_km = $_POST['price_per_km'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[1];
$vehicle_id = $option[0];
$status =1;
//echo $vehicle_id;
  $sql = addBuyer($vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$status);
?>