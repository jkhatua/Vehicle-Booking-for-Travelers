<?php 
$id = $_POST['val'];

include("config.php");

function calculatetax($id){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT SUM( pay_cost ) 
	FROM insertproduct
	WHERE (cgst + sgst) = ?
	");
	$stmt->bind_param("s",$id);
	$stmt->execute();
	$stmt->bind_result($total);
	$stmt->store_result();
	$stmt->fetch();
	return $total;
}

echo  calculatetax($id);
?>