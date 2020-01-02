<?php
include('config.php');

function adddutyslip($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$advance_return_driver,$paid_to_owener,$remarks,$ownerslipno,$datato_change){
	
	
	global $con;
	$sql = mysqli_query($con,"UPDATE `duty_slip` SET `dutyslip_slno`='$dutyslip_slno',`duty_of`='$duty_of',`report_at`='$report_at',`booked_by`='$booked_by',`vehicle_no`='$vehicle_no',`vehicle_id`='$vehicle_id',`vehicle_name`='$vehicle_name',`vehicle_size`='$vehicle_size',`driver_name`='$driver_name',`place_from`='$place_from',`place_to`='$place_to',`start_date`='$start_date',`starting_km`='$starting_km',`start_time`='$start_time',`closing_km`='$closing_km',`closing_time`='$closing_time',`closing_date`='$closing_date',`total_km`='$total_km',`total_time`='$total_time',`charging_type`='$charging_type',`ac_nonac`='$ac_nonac',`toll_gate`='$toll_gate',`parking_charge`='$parking_charge',`advance_paid_client`='$advance_paid_client',`advance_paid_travel`='$advance_paid_travel',`advance_return_driver`='$advance_return_driver',`paid_to_owener`='$paid_to_owener',`remarks`='$remarks',`ownerslipno`='$ownerslipno' WHERE `dutyslip_slno`='$datato_change'");

}
//print("<pre>");
 //print_r($_POST);
$datato_change = $_POST['id'];
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

  $sql = adddutyslip($dutyslip_slno,$duty_of,$report_at,$booked_by,$vehicle_no,$vehicle_id,$vehicle_name,$vehicle_size,$driver_name,$place_from,$place_to,$start_date,$starting_km,$start_time,$closing_km,$closing_time,$closing_date,$total_km,$total_time,$charging_type,$ac_nonac,$toll_gate,$parking_charge,$advance_paid_client,$advance_paid_travel,$advance_return_driver,$paid_to_owener,$remarks,$ownerslipno,$datato_change);



function adddatatoall($data,$dutyslip_slno,$booked_by,$driver_name,$total_km,$status,$duty_of,$vehicle_no,$total_time,$vehicle_name,$place_to,$ownerslipno,$op,$advance_paid_client,$advance_paid_travel,$toll_gate,$total,$advance_return_driver,$datato_change){
	
	global $con;
	$sql = mysqli_query($con,"UPDATE `duitysliprecord` SET `date`='$data',`dityslipno`='$dutyslip_slno',`bookedby`='$booked_by',`driver_name`='$driver_name',`totalkm`='$total_km',`status`='$status',`guest_name`='$duty_of',`vehicle_no`='$vehicle_no',`total_time`='$total_time',`vehicle_name`='$vehicle_name',`drop_location`='$place_to',`owner_slip_no`='$ownerslipno',`o_p`='$op',`travel_advance`='$advance_paid_client',`guest_advance`='$advance_paid_travel',`toll`='$toll_gate',`netadvance`='$total',`cash_return`='$advance_return_driver' WHERE `dityslipno`='$datato_change'");
	
	

}
$data = date('Y-m-d');
$status = 0;
$op = "";
$total = $advance_paid_client+$advance_paid_travel;
$add_data_aldata = adddatatoall($data,$dutyslip_slno,$booked_by,$driver_name,$total_km,$status,$duty_of,$vehicle_no,$total_time,$vehicle_name,$place_to,$ownerslipno,$op,$advance_paid_client,$advance_paid_travel,$toll_gate,$total,$advance_return_driver,$datato_change);
  //print_r($sql);
?>