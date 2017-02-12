<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
</head>
<body>	 
    <form name="SITEURL" action="https://cms.mmu.edu.my/psp/csprd/EMPLOYEE/HRMS/c/SA_LEARNER_SERVICES.SSR_SSENRL_SCHD_W.GBL?PORTALPARAM_PTCNAV=HC_SSR_SSENRL_SCHD_W_GBL&EOPP.SCNode=HRMS&EOPP.SCPortal=EMPLOYEE&EOPP.SCName=CO_EMPLOYEE_SELF_SERVICE&EOPP.SCLabel=Self%20Service&EOPP.SCPTfname=CO_EMPLOYEE_SELF_SERVICE&FolderPath=PORTAL_ROOT_OBJECT.CO_EMPLOYEE_SELF_SERVICE.HCCC_ENROLLMENT.HC_SSR_SSENRL_SCHD_W_GBL&IsFolder=false" method="post" target="_blank" >
		<input id="userid" name="userid" type="text" class="pslogineditbox" size="15" tabindex="2">
		<input type="password" id="pwd" name="pwd" class="pslogineditbox" size="15" tabindex="3">
		<input name="Submit" type="submit" class="psloginbutton" tabindex="4" value="Sign In">
	</form>

	<form action="https://cms.mmu.edu.my/psp/csprd/EMPLOYEE/HRMS/c/SA_LEARNER_SERVICES.SSR_SSENRL_SCHD_W.GBL?PORTALPARAM_PTCNAV=HC_SSR_SSENRL_SCHD_W_GBL&EOPP.SCNode=HRMS&EOPP.SCPortal=EMPLOYEE&EOPP.SCName=CO_EMPLOYEE_SELF_SERVICE&EOPP.SCLabel=Self%20Service&EOPP.SCPTfname=CO_EMPLOYEE_SELF_SERVICE&FolderPath=PORTAL_ROOT_OBJECT.CO_EMPLOYEE_SELF_SERVICE.HCCC_ENROLLMENT.HC_SSR_SSENRL_SCHD_W_GBL&IsFolder=false" method="POST" name="form">
       <input type=hidden name=referer value="/">
       <input type=hidden name=FAIL_URL value="https://cms.mmu.edu.my/psp/csprd/EMPLOYEE/HRMS/c/SA_LEARNER_SERVICES.SSR_SSENRL_SCHD_W.GBL?PORTALPARAM_PTCNAV=HC_SSR_SSENRL_SCHD_W_GBL&EOPP.SCNode=HRMS&EOPP.SCPortal=EMPLOYEE&EOPP.SCName=CO_EMPLOYEE_SELF_SERVICE&EOPP.SCLabel=Self%20Service&EOPP.SCPTfname=CO_EMPLOYEE_SELF_SERVICE&FolderPath=PORTAL_ROOT_OBJECT.CO_EMPLOYEE_SELF_SERVICE.HCCC_ENROLLMENT.HC_SSR_SSENRL_SCHD_W_GBL&IsFolder=false">
       <input type=hidden name=LOGOUT_URL value="https://cms.mmu.edu.my/psp/csprd/EMPLOYEE/HRMS/c/SA_LEARNER_SERVICES.SSR_SSENRL_SCHD_W.GBL?PORTALPARAM_PTCNAV=HC_SSR_SSENRL_SCHD_W_GBL&EOPP.SCNode=HRMS&EOPP.SCPortal=EMPLOYEE&EOPP.SCName=CO_EMPLOYEE_SELF_SERVICE&EOPP.SCLabel=Self%20Service&EOPP.SCPTfname=CO_EMPLOYEE_SELF_SERVICE&FolderPath=PORTAL_ROOT_OBJECT.CO_EMPLOYEE_SELF_SERVICE.HCCC_ENROLLMENT.HC_SSR_SSENRL_SCHD_W_GBL&IsFolder=false">
       <input type=hidden name=username value="hint">
       <input type=hidden name=password value="hint">
	</form>

	<script>
		function changeIDPW(idd, pww){
			document.getElementById("userid").value = idd;
			document.getElementById("pwd").value = pww;
		}
	</script>

	<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "MMUConnect")or die("cannot connect"); 
	$name=$_SESSION["myusername"];
	$tbl_name="User";
	$sql="SELECT * FROM $tbl_name WHERE name='$name'";
	$result=mysqli_query($con,$sql);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$usrid = $row["camid"]; 
			$pswd = $row["campass"];
			echo "<script>changeIDPW('$usrid','$pswd');</script>";
		}
	}
	?>

	<script>
	window.onload = function(){
	  document.forms['SITEURL'].submit();
	  setTimeout( "window.location.href= 'MMU Connect.php';", 2000 )
	}
	</script>
</body>
</html>




