<?php

session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="MMUConnect"; // Database name 
$tbl_name="Document"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
if(isset($_GET['dow'])){
	$path = $_GET['dow'];
	$sql = "SELECT * FROM $tbl_name WHERE path='$path'";
	$res = mysqli_query($con, $sql);

	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header('Content-Length:'.filesize($path));
	readfile($path);
}
?>