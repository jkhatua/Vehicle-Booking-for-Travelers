<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];


  function deletedutyslip($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM duty_slip
    WHERE id = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

  $sql = deletedutyslip($id);



} ?>
