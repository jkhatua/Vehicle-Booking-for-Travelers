<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];


  function deleteownercarcharges($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM corporate_bill_client
    WHERE id = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

  $sql = deleteownercarcharges($id);



} ?>
