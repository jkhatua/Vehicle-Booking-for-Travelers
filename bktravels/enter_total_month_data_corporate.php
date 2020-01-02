<?php 
//echo $_POST['vehicle_id'];
include('config.php');
    
//print_r($_POST);

$month = $_POST['month'];
$corporate = $_POST['corporate'];
$tkm = $_POST['tkm'];
	$tday = $_POST['tday'];
	$ttg = $_POST['ttg'];
	$pcharge = $_POST['pcharge'];
	$adv_p_b_c = $_POST['adv_p_b_c'];
	$adv_p_b_t = $_POST['adv_p_b_t'];
	$tday = "0";


function insert_data($month,$year,$corporate,$tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t){
	global $con;
	$sql = mysqli_query($con,"INSERT INTO `corporate_month_entry`(`month`, `year`, `corporate_name`, `km`, `ttime`, `toolgate`, `parking`, `costomer_adv`, `travel_adv`) VALUES ('$month','$year','$corporate','$tkm','$tday','$ttg','$pcharge','$adv_p_b_c','$adv_p_b_t')") or die(mysqli_error());
	return("inserted");
}
function updatedata($tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t,$id){
	global $con;
	$sql = mysqli_query($con,"UPDATE `corporate_month_entry` SET `km`='$tkm',`ttime`='$tday',`toolgate`='$ttg',`parking`='$pcharge',`costomer_adv`='$adv_p_b_c',`travel_adv`='$adv_p_b_t' WHERE `id`='$id'") or die(mysqli_error());
	return("updated");
}
function enterto_data($month,$corporate,$tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t){
	global $con;
	//GLOBAL $mysqli;
	$year = date('Y');
	$sql = mysqli_query($con,"SELECT `id` FROM `corporate_month_entry` WHERE `month`='$month' AND `year`='$year' AND `corporate_name`='$corporate'");
	if($sql->num_rows==0){
		$b = insert_data($month,$year,$corporate,$tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t);
		return($b);
	}else{
		while($rowdata = mysqli_fetch_assoc($sql)){
			$id = $rowdata['id'];
		}
		$b = updatedata($tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t,$id);
		return($b);
	}
}




$a = enterto_data($month,$corporate,$tkm,$tday,$ttg,$pcharge,$adv_p_b_c,$adv_p_b_t);
print_r($a);