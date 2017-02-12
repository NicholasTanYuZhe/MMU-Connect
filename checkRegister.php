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
//mysqli_select_db($con,"$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
$camid = $_POST['camid'];
$campass = $_POST['campass'];

//Encrypt password
$encrypted_password = md5($mypassword);


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$encrypted_password = stripslashes($encrypted_password);
$camid = stripslashes($camid);
$campass = stripslashes($campass);
$myusername = mysqli_real_escape_string($con,$myusername);
$encrypted_password = mysqli_real_escape_string($con,$encrypted_password);
$camid = mysqli_real_escape_string($con,$camid);
$campass = mysqli_real_escape_string($con,$campass);
$sql="INSERT INTO $tbl_name (id, name, password, firstname, lastname, age, email, city, camid, campass) VALUES ('','$myusername', '$encrypted_password', '', '', '', '', '', '$camid', '$campass')";

if(mysqli_query($con,$sql))
{
	echo "<script type='text/javascript'>alert('Register success!');window.location.href= 'login.php'</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Register failed!');window.location.href= 'register.php'</script>";
}
?>
</body>
</html>