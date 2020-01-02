<?php
include('config.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}
  function fetchcorporatecharges($corporate_id){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
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
    price_per_km
    FROM corporate_car_charges WHERE 
    corporate_id = ?
    ");
       $stmt->bind_param("s",$corporate_id);
       $stmt->execute();
       $stmt->bind_result($id,$corporate_id,$corporate_name,$vehicle_id,$vehicle_name,$vehicle_no,$ref_no,$gst_no,$sac_code,$fuel_price,$km_covers_onelitter_engineoil,$engine_oil_price,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$price_per_km);
       while($stmt->fetch()){
         $row=array('id'=>$id,'corporate_id'=>$corporate_id,'corporate_name'=>$corporate_name,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'vehicle_no'=>$vehicle_no,'ref_no'=>$ref_no,'gst_no'=>$gst_no,'sac_code'=>$sac_code,'fuel_price'=>$fuel_price,'km_covers_onelitter_engineoil'=>$km_covers_onelitter_engineoil,'engine_oil_price'=>$engine_oil_price,'day_charge'=>$day_charge,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'price_per_km'=>$price_per_km);
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }
$corporate_id =  $_POST['duty_of'];
  $result = fetchcorporatecharges($corporate_id);
 
echo json_encode($result);

 
  ?>