<?php

	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="MMUConnect"; // Database name 
	$tbl_name="Document"; // Table name 

	// Connect to server and select databse.
	$con = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
?>

<html>
<head>
	<title>Upload Documents</title>
</head>
<body>
	<?php
	if(isset($_POST['submit']))
	{
		$file_name = $_POST['file_name'];   

		$name = $_FILES['choosenFile']['name']; 

		$tmp_name = $_FILES['choosenFile']['tmp_name'];  

		if($name && $file_name)
		{
			$location = "documents/$name";
			move_uploaded_file($tmp_name, $location);
			$sql = "INSERT INTO $tbl_name (name, path) VALUES ('$file_name','$location')";
			$res = mysqli_query($con, $sql);
			echo "<script type='text/javascript'>alert('Upload Success!');window.location.href= 'MMU Connect.php#documents';</script>";
		}
		else
			echo "<script type='text/javascript'>alert('Upload Failed!');window.location.href= 'MMU Connect.php#documents';</script>";
	}
?>
	<form action = "" method ="post" enctype="multipart/form-data">
		<label>Document Name</label>
		<div data-role="none">
		<input type="text" name="file_name"> <!--take document name-->
		<input type="file" name="choosenFile">	<!--choose file-->
		<input type="submit" name="submit" value="Upload">
		</div>
	</form>
</body>
</html>