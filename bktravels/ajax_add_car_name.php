<?php
include('config.php');

function addcar($vehicle_name,$size,$status){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO car( 
  vehicle_name,
  size,
	status
  )
  VALUES(
  ?,
  ?,
  ?
)");
$stmt->bind_param("sss",$vehicle_name,$size,$status);
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

$vehicle_name = $_POST['vehicle_name'];
$size = $_POST['size'];
$status =1;

  $sql = addcar($vehicle_name,$size,$status);
?>