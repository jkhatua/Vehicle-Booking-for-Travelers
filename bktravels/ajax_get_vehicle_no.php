<?php 

include('config.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}

$vehicle_id=$_POST['vehicle_id'];

//echo $vehicle_id; 

  function fetchvehicle_id($vehicle_id){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
      id,
      vehicle_no
      FROM car_details WHERE 
      vehicle_id = ?
       ");
       $stmt->bind_param("s",$vehicle_id);
       $stmt->execute();
       $stmt_result = $stmt->get_result();
       //$stmt->store_result();
       if ($stmt_result->num_rows > 0) {
       	echo '<option value="">Select vehicle No</option>';
       	while($data = $stmt_result->fetch_assoc())
       	{ 
       		echo '<option value="'.$data['vehicle_no'].'" >'.$data['vehicle_no'].'</option>';
       	}
       }
       else{
       	echo '<option value="" >no vehicle No</option>';
       }
       $stmt->close();
      if(!empty($row)){
      return ($row);
      }
      else {
         return "";
       }
  }
//$serial_no =  $_POST['serial_no'];
  $result = fetchvehicle_id($vehicle_id);
//print_r($result) ;
//echo json_encode($result);

?>