<?php
print("<pre>");
include 'config.php';
//print_r($_POST);

$employee = $_POST['employee'];
$designation = $_POST['designation'];
$eid = $_POST['eid'];
//$pan = $_POST['pan'];
$month = $_POST['month'];
$advance = $_POST['advance'];
$salary = $_POST['salary'];
$date = $_POST['date'];

function submitAdv($employee,$eid,$advance,$date,$month){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO advance(
    employee,
    eid,
    advance,
    date,
    month
  ) VALUES (
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("sssss",$employee,$eid,$advance,$date,$month);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  return $insterted_id;
}

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

$sql = submitAdv($employee,$eid,$advance,$date,$month);

if($sql > 0){
  insertTrans($employee,$eid,$advance,$date,$month,1);
}


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

$name = "";
$ename = fetchEmployeeName($employee);
$details = 'Advance Paid to Mr/Ms.'.$ename.' holding the Employee ID :'.$eid;
$mode = 1;
$amount = $advance;
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

//echo "Amount :".$amount;

//echo "Balance :".$balance;



//echo "First Incom :".fetchfirstIncome();


function insertExpenses($name,$details,$mode,$amount,$payType,$balance){
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
  $stmt->bind_param("ssssss",$name,$details,$mode,$amount,$payType,$balance);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  if($insterted_id > 0){
    return $insterted_id;
  } else {
    return "";
  }
}
$name=$ename;
$sql = insertExpenses($name,$details,$mode,$amount,$payType,$balance);
//echo($amount);
echo $sql;
 ?>
