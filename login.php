<?php 
	session_start();
	include_once "MySQLDB.php";
	include_once "db.php";
	require('Function.php');
	function login_as_a_Manager($data) 
	{
		$result = manager_login($data);
		return $result;
	}
?>
<html>
<head>
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>
	<body>
		<!-- main -->
		<div class="main-w3layouts wrapper">
			<h1>Login( Only Manager )</h1>
			<div class="main-agileinfo">
				<?php 
				if(isset($_POST['submit']))
				{
					$login_as_a_Manager_checking_information_information = login_as_a_Manager($_POST);
					echo $login_as_a_Manager_checking_information_information;
				}  
				?>
				<div class="agileits-top">	
					<form action="login.php" method="post">
						<input class="text email" type="text" name="Manager_name" placeholder="Enter Name" required="">
						<input class="text" type="password" name="password" placeholder="Enter Password" required="">
						<input type="submit" name="submit" value="submit">
					</form>
					<p><a href="SignUp.php">SignUp As A Employee</a> <a href="managerSignUp.php">SignUp As A Manager</a></p>
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