<?php 
//echo $_POST['vehicle_id'];
include('config.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}


function fetchcarcharges($vehicle_id1,$charging_type1){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    id,
    vehicle_id,
    vehicle_name,
    charging_type,
    day_charge,
    night_holt_charge,
    km_cover_in_one_litre,
    extra_hour_charges,
    price_per_km,
    detaintion_charges
    FROM customercarcharges WHERE 
    vehicle_id = ? AND charging_type = ?
    ");
       $stmt->bind_param("ss",$vehicle_id1,$charging_type1);
       $stmt->execute();
       $stmt->bind_result($id,$vehicle_id,$vehicle_name,$charging_type,$day_charge,$night_holt_charge,$km_cover_in_one_litre,$extra_hour_charges,$price_per_km,$detaintion_charges);
       while($stmt->fetch()){
         $row1=array('id'=>$id,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'charging_type'=>$charging_type,'day_charge'=>$day_charge,'night_holt_charge'=>$night_holt_charge,'km_cover_in_one_litre'=>$km_cover_in_one_litre,'extra_hour_charges'=>$extra_hour_charges,'price_per_km'=>$price_per_km,'detaintion_charges'=>$detaintion_charges);
       }
       $stmt->close();
      if(!empty($row1)){
      return ($row1);
      }
      else {
         return "";
       }
  }
  $vehicle_id1=$_POST['vehicle_id'];
 $charging_type1= $_POST['charging_type'];
  $result1 = fetchcarcharges($vehicle_id1,$charging_type1);
 echo json_encode($result1);
 //echo $result1['vehicle_id1'];
  //print_r($result1);
?>