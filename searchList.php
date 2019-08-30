<?php
	session_start();
	include "MySQLDB.php";
	include "db.php";
	require('Function.php');
	if($_SESSION["username"] == ''){
		header("Location: login.php");
	}
	function employee_result_list($data) { 
		 $result = search_result_data($data);
		 return $result;
	}
?>
<html>
<head>
<title>Search Listing</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<script  src="https://code.jquery.com/jquery-3.4.1.min.js"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="searchlist.js"></script>
<link href="style.css" rel="stylesheet">
</head>
	<body>
		<nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1">
		  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="#">
					<a class="nav-link" href="searchlist.php">Search List</a>
				</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			  </li>
			</ul>
		  </div>		
		</nav>
<!--/.Navbar -->
		<!-- main !-->
		<div class="main-w3layouts wrapper">
			<div class="main-agileinfo custom-width">
				<div class="agileits-top searchlist">
					<div class="container">
						<h1><strong>SEARCH LIST</strong></h1>
						<br>
						<form method="POST" action="searchList.php" class="form-inline md-form mr-auto mb-4 formsubmitajaxcall" >
							  <input class="form-control mr-sm-2" type="text" placeholder="Search by Firstname" name="Firstname" aria-label="Search">
							  <input class="form-control mr-sm-2" type="text" placeholder="Search by Lastname" name="Lastname" aria-label="Search">
							  <input class="form-control mr-sm-2" type="text" placeholder="Search by age" name="Age" aria-label="Search">
							  <select class="form-control mr-sm-2" name="Department">
								<option value="">Select Department</option>
								<option name="IT" value="IT">IT</option>
								<option name="BUSINESS" value="BUSINESS">BUSINESS</option>
								<option name="ENGINEERING" value="ENGINEERING">ENGINEERING</option>
								<option name="MEDICAL" value="MEDICAL">MEDICAL</option>
								<option name="NURSING" value="NURSING">NURSING</option>
							</select>
							<select  class="form-control mr-sm-2" name="Manager">
								<option value="">Select Manager</option>
								<option name="IT" value="MIKE">MIKE</option>
								<option name="BERNARD" value="BERNARD">BERNARD</option>
								<option name="SANDY" value="SANDY">SANDY</option>
								<option name="THOMAS" value="THOMAS">THOMAS</option>
								<option name="CHRIS" value="CHRIS">CHRIS</option>
							</select>
							<br>
							<br>
							<input type="text" placeholder="Search Employee By Date of Joining" name="date" id="datepicker">
							<input class="form-control mr-sm-2" type="text" placeholder="Search by salery" name="Salery" aria-label="Search">
							<input class="form-control mr-sm-2" type="text" placeholder="Search by Gender" name="Gender" aria-label="Search">
							<br>
							<input class="searchlist btn btn-primary" name="submit" type="submit" value="SEARCH">
						</form>	
					</div>
						<div class="the-return">
							<?php 
								if(isset($_POST['submit'])) {
									$result = employee_result_list($_POST);  ?>
										<table id="table_id" class="display">
											<thead>
												<tr>
													<th>Employee FirstName</th>
													<th>Employee LastName</th>
													<th>Employee Age</th>
													<th>Employee Salery</th>
													<th>Employee Department</th>
													<th>Employee Manager</th>
												</tr>
											</thead>
											<tbody>
		
											<?php 
												if($result!=NULL || $result!='') {
												foreach( $result as $result_list) {?>
													<tr>
														<td><?php  echo $result_list['Employee_Firstname'];?></td>
														<td><?php  echo $result_list['Employee_Lastname'];?></td>
														<td><?php  echo $result_list['Employee_age'];?></td>
														<td><?php  echo $result_list['Employee_Salery'];?></td>
														<td><?php  echo $result_list['Department'];?></td>
														<td><?php  echo $result_list['Manager'];?></td>
													</tr>	
												<?php } 
												}
											?>		
											</tbody>
										</table>
									<?php
								}
							?>	
						</div>
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
	</body>
</html>