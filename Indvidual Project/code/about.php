<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
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



	//
	// The following are a series of prefix variables that
	// which are used in specifying the location of program assets (such images)
	// This allows the assets to be moved with only changes to be made to these prefix variables
	//
    //$jqueryPrefix 		= "./jquery/";
	$includesPrefix 	= "includes/";
	$connectPrefix 		= "Connections/";
	$imagePrefix 		= "images/";
	$userImagePrefix 	= "images/userImages/";

   	// The following include contains the PDO definition and load functions
	require_once $includesPrefix . '/authorizeFunctions.php';

?>
<!doctype html>

<html>
<head>
	<meta charset="utf-8">
	
	<title>CST336 - Individual Project (Timesheet)</title>
	<link href="CSS/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/confirmationFunctions.js" ></script>
</head>

<body>


<div id="header">
  <h1>DPR Timesheet Application</h1>
	<img src="images/dprlogo.png" alt="" width="120" height="121" class="right" />
</div>

 <!-- Navigation Bar (from include librarye --> 
 <?php include_once "includes/navBar.php"; ?>
 

<hr />
<!-- start page -->
<!-- start main content -->
<div id="main">

  <p>DPR Timesheet is an online  version the Department of Parks and Recreation excel timesheet.  It is simple and easy to enter hours worked  and the supporting timesheet information. <br>
  Some of the benefits of DPR  Timesheet are:</p>
  <ul>
    <li>Capturing detailed timesheets from any internet-connected  device </li>
    <li>Since it is web based there is no software to  install</li>
    <li>Improved data  validation </li>
  </ul>
  <p>Additionally, the DPR  timesheet offers the ability to also print timesheets that look as great on  paper as they do on the screen.</p>

</div>
<!-- end main content -->

  <!--
  *
  *  Define div footer
  *
  -->
<div class="footer">
	<p align="center">Clarence Mitchell <br>
    <span><img src="images/csumb_logo-bay_blue-480x150-tagline.png"  alt="CSUMB Logo" /> </span>
    </p>
</div>


</body>
<!-- InstanceEnd --></html>