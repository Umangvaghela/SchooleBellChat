<?php
session_start();
include_once "MySQLDB.php";
include_once "db.php";
require('Function.php');
function Insert_Manager_Record($data) 
{
	$result = Insert_Manager_Registration_Detail_Record($data);
	return $result;
}
?>
<html>
<head>
<title>Web Based Employee Management System ( Employee Registartion Form )</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="searchlist.js"></script>
</head>
	<body>
		<!-- main -->
		<div class="main-w3layouts wrapper">
			<h1>New Manager Registration Form</h1>
			<div class="main-agileinfo signupfom">
				<div class="agileits-top">
					<?php 
					if(isset($_POST['submit']))
					{
						$insert_record_information = Insert_Manager_Record($_POST);
						echo $insert_record_information;
					}  
					?>
					<form action="managerSignUp.php" method="post">
						<input class="text" type="text" name="Firstname" placeholder="Enter Manager Name" required="">
						<select class="select" name="Department" required="">
							<option value="">Select Department</option>
							<option name="IT" value="IT">IT</option>
							<option name="BUSINESS" value="BUSINESS">BUSINESS</option>
							<option name="ENGINEERING" value="ENGINEERING">ENGINEERING</option>
							<option name="MEDICAL" value="MEDICAL">MEDICAL</option>
							<option name="NURSING" value="NURSING">NURSING</option>
						</select>
						<br>
						<input class="text" type="password" name="password" placeholder="Enter Password" required="">
						<input type="submit" name="submit" value="SIGNUP">
					</form>
					
				</div>
			</div>
			<ul class="colorlib-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!-- //main -->
	</body>
</html>