<?php
include('config.php');

//print("<pre>");
//print_r($_POST);

if(isset($_POST['update_data'])){
	$id = $_POST['id'];
	$rdate = $_POST['rdate'];
	$rvtype = $_POST['rvtype'];
	$rdestition = $_POST['rdestition'];
	$rdutyno = $_POST['rdutyno'];
	$rreportperson = $_POST['rreportperson'];
	$rbillno = $_POST['rbillno'];
	$total = $_POST['total'];
	$radvance = $_POST['radvance'];
	$rbalance = $_POST['rbalance'];
	global $con;
	$sql = mysqli_query($con,"UPDATE `creditor_report` SET `date`='$rdate',`vehicle_type`='$rvtype',`destination`='$rdestition',`dutyno`='$rdutyno',`report_person`='$rreportperson',`billno`='$rbillno',`total`='$total',`advance`='$radvance',`balance`='$rbalance' WHERE `id`='$id'");
	
	header("location:create_report.php");
}




if(isset($_POST['corporate_form'])){
	$rdate = $_POST['rdate'];
	$rvtype = $_POST['rvtype'];
	$rdestition = $_POST['rdestition'];
	$rdutyno = $_POST['rdutyno'];
	$rreportperson = $_POST['rreportperson'];
	$rbillno = $_POST['rbillno'];
	$total = $_POST['total'];
	$radvance = $_POST['radvance'];
	$rbalance = $_POST['rbalance'];
	function insertdata($rdate,$rvtype,$rdestition,$rdutyno,$rreportperson,$rbillno,$total,$radvance,$rbalance){
		GLOBAL $mysqli;
		  $stmt = $mysqli->prepare("INSERT INTO creditor_report(
			date,
			vehicle_type,
			destination,
			dutyno,
			report_person,
			billno,
			total,
			advance,
			balance
		  )
		  VALUES(
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?,
		  ?
		)");
		$stmt->bind_param("sssssssss",$rdate,$rvtype,$rdestition,$rdutyno,$rreportperson,$rbillno,$total,$radvance,$rbalance);
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
	$sql = insertdata($rdate,$rvtype,$rdestition,$rdutyno,$rreportperson,$rbillno,$total,$radvance,$rbalance);
	header("location:create_report.php");
}


if(isset($_POST['name'])){
	if($_POST['name']=="edit_record"){
		//print_r($_POST);
		$id = $_POST['id'];
		global $con;
		$sql = mysqli_query($con,"SELECT * FROM `creditor_report` WHERE `id`='$id'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo(json_encode($rowdata));
		}
		
	}
	if($_POST['name']=="delete_record"){
		$id = $_POST['id'];
		global $con;
		$sql = mysqli_query($con,"DELETE FROM `creditor_report` WHERE `id`='$id'");
	}
}