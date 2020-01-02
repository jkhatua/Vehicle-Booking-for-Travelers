<?php
include('config.php');

function addBuyer($emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address,$basic,$epf,$esic,$hra,$da,$other,$gross,$amount,$status){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO employee_details(
    emp_catagory,
    emp_name,
    father_name,
    contact_no,
    emailid,
	birth_date,
    joining_date,
    aadhar_cardno,
	dl_no,
	address,
  basic,
  epf,
  esic,
  hra,
  da,
  other,
  gross,
  amount,
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
$stmt->bind_param("sssssssssssssssssss",$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address,$basic,$epf,$esic,$hra,$da,$other,$gross,$amount,$status);
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

$emp_catagory = $_POST['emp_catagory'];
$emp_name = $_POST['emp_name'];
$father_name = $_POST['father_name'];
$contact_no = $_POST['contact_no'];
$emailid = $_POST['emailid'];
$birth_date = $_POST['birth_date'];
$joining_date = $_POST['joining_date'];
$aadhar_cardno = $_POST['aadhar_cardno'];
$dl_no = $_POST['dl_no'];
$address = $_POST['address'];
$basic = $_POST['basic'];
$epf = $_POST['epf'];
$esic = $_POST['esic'];
$hra = $_POST['hra'];
$da = $_POST['da'];
$other = $_POST['other'];
$gross = $_POST['gross'];
$amount = $_POST['amount'];
$status =1;

  $sql = addBuyer($emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address,$basic,$epf,$esic,$hra,$da,$other,$gross,$amount,$status);
?>