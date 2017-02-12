<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="MMUConnect"; // Database name 
	$tbl_name="User"; // Table name 

	// Connect to server and select databse.
	$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 

	$myusername = $_POST['myusername'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$city = $_POST['city'];


	$sql = "UPDATE $tbl_name SET firstname = '$firstname', lastname = '$lastname', age = '$age', email = '$email', city = '$city' WHERE name = '$myusername'";
	
	if(mysqli_query($con, $sql))
	{
		echo "<script type='text/javascript'>alert('Edit success!');window.location.href= 'profile.php'</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Edit Failed!');window.location.href= 'profile.php'</script>";
	}
?>
</body>
</html>