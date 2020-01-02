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
  function fetchdutyslip($serialno){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    duty_of,
    report_at,
    booked_by,
    vehicle_no,
    vehicle_id,
    vehicle_name,
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
	paid_to_owener
      FROM duty_slip WHERE 
      dutyslip_slno = ?
       ");
       $stmt->bind_param("s",$serialno);
       $stmt->execute();
       $stmt->bind_result($duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$paid_to_owener);
       while($stmt->fetch()){
         $row=array('duty_of'=>$duty_of,'report_at'=>$report_at,'booked_by'=>$booked_by,'vehicle_no'=>$vehicle_no,'vehicle_id'=>$vehicle_id,'vehicle_name'=>$vehicle_name,'driver_name'=>$driver_name,'place_from'=>$place_from,'place_to'=>$place_to,'start_date'=>$start_date,'starting_km'=>$starting_km,'start_time'=>$start_time,'closing_km'=>$closing_km,'closing_time'=>$closing_time,'closing_date'=>$closing_date,'total_km'=>$total_km,'total_time'=>$total_time,'charging_type'=>$charging_type,'ac_nonac'=>$ac_nonac,'toll_gate'=>$toll_gate,'parking_charge'=>$parking_charge,'advance_paid_client'=>$advance_paid_client,'advance_paid_travel'=>$advance_paid_travel,'paid_to_owener'=>$paid_to_owener);
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }
$serial_no =  $_POST['serial_no'];
  $result = fetchdutyslip($serial_no);
 
echo json_encode($result);

 
  ?>