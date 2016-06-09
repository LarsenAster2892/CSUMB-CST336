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

   	// The following include contains routines for authenticating the user for the page
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
<?php
    $first_name = $_POST['first_name']; // required

    $last_name = $_POST['last_name']; // required

    $email_address = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $houseNumber = $_POST['houseNumber']; 

    $streetName = $_POST['streetName']; 
	
    $zipCode = $_POST['zipCode']; 
	
    $city = $_POST['city']; 

    $state = $_POST['state']; 
     
    $comments = $_POST['comments']; // required

    
?>
  <p class="cformAlert">Thank you  <?php echo $first_name; ?>&nbsp;<?php echo $last_name; ?> .  You message has been sent.</p>

Your information is noted as:
    <form method="get" title="Contact Form">
      <table width="770" border="0" summary="Table to hold contact form fields">
      <caption>
        Contact Information
      </caption>
          <tr>
            <td width="217"><label  for="fist_name" class="cformLabel">First Name:</label></td>
            <td width="269"><input name="first_name" type="text" required id="first_name" title="First Name" value="<?php echo $first_name; ?>" size="40" maxlength="50" readonly></td>
            <td width="270">&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="last_name" class="cformLabel">Last Name:</label></td>
            <td><input name="last_name" type="text" required id="last_name" title="Last Name" value="<?php echo $last_name; ?>" size="40" maxlength="50" readonly></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="telephone" class="cformLabel">Telephone Number:</label></td>
            <td><input name="telephone" type="tel" required id="telephone" title="Telephone Number" value="<?php echo $telephone; ?>" size="40" maxlength="30" readonly></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="email" class="cformLabel">Email Address:</label></td>
            <td><input name="email" type="email" required id="email" title="Email Address" value="<?php echo $email_address; ?>" size="40" maxlength="80" readonly></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="houseNumber" class="cformLabel">House Number:</label></td>
            <td><input name="houseNumber" type="number" readonly id="houseNumber" title="House Number" value="<?php echo $houseNumber; ?>" size="10" maxlength="15"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="streetName" class="cformLabel">Street Name:</label></td>
            <td><input name="streetName" type="text" readonly id="streetName" title="Street Name" value="<?php echo $streetName; ?>" size="50" maxlength="60"></td>
            <td>&nbsp;</td>
          </tr>          
           <tr>
            <td><label  for="zipCode" class="cformLabel">Zip Code:</label></td>
            <td><input name="zipCode" type="number" readonly id="zipCode" title="zip code" value="<?php echo $zipCode; ?>" size="5" maxlength="10"></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="city" class="cformLabel">City:</label></td>
            <td><input name="city" type="number"  readonly  id="city" title="city"  value="<?php echo $city; ?>" size="35" maxlength="50"></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="state" class="cformLabel">State:</label></td>
            <td><input name="state" type="number"  readonly  id="state" title="state"  value="<?php echo $state; ?>" size="5" maxlength="8"></td>
            <td>&nbsp;</td>
          </tr>


           <tr>
            <td valign="top"><label  for="comments" class="cformLabel">Comment/Issue:</label></td>
            <td><textarea name="comments" cols="40" rows="3" maxlength="100" readonly required id="comments" title="comments"><?php echo $comments; ?></textarea></td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>

    </form>
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