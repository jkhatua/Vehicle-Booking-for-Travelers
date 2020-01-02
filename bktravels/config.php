<?php
//Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "bktravels1"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = ""; //Password for database user
$db_table_prefix = "";

GLOBAL $errors;
GLOBAL $successes;

$errors = array();
$successes = array();
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die(mysqli_error());
global $con;
/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
GLOBAL $mysqli;

if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
}


?>
