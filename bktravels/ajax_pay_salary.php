<?php
include 'config.php';

function fetchEmployeeDetails($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  emp_name,
  contact_no,
  address,
  amount,
  emp_catagory
  FROM employee_details
  ");
  $stmt->execute();
  $stmt->bind_result($emp_name,$contact_no,$address,$amount,$emp_catagory);
  while ($stmt->fetch()) {
    $row = array('emp_name' => $emp_name,'contact_no'=>$contact_no,'address'=>$address,'amount'=>$amount,'emp_catagory'=>$emp_catagory );
  }
  $stmt->close();
  if(!empty($row)){
    return $row;
  } else {
    return "";
  }
}

function fetchAdvance($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  advance
  FROM advance
  WHERE employee = ?
  ");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $stmt->bind_result($advance);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  if($advance > 0 ){
    return $advance;
  } else {
    return 0;
  }
}

$id = $_POST['id'];
$fetchEmployeeDetails = fetchEmployeeDetails($id);

if($_POST['action'] == 'eDesignation')
{
	echo $fetchEmployeeDetails['emp_catagory'];
}
if($_POST['action'] == 'eid')
{
	echo 'ARGC0'.$id;
}
if($_POST['action'] == 'pan')
{
	echo $fetchEmployeeDetails['pan'];
}
if($_POST['action'] == 'salary')
{
	echo $fetchEmployeeDetails['amount'];
}
if($_POST['action'] == 'advance')
{
	echo fetchAdvance($id);
}

 ?>
