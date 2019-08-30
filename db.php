<?php
$host = 'localhost' ;
$dbUser = 'root' ;
$dbPass = '' ;
$dbName = 'SchoolBell' ;
 
$db = new MySQL( $host, $dbUser, $dbPass, $dbName ) ;
$db->selectDatabase();
?>
