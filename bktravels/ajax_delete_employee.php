<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];


  function deleteEmployee($id){
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE
    FROM employee_details
    WHERE id = ?
    ");
    $stmt->bind_param("s",$id);
    $stmt->execute();
  }

  $sql = deleteEmployee($id);



} ?>
