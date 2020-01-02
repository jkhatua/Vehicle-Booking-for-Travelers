<?php
include('config.php');


//print("<pre>");
//print_r($_POST);
if($_POST['corporate_form']=="update"){
	//print("<pre>");
	//print_r($_POST);
	
$crname = $_POST['crname'];
$craddress = $_POST['craddress'];
$phone = $_POST['phone'];
$enail = $_POST['enail'];
$id = $_POST['id'];
function addcorporate($crname,$craddress,$phone,$enail,$id){
	GLOBAL $mysqli;
  $stmt = $mysqli->prepare("UPDATE aacorporate
  SET
    name=?,
    phone=?,
    email=?,
    address=?
	WHERE
  id = ?
  ");
$stmt->bind_param("sssss",$crname,$phone,$enail,$craddress,$id);
$result = $stmt->execute();

$stmt->close();

return($result);
}	
echo("in");	
	
$sql = addcorporate($crname,$craddress,$phone,$enail,$id);	
}else{
	echo("out");
$crname = $_POST['crname'];
$craddress = $_POST['craddress'];
$phone = $_POST['phone'];
$enail = $_POST['enail'];

function addcorporate($crname,$craddress,$phone,$enail){
	GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO aacorporate(
    name,
    phone,
    email,
    address
  )
  VALUES(
  ?,
  ?,
  ?,
  ?
)");
$stmt->bind_param("ssss",$crname,$phone,$enail,$craddress);
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
$sql = addcorporate($crname,$craddress,$phone,$enail);
}
