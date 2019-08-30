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
		var_dump('hello');
		$sql = "SELECT * FROM employee_data where Employee_Firstname='$firstname'";
		if($db->query($sql)->fetch()!=NULL and $db->query($sql)->fetch()!='' ) 
		{
			echo "<div style='text-align: center;background: red;width: 50%;margin: 3% 3% -3% 28%;padding: 10px;'>Firstname Already Exist</div>"; 
		} else {
			var_dump('hello1');
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

?>