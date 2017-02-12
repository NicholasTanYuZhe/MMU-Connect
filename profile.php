
<html>
<head>
	<title> User Profile </title>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body style="overflow-x: scroll;">
	<!-- Header -->
	<div data-role="header">
		<h1>MMU CONNECT</h1>
	</div>
	<!-- Logout button -->
	<div data-role="main" style="text-align: right;">
		<button class="ui-btn ui-btn-inline ui-corner-all" onclick="accessCamsys();">Camsys Class Schedule</button> 
		<script> function accessCamsys(){window.location.href="camsys.php"}</script>
		<a href="" class="ui-btn ui-btn-inline ui-corner-all" onclick="backToMainMenu();">Back to Main Page</a>
		<script type="text/javascript">function backToMainMenu() {window.location.href= 'MMU Connect.php';}</script>
	</div>

<?php 
	session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="MMUConnect"; // Database name 
	$tbl_name="User"; // Table name 

	// Connect to server and select databse.
	$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
	$myusername = $_SESSION['myusername'];
	$sql = "SELECT * FROM $tbl_name WHERE name='$myusername'";
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$firstname  = $row['firstname'];
		$lastname   = $row['lastname'];
		$age        = $row['age'];
		$email      = $row['email'];
		$city		= $row['city'];

	 	if($epr='update')
	 	{
	 		$myusername=$_SESSION['myusername'];
	 		$sql = "SELECT * FROM $tbl_name WHERE name='$myusername'";
	 		$row=mysqli_query($con, $sql);
	 		$ea_row=mysqli_fetch_array($row);
?>
	 		<div style="text-align: center;">
			 	<form method="POST" action="edit.php" >
			 		<input type="hidden" name="myusername" value=<?php echo $_SESSION['myusername'] ?> >
			 		<label>Firstname: </label>
			 		<input type="text" name="firstname" value=<?php echo $ea_row['firstname'] ?>><br>
			 		<label>Lastname: </label>
			 		<input type="text" name="lastname" value=<?php echo $ea_row['lastname'] ?>><br>
			 		<label>Age: </label>
			 		<input type="text" name="age" value=<?php echo $ea_row['age'] ?>><br>
			 		<label>Email: </label>
			 		<input type="text" name="email" value=<?php echo $ea_row['email'] ?>><br>
			 		<label>City: </label>
			 		<input type="text" name="city" value=<?php echo $ea_row['city'] ?>><br>
			 		<input type="submit" value="update">
			 	</form>
			 </div>
<?php
		}
	}
?>
</body>
</html>