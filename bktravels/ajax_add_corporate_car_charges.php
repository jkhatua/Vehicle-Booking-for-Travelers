<?php
include('config.php');

function addBuyer($corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$status,$day_charge_client,$night_holt_charge_client,$price_per_km_client){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO corporate_car_charges(
    corporate_id,
    corporate_name,
    vehicle_id,
    vehicle_name,
    vehicle_no,
    ref_no,
    gst_no,
    sac_code,
    fuel_price,
    km_covers_onelitter_engineoil,
    engine_oil_price,
    day_charge,
    night_holt_charge,
	 km_cover_in_one_litre,
    price_per_km,
	day_charge_client,
	night_holt_charge_client,
	price_per_km_client,
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
$stmt->bind_param("sssssssssssssssssss",$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$day_charge_client,$night_holt_charge_client,$price_per_km_client,$status);
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
//exit();
//$vehicle_no = $_POST['vehicle_no'];
//$vehicle_name = $_POST['vehicle_name'];
//$charging_type = $_POST['charging_type'];
$option1= explode("$", $_POST['corporate_name']);
$corporate_name = $option1[1];
$corporate_id = $option1[0];
$ref_no = $_POST['ref_no'];
$gst_no = $_POST['gst_no'];
$sac_code = $_POST['sac_code'];
$fuel_price = $_POST['fuel_price'];
$km_covers_onelitter_engineoil = $_POST['km_covers_onelitter_engineoil'];
$engine_oil_price = $_POST['engine_oil_price'];
$day_charge = $_POST['day_charge'];
$night_holt_charge = $_POST['night_holt_charge'];
$km_cover_in_one_litre = $_POST['km_cover_in_one_litre'];
//$extra_hour_charges = $_POST['extra_hour_charges'];
$price_per_km = $_POST['price_per_km'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[1];
$vehicle_id = $option[0];
$status =1;
$vehicle_no = $_POST['vehicle_no'];
$day_charge_client = $_POST['day_charge_client'];
$night_holt_charge_client = $_POST['night_holt_charge_client'];
$price_per_km_client = $_POST['price_per_km_client'];
//echo $vehicle_id;
  $sql = addBuyer($corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$status,$day_charge_client,$night_holt_charge_client,$price_per_km_client);
?>