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
	<!--*************jQuery MAKE SURE YOU HAVE IT************-->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	
	
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

  <p>If you are experiencing an issue or need more information about DPR TimeSheet, please complete the form below.</p>
    <form method="post" title="Contact Form">
      <table width="770" border="0" summary="Table to hold contact form fields">
      <caption>
        Contact Information
      </caption>
          <tr>
            <td width="217"><label  for="fist_name" class="cformLabel">First Name:</label></td>
            <td width="269"><input name="first_name" type="text" required id="first_name" title="First Name" size="40" maxlength="50"></td>
            <td width="270">&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="last_name" class="cformLabel">Last Name:</label></td>
            <td><input name="last_name" type="text" required id="last_name" title="Last Name" size="40" maxlength="50"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="telephone" class="cformLabel">Telephone Number:</label></td>
            <td><input name="telephone" type="tel" required id="telephone" title="Telephone Number" size="40" maxlength="30"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="email" class="cformLabel">Email Address:</label></td>
            <td><input name="email" type="email" required id="email" title="Email Address" size="40" maxlength="80"></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="houseNumber" class="cformLabel">House Number:</label></td>
            <td><input name="houseNumber" type="number" required id="houseNumber" title="House Number" size="10" maxlength="15"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label  for="streetName" class="cformLabel">Street Name:</label></td>
            <td><input name="streetName" type="text" required id="streetName" title="Street Name" size="50" maxlength="60"></td>
            <td>&nbsp;</td>
          </tr>          
           <tr>
            <td><label  for="zipCode" class="cformLabel">Zip Code:</label></td>
            <td><input name="zipCode" type="number" required id="zipCode" title="zip code" size="5" maxlength="10"></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="city" class="cformLabel">City:</label></td>
            <td><input name="city" type="number"  readonly  id="city" title="city" size="35" maxlength="50"></td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><label  for="state" class="cformLabel">State:</label></td>
            <td><input name="state" type="number"  readonly  id="state" title="state" size="5" maxlength="8"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><label  for="comments" class="cformLabel">Comment/Issue:</label></td>
            <td><textarea name="comments" cols="40" rows="3" maxlength="100" required id="comments" title="comments"></textarea></td>
            <td></td>
          </tr>


          <tr>
             <td height="50" align="center">&nbsp;</td>
             <td height="50" align="center"><input name="sendtoself" type="checkbox" id="sendtoself" value="Yes">
            <label for="sendtoself">Send to self </label></td>
             <td height="50">&nbsp;</td>
        </tr>
          <tr>
            <td align="center"><input name="submit" type="submit"  id="submit" formaction="mailscript.php" accesskey="S" tabindex="5" value="Submit"></td>
            <td align="center"><input type="reset" name="Reset" id="Reset" value="Reset" accesskey="R" tabindex="6"></td>
            <td>&nbsp;</td>
          </tr>
        </table>

    </form>


</div>
<!-- end main content -->
  <script>
       
         $("#zipCode").change(  function(){
             alert(  $("#zipCode").val()      );

              $.ajax({
            type: "get",
             url: "zip.php",
        dataType: "json",
            data: { "zip_code": $("#zipCode").val() },
            success: function(data,status) {
                 alert(data["city"]);
                 //$("#city").html(data["city"]);
                 //$("#state").html(data["state"]);
                 $("#city").val(data["city"]);
				 $("#state").val(data["state"]);

              },
            complete: function(data,status) { //optional, used for debugging purposes
                  alert(status);
              }
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("XMLHttpRequest", XMLHttpRequest);
                console.log("textStatus", textStatus);
                console.log("errorThrown", errorThrown);    
            }
 
         });


         } ); //end changeEvent
</script>
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