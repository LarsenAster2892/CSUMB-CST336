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
	$password = "*********"; //database account password


	try
	 {
		// ~~~ establishes database connection uisng PDO
		//
	    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	    // ~~~ set the PDO error mode to exception
	    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   	 }
	catch(PDOException $e)
   	 {
    	echo "Connection failed: " . $e->getMessage();
   	 }


?>