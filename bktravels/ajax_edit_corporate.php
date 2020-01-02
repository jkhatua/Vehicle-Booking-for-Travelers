<?php
   include("config.php");
   $id = $_POST['id'];
   function fetchemployeeFromID($status,$id){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT
      id,
      name,
      phone,
      email,
      address
       FROM aacorporate
       WHERE status = ? AND id = ?
        ");
        $stmt->bind_param("ss",$status,$id);
        $stmt->execute();
        $stmt->bind_result($id,$name,$phone,$email,$address);
        while($stmt->fetch()){
          $row[]=array('id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,'address'=>$address);
        }
        $stmt->close();
       if(!empty($row)){
       return ($row[0]);
       }
       else {
          return "";
        }
   }
   //print_r($id);
   $fetchemployeeByID = fetchemployeeFromID(1,$id);
   //print_r($fetchemployeeByID);
   echo json_encode($fetchemployeeByID);
   ?>

