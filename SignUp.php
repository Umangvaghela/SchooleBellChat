<?php
session_start();
include_once "MySQLDB.php";
include_once "db.php";
require('Function.php');
function Insert_Employee_data($data) 
{
	$result = Insert_Employee_Record($data);
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
			<h1>New Employee Registration Form</h1>
			<div class="main-agileinfo signupfom">
				<div class="agileits-top">
					<?php 
					if(isset($_POST['submit']))
					{
						$insert_record_information = Insert_Employee_Record($_POST);
						return $insert_record_information;
					}  
					?>
					<form action="SignUp.php" method="post">
						<input class="text" type="text" name="Firstname" placeholder="Employee First Name" required="">
						<input class="text" type="text" name="LastName" placeholder="Employee Last Name" required="">
						<input class="text" type="number" min="18" max="100" name="Age" placeholder="Employee Age" required=""><br>
						<input class="text" type="number" name="Salery" min="1500" placeholder="Employee Salery" required="">
						<select class="select" name="Gender" required="">
							<option value="">Select Gender</option>
							<option name="Male" value="Male">Male</option>
							<option name="Female" value="Female">Female</option>
							<option name="Other" value="Other">Other</option>
						</select>
						<select class="select" name="Department" required="">
							<option value="">Select Department</option>
							<option name="IT" value="IT">IT</option>
							<option name="BUSINESS" value="BUSINESS">BUSINESS</option>
							<option name="ENGINEERING" value="ENGINEERING">ENGINEERING</option>
							<option name="MEDICAL" value="MEDICAL">MEDICAL</option>
							<option name="NURSING" value="NURSING">NURSING</option>
						</select>
						
						<select  class="select" name="Manager" required="">
							<option value="">Select Manager</option>
							<option name="IT" value="MIKE">MIKE</option>
							<option name="BERNARD" value="BERNARD">BERNARD</option>
							<option name="SANDY" value="SANDY">SANDY</option>
							<option name="THOMAS" value="THOMAS">THOMAS</option>
							<option name="CHRIS" value="CHRIS">CHRIS</option>
						</select>
						<br>
						<input type="text" placeholder="Employee Date of Joining" name="date" id="datepicker" required="">
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


