<?php
function &dbConnect(&$rtnError,
					$printSuccess=false, 	// Set to true to display success message (default is false)
					$printErr=true			// Set to true to display error message (default)
					){

	//$db_host 	= "localhost";
	//$db_user 	= "fishmaw";
	//$db_pass 	= "fishmaw";
	//$db_name 	= "DB_w0838211";
	$db_host 	= "localhost";
	$db_user 	= "mitc5039";
	$db_pass 	= "*********";
	$db_name 	= "mitc5039";

	$rtnError	= NULL;
	try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tmpStr1 = ($printSuccess ? print "Connected successfully" : NULL);
		}
	catch(PDOException $e) 	{
		// use of  Ternary Logic
		//   if $printErr is true then print message using print function which returns success for print
		//    else return null
		//  Note: temp variable tmpStr1 is not used elsewhere
		$rtnError = $e->getMessage();
		$tmpStr1 = ($printErr ? print "Connection failed: " . $rtnError : NULL);
		}
	return $conn;
}
?>
