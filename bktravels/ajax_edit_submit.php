<?php
include('config.php');

function editDetails($id,$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE employee_details
  SET
  emp_catagory = ?,
  emp_name = ?,
  father_name = ?,
  contact_no = ?,
  emailid = ?,
  birth_date = ?,
  joining_date = ?,
  aadhar_cardno = ?,
  dl_no = ?,
  address = ?
  WHERE
  id = ?
  LIMIT 1
   ");
  $stmt->bind_param("sssssssssss",$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address,$id);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
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
$id = $_POST['sl_no'];

print_r($id);

if(!empty($id)){
  $sql = editDetails($id,$emp_catagory,$emp_name,$father_name,$contact_no,$emailid,$birth_date,$joining_date,$aadhar_cardno,$dl_no,$address);
}
