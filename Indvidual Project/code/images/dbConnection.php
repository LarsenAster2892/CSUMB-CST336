<?php
/*
 * -------------------------------------------------------
 * 
 * Include for connecting to Database
 * 
 * -------------------------------------------------------
*/
	$host     = "localhost";
	$dbname   = "mitc5039"; //otterID
	$username = "mitc5039"; //otter ID
	$password = "Success@28927989"; //database account password
	
	
	//establishes database connection
	$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	
	//shows errors when connecting to database
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	

?>