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

$userID = $_POST['userID'];

$amount = $_POST['amount'];

$pending_bal = $_POST['pending_bal'];

$amt = $pending_bal - $amount;
function updateAmount($userID,$amt){
	global $mysqli;
	$stmt = $mysqli->prepare('UPDATE owner_payment_slip SET
	total_amount = ?
	WHERE duty_slip_no = ?
	');
	$stmt->bind_param('ss',$amt,$userID);
	$stmt->execute();
}

updateAmount($userID,$amt);
header('Location:view_owner_payment_slip.php');
?>