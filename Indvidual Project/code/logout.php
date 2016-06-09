<?php
	session_start();
/*
 *******************************************************************
 * CLass		: CST336 SP-A-2015
 * Instructior	: Dr. Su Bude
 * Student		: Clarence Mitchell		 
 * Description	: This individual project is based on the automation
 *                of the Department of Parks and Recreations Excel 
 *                Timesheet
 *
 *******************************************************************
*/


	$_SESSION['MM_Username'] = NULL;
	$_SESSION['MM_UserGroup'] = NULL;
	$_SESSION['PrevUrl'] = NULL;
	$_SESSION['MM_UserData'] = NULL;
	$_SESSION["MM_loginSuccess"] = NULL;
	$_SESSION['errMessage'] = NULL;

	unset($_SESSION['MM_Username']);
	unset($_SESSION['MM_UserGroup']);
	unset($_SESSION['PrevUrl']);
	unset($_SESSION['MM_UserData']);
	unset($_SESSION["MM_loginSuccess"]);
	unset($_SESSION['errMessage']);
	
	session_destroy();


	header("Location: login.php");

//$status = "<span style='color:red;'><b>You successfully logged out. Come back soon.</b></span>";
?>
