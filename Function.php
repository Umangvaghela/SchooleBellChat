<?php
/**
* Function For get search result value
* parameter : $data
* return : $result
*/
function search_result_data($data){
    global $db;
	$add_query ='';	
	$where = '';
	if($data['Firstname'] !='') { 
		$firstname = $data['Firstname'];
		if($where=='') {
			$add_query.= " where Employee_Firstname = '$firstname'";
		} else {
			$add_query.= " and Employee_Firstname = '$firstname'";
		}		
	}
	if($data['Lastname'] !='') { 
		$Lastname = $data['Lastname'];
		if($where=='') {
			$add_query.= " where Employee_Lastname = '$Lastname'";
		} else {
			$add_query.= " and Employee_Lastname = '$Lastname'";
		}		
	}
	if($data['Age'] !='') { 
		$Age = $data['Age'];
		if($where=='') {
			$add_query.= " where Employee_age = '$Age'";
		} else {
			$add_query.= " and Employee_age = '$Age'";
		}		
	}
	if($data['Department'] !='') { 
		$Department = $data['Department'];
		if($where=='') {
			$add_query.= " where Department = '$Department'";
		} else {
			$add_query.= " and Department = '$Department'";
		}		
	}
	if($data['Manager'] !='') { 
		$Manager = $data['Manager'];
		if($where=='') {
			$add_query.= " where Manager = '$Manager'";
		} else {
			$add_query.= " and Manager = '$Manager'";
		}	
	}
	if($data['Salery'] !='') { 
		$Salery = $data['Salery'];
		if($where=='') {
			$add_query.= " where Employee_Salery = '$Salery'";
		} else {
			$add_query.= " and Employee_Salery = '$Salery'";
		}	
	}
	if($data['date'] !='') { 
		$date = $data['date'];
		if($where=='') {
			$add_query.= " where dateofjoining = '$date'";
		} else {
			$add_query.= " and dateofjoining = '$date'";
		}	
	}
	if($data['Gender'] !='') { 
		$Gender = $data['Gender'];
		if($where=='') {
			$add_query.= " where Gender = '$Gender'";
		} else {
			$add_query.= " and Gender = '$Gender'";
		}	
	}
	
	$sql = "SELECT * FROM employee_data $add_query " ;
	$result = $db->query($sql)->fetach_all();
	return $result;
}

/***
* Function For Insert Employee data
* Parameter : $_POST data
* Return message (String)
*/
Function Insert_Employee_Record($insert_data) {
	global $db;
	$firstname = $insert_data['Firstname'];
	$lastname = $insert_data['LastName'];
	$Age = $insert_data['Age'];
	$Salery = $insert_data['Salery'];
	$Department = $insert_data['Department'];
	$Manager = $insert_data['Manager'];
	$date = $insert_data['date'];
	$gender = $insert_data['Gender'];
	$sqlall = "SELECT * FROM employee_data";
	if($res = $db->query($sqlall)->fetch()){ 
		$sql = "SELECT * FROM employee_data where Employee_Firstname='$firstname'";
		if($db->query($sql)->fetch()!=NULL and $db->query($sql)->fetch()!='' ) 
		{
			echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Firstname Already Exist</div>"; 
		} else {
			$get_query = "SELECT Employee_ID FROM employee_data ORDER BY Employee_ID DESC LIMIT 1";
			if ($row = $db->query($get_query)->fetch()) {
				$lastid = $row['Employee_ID'] + 1;	
				$sql = "insert into employee_data values ($lastid,'$firstname','$lastname','$Age', '$Salery','$Department','$gender','$Manager','$date')";
				$db->insertRow($sql);
				echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Employee Succesfully Register</div>"; 
			}
		}
	} else { 
		$sql = "insert into employee_data values ('1','$firstname','$lastname','$Age', '$Salery','$Department','$gender','$Manager','$date' )";
		$db->insertRow($sql);
		echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Employee Succesfully Register</div>"; 
	}
}
/**
* Function For Manager Record Information
* Parameter : $_POST DATA
* Return Message ( String )
*/
Function Insert_Manager_Registration_Detail_Record($insert_data){
	global $db;
	$firstname = $insert_data['Firstname'];
	$Department = $insert_data['Department'];
	$Password = $insert_data['password'];
	$hashed_password = password_hash($Password, PASSWORD_DEFAULT);
	$sqlall = "SELECT * FROM manager";
	if($res = $db->query($sqlall)->fetch()){ 
		$sql = "SELECT * FROM manager where Manager_name='$firstname'";
		if($db->query($sql)->fetch()!=NULL and $db->query($sql)->fetch()!='' ) 
		{
			echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Manager Name Already Exist</div>"; 
		} else {
			$get_query = "SELECT Manager_ID FROM manager ORDER BY Manager_ID DESC LIMIT 1";
			if ($row = $db->query($get_query)->fetch()) {
				$lastid = $row['Manager_ID'] + 1;	
				$sql = "insert into manager values ($lastid,'$firstname','$Department','$hashed_password')";
				$db->insertRow($sql);
				echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Manager Succesfully Register</div>"; 
			}
		}
	} else { 
		$sql = "insert into Manager values ('1','$firstname','$Department','$hashed_password' )";
		$db->insertRow($sql);
		echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Manager Succesfully Register</div>"; 
	}
}
/**
* Function for login( Manager )
* Parameter: $_POST DATA
* Return string
*/
Function manager_login($check_detail)
{
	global $db;
	$firstname = $check_detail['Manager_name'];
	$password = $check_detail['password'];
	$chenamesql = "SELECT * FROM manager where Manager_name='$firstname'";
	if($db->query($chenamesql)->fetch()!=NULL and $db->query($chenamesql)->fetch()!='' ) 
	{
		$row = $db->query($chenamesql)->fetch();
		if (password_verify($password, $row['password'])) { 
			echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'> Login Succesfuly</div>"; 
			$_SESSION["username"] = $row['Manager_name'];
			header("Location: searchlist.php");
		 } else {
			 echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Enter Valid Manager Name and password</div>"; 	 
		 }
		
		echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Enter Valid Manager Name and password</div>"; 	
	} 
	else 
	{
		echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Enter Valid Manager Name and password</div>"; 	
	} 	
}