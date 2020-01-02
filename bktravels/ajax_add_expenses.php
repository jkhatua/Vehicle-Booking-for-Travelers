<?php
print_r($_POST);

include 'config.php';

$ename = $_POST['name'];
$details = $_POST['details'];
$mode = $_POST['mode'];
$amount = $_POST['amount'];
$payType = $_POST['payType'];
//$ename = $_POST['ename'];

if(empty($_POST['name'])){
$ename = "";
} else {
$ename = $_POST['name'];
}


if($mode == 1){
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


function insertExpenses($ename,$details,$mode,$amount,$payType){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO expenses(
    ename,
    details,
    mode,
    amount,
    payType
    
  ) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("sssss",$ename,$details,$mode,$amount,$payType);
  $stmt->execute();
  $insterted_id = $mysqli->insert_id;
  if($insterted_id > 0){
    return $insterted_id;
  } else {
    return "";
  }
}

$sql = insertExpenses($ename,$details,$mode,$amount,$payType);
 }
//  else
// // Insert into bexpenses
// {
//   function fetchfirstIncomeO(){
//     global $mysqli;
//     $stmt = $mysqli->prepare("SELECT
//     balance
//     FROM bexpenses
//     ORDER BY id DESC LIMIT 1
//     ");
//     $stmt->execute();
//     $stmt->bind_result($bill);
//     $stmt->store_result();
//     $stmt->fetch();
//     $stmt->close();
//     return $bill;
//   }


// if($payType == 1){
// $balance  = fetchfirstIncomeO() + $amount; } else {
//   $balance  = fetchfirstIncomeO() - $amount;
// }

// echo "Amount :".$amount;

// echo "Balance :".$balance;



// echo "First Incom :".fetchfirstIncomeO();


// function insertExpensesO($ename,$details,$mode,$amount,$payType,$balance,$ename){
//   global $mysqli;
//   $stmt = $mysqli->prepare("INSERT INTO bexpenses(
//     ename,
//     details,
//     mode,
//     amount,
//     payType,
//     balance,
//     ename
//   ) VALUES(
//     ?,
//     ?,
//     ?,
//     ?,
//     ?,
//     ?,
//     ?
//   )");
//   $stmt->bind_param("sssssss",$name,$details,$mode,$amount,$payType,$balance,$ename);
//   $stmt->execute();
//   $insterted_id = $mysqli->insert_id;
//   if($insterted_id > 0){
//     return $insterted_id;
//   } else {
//     return "";
//   }
// }

// $sql = insertExpensesO($name,$details,$mode,$amount,$payType,$balance,$ename);
// }

 ?>
