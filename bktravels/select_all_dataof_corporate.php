<?php 
include('config.php');
  global $con;
$year  = date('Y');
if(isset($_POST['name'])){
	if($_POST['name']=="get_corporate_data"){
		$month = $_POST['month'];
		$corporate = $_POST['corporate'];
		$sql = mysqli_query($con,"SELECT * FROM `corporate_month_entry` WHERE `month`='$month' AND `year`='$year' AND `corporate_name`='$corporate'");
		if($sql->num_rows==0){
			echo(0);
		}else{
			while($rowdata = mysqli_fetch_assoc($sql)){
			echo(json_encode($rowdata));
			}
		}
		
	}
	if($_POST['name']=="get_corporate_data_client"){
		$month = $_POST['month'];
		$corporate = $_POST['corporate'];
		$sql = mysqli_query($con,"SELECT * FROM `corporate_month_entry` WHERE `month`='$month' AND `year`='$year' AND `corporate_name`='$corporate'");
		if($sql->num_rows==0){
			echo(0);
		}else{
			while($rowdata = mysqli_fetch_assoc($sql)){
			echo(json_encode($rowdata));
			}
		}
	}
}

if(isset($_POST['name1'])){
	if($_POST['name1']=="get_corporate_data1"){
		$month = $_POST['month'];
		$corporate = $_POST['corporate'];
		//echo $corporate;
		$sql = mysqli_query($con,"SELECT `vehicle_name` FROM `duty_slip_corporate` WHERE `corporate_name`='$corporate' LIMIT 1");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$carname = $rowdata['vehicle_name'];
			$sql1 = mysqli_query($con,"SELECT * FROM `corporate_car_charges` WHERE `corporate_name`='$corporate' AND `vehicle_name`='$carname'");
			
			if($sql1->num_rows==0){
				echo(0);
			}else{
				while($rowdata1 = mysqli_fetch_assoc($sql1)){
				echo(json_encode($rowdata1));
			}
			}
			
			
		}
	}
	if($_POST['name1']=="get_corporate_data1_client"){
		$month = $_POST['month'];
		$corporate = $_POST['corporate'];
		//echo $corporate;
		$sql = mysqli_query($con,"SELECT `vehicle_name` FROM `duty_slip_corporate` WHERE `corporate_name`='$corporate' LIMIT 1");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$carname = $rowdata['vehicle_name'];
			$sql1 = mysqli_query($con,"SELECT * FROM `corporate_car_charges` WHERE `corporate_name`='$corporate' AND `vehicle_name`='$carname'");
			
			if($sql1->num_rows==0){
				echo(0);
			}else{
				while($rowdata1 = mysqli_fetch_assoc($sql1)){
				echo(json_encode($rowdata1));
			}
			}
			
			
		}
	}
}