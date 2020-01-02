<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];


  function deletecustomercarcharges($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM customercarcharges
    WHERE id = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

  $sql = deletecustomercarcharges($id);



} ?>
