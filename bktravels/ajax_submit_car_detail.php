<?php
include('config.php');

function addBuyer($vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$status){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO car_details(
    vehicle_no,
    vehicle_id,
    vehicle_name,
    owner_name,
    owner_contact_no,
    owner_address,
	owner_email,
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
  ?
)");
$stmt->bind_param("ssssssss",$vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$status);
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
print_r($_POST);

$vehicle_no = $_POST['vehicle_no'];
//$vehicle_id = $_POST['vehicle_id'];
//$vehicle_name = $_POST['vehicle_name'];
$owner_name = $_POST['owner_name'];
$owner_contact_no = $_POST['owner_contact_no'];
$owner_address = $_POST['owner_address'];
$owner_email = $_POST['owner_email'];
$option = explode("$", $_POST['vehicle_name']);
$vehicle_name = $option[1];
$vehicle_id = $option[0];
$size = $option[2];

$status =1;

  $sql = addBuyer($vehicle_no,$vehicle_id,$vehicle_name,$owner_name,$owner_contact_no,$owner_address,$owner_email,$status);
?>