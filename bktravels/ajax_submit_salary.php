<?php

include 'config.php';
print_r($_POST);

$employee = $_POST['employee'];
$designation = $_POST['designation'];
$eid = $_POST['eid'];
//$pan = $_POST['pan'];
$month = $_POST['month'];
$leaves = $_POST['leaves'];
$salary = $_POST['salary'];

if(isset($_POST['advance'])) {
  $advance = $_POST['advance'];
  $adv = $_POST['advTaken'];
  $pending_balance = $adv - $advance;
} else { $advance = 0; }

function submitSalary($employee,$designation,$eid,$month,$leaves,$salary,$advance){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO salary(
    employee,
    designation,
    eid,
    month,
    leaves,
    salary,
    advance
  ) VALUES (
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("sssssss",$employee,$designation,$eid,$month,$leaves,$salary,$advance);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  return $insterted_id;
}

$sql = submitSalary($employee,$designation,$eid,$month,$leaves,$salary,$advance);
echo $sql;

function updateAdvance($pending_balance,$employee){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE advance SET
  advance = ?
  WHERE employee = ?
  ");
  $stmt->bind_param("ss",$pending_balance,$employee);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}

updateAdvance($pending_balance,$employee);

$date = date('y-m-d');

function insertTrans($employee,$eid,$advance,$date,$month,$type){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO trans_advance(
    employee,
    eid,
    advance,
    date,
    month,
    type
  ) VALUES (
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("ssssss",$employee,$eid,$advance,$date,$month,$type);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  return $insterted_id;
}

if($advance > 0 ){
insertTrans($employee,$eid,$advance,$date,$month,2); }

//#############################################################################//


function fetchEmployeeName($employee){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  emp_name
  FROM employee_details
  WHERE id = ?
  ");
  $stmt->bind_param("s",$employee);
  $stmt->execute();
  $stmt->bind_result($employee);
  $stmt->store_result();
  $stmt->fetch();
  $stmt->close();
  return $employee;
}


$ename = fetchEmployeeName($employee);
$details = 'Salary Paid to Mr.'.$ename.' holding the Employee ID :'.$eid;
$mode = 1;
$amount = $salary;
$payType = 0;

  function fetchfirstIncome(){
  	global $mysqli;
  	$stmt = $mysqli->prepare("SELECT
  	balance
  	FROM expenses
  	ORDER BY id DESC LIMIT 1
  	");
  	$stmt->execute();
  	$stmt->bind_result($bill);
  	$stmt->store_result();
    $stmt->fetch();
    $stmt->close();
  	return $bill;
  }


if($payType == 1){
$balance  = fetchfirstIncome() + $amount; } else {
  $balance  = fetchfirstIncome() - $amount;
}

echo "Amount :".$amount;

echo "Balance :".$balance;



echo "First Incom :".fetchfirstIncome();


function insertExpenses($ename,$details,$mode,$amount,$payType,$balance){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO expenses(
    ename,
    details,
    mode,
    amount,
    payType,
    balance
  ) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("ssssss",$ename,$details,$mode,$amount,$payType,$balance);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  if($insterted_id > 0){
    return $insterted_id;
  } else {
    return "";
  }
}

$sql = insertExpenses($ename,$details,$mode,$amount,$payType,$balance);


//#############################################################################//



$details1 = 'Advance Returned by Mr.'.$ename.' holding the Employee ID :'.$eid;
$amount1 = $advance;
$payType1 = 1;



if($payType1 == 1){
$balance1  = fetchfirstIncome() + $amount1; } else {
  $balance1  = fetchfirstIncome() - $amount1;
}



function insertExpenses1($ename,$details1,$mode,$amount1,$payType1,$balance1){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO expenses(
    ename,
    details,
    mode,
    amount,
    payType,
    balance
  ) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("ssssss",$ename,$details1,$mode,$amount1,$payType1,$balance1);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  if($insterted_id > 0){
    return $insterted_id;
  } else {
    return "";
  }
}

$sql = insertExpenses1($ename,$details1,$mode,$amount1,$payType1,$balance1);
 ?>
