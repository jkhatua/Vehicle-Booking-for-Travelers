<?php
include('config.php');

function editDetails($id,$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$status,$day_charge_client,$night_holt_charge_client,$price_per_km_client){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE corporate_car_charges
  SET
 	corporate_id=?,
    corporate_name=?,
    vehicle_id=?,
    vehicle_name=?,
    vehicle_no=?,
    ref_no=?,
    gst_no=?,
    sac_code=?,
    fuel_price=?,
    km_covers_onelitter_engineoil=?,
    engine_oil_price=?,
    day_charge=?,
    night_holt_charge=?,
	 km_cover_in_one_litre=?,
    price_per_km=?,
	day_charge_client=?,
	night_holt_charge_client=?,
	price_per_km_client=?,
	 status=?
  WHERE
  id = ?
  LIMIT 1
   ");
  $stmt->bind_param("ssssssssssssssssssss",$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$day_charge_client,$night_holt_charge_client,$price_per_km_client,$status,$id);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}

//print_r($_POST);
$id = $_POST['id'];
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

//print_r($id);

if(!empty($id)){
  $sql = editDetails($id,$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km,$status,$day_charge_client,$night_holt_charge_client,$price_per_km_client);
}

