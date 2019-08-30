<?php
include("MySQLDB.php");
$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'SchoolBell';

// create a new empty database 
$db = new MySQL($host, $dbUser, $dbPass, $dbName );
$db->createDatabase();
$db->selectDatabase();

// Employee Data tables
$table="employee_data";
$sql = "CREATE TABLE employee_data (
		Employee_ID int(11),
		Employee_Firstname varchar(255) ,
		Employee_Lastname varchar(255) ,
		Employee_age varchar(255),
		Employee_Salery varchar(250),
		Department varchar(250),
		Gender varchar(250),
		Manager varchar(250),
		dateofjoining varchar(205),
		primary key(Employee_ID)
	)";	
$db->createTable($table, $sql);

// Create Department Table
$table="Department";
$sql = "CREATE TABLE Department (
Department_ID int(11),
Department_name varchar(255) ,
primary key(Department_ID)
)";  
$db->createTable($table, $sql);

// Create Manager Table
$table="Manager";
$sql = "CREATE TABLE Manager (
		Manager_ID int(11),
		Manager_name varchar(255),
		Department_name varchar(255),
		password varchar(255),
		primary key(Manager_ID)
	)";  
$db->createTable($table, $sql);
?>