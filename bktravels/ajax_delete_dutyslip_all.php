<?php
include('config.php');
//print_r($_POST);

  function delterecoredduityslip($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM duty_slip
    WHERE dutyslip_slno = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

  function deleterecordallduity($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM duitysliprecord
    WHERE dityslipno = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }
function delterecoredduityslipcorporate($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM duty_slip_corporate
    WHERE dutyslip_slno = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

$name = $_POST['name'];
//echo($name);
if($name=="duityslip"){
	$id = $_POST['id'];
	$a = delterecoredduityslip($id);
	$b  = deleterecordallduity($id);
	
	
	
}
if($name=="duityslip_corporate"){
	$id = $_POST['id'];
	$a = delterecoredduityslipcorporate($id);
	$b  = deleterecordallduity($id);
	
}


?>