<?php
include('config.php');

function editDetails($vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$id){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE car_details
  SET
  vehicle_no = ?,
  vehicle_id = ?,
  vehicle_name = ?,
  owner_name = ?,
  owner_contact_no = ?,
  owner_address = ?,
  owner_email = ?
  WHERE
  id = ?
  LIMIT 1
   ");
  $stmt->bind_param("ssssssss",$vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$id);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}

print_r($_POST);

$vehicle_no = $_POST['vehicle_no'];
$id = $_POST['sl_no'];
//$vehicle_name = $_POST['vehicle_name'];
$owner_name = $_POST['owner_name'];
$owner_contact_no = $_POST['owner_contact_no'];
$owner_address = $_POST['owner_address'];
$owner_email = $_POST['owner_email'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[1];
$vehicle_id = $option[0];
//$size = $option[2];

//$status =1;

print_r($id);

if(!empty($id)){
  $sql = editDetails($vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$id);
}

