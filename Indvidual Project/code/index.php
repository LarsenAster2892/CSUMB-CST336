<?php
//initialize the session
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


	// ** Logout the current user. **
	//$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
	$logoutAction ="<a href='./logout.php' title='Logout'>";

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
	$cssPrefix			= "CSS/";

  	// The following include contains the PDO definition and load functions
	include_once $includesPrefix . '/debugFunctions.php';


	//
	// Initialize variables
	//
	$loginUsername = (!empty($_SESSION['MM_Username'] ) ? $_SESSION['MM_Username']  : NULL);
	$loginSuccess  = (isset($_SESSION['MM_loginSuccess']) ? $_SESSION['MM_loginSuccess'] : FALSE);

	$MM_restrictGoTo 		= "denied.php";

	 if (empty($loginUsername)) {
		$_SESSION['errMessage']	= "Cannot access page.  Please login first!";
		header("Location: " . $MM_restrictGoTo);
		exit;
	 } elseif (!$loginSuccess){
		$_SESSION['errMessage']	= "Cannot access page without valid login.  Please login first!";
		header("Location: " . $MM_restrictGoTo);
		exit;
	 } else {
	 	$_SESSION['PrevUrl'] = $_SERVER['PHP_SELF'];
	 }

	$userProfileData = (!empty($_SESSION['MM_UserData']) ? $_SESSION['MM_UserData'] : NULL);
	if(empty($userProfileData)){
		//
		//   First time through so get data from database
		//
		$userProfileData = getDBUserData($loginUsername);
		$_SESSION["userProfileData"] = $userProfileData;
		}
	else {
		//
		//  Not first time so load data from saved session
		//
		$userProfileData = $_SESSION["userProfileData"];
	}

	$firstName 		 = $userProfileData["firstName"];
	$middleName 	 = $userProfileData["middleName"];
	$lastName 		 = $userProfileData["lastName"];
	$positionNumber	 = $userProfileData["positionNumber"];
	$userPictureFile = $userImagePrefix . $userProfileData["userpic_file"];

function &getDBUserData($loginUsername){
	global $connectPrefix, $includesPrefix;

	require_once $connectPrefix . "db_connect.php";
	$conn = dbConnect($error);

	try{
		$sql = "SELECT * FROM proj_users WHERE username = :username";
		$stmt = $conn->prepare($sql);  			//prepares a statement for execution and returns a statement

		// Define  query parameter values
		$query_params = array(
			':username' => $loginUsername
			);

		$stmt->execute($query_params);
		$errorInfo = $stmt->errorInfo();

		}// end try
	catch(PDOException $ex)	{
		die("Failed to run query: " . $ex->getMessage());

		} // end catch

	//$LoginRS = $stmt->fetch(PDO::FETCH_ASSOC); 				//store the obtained data into an array variable
	$LoginRS = $stmt->fetch(); 				//store the obtained data into an array variable
	//phpAlert("Number records = " . $stmt->rowCount());
	return $LoginRS;
}

?>

<!doctype html>
<!--
************************************************************************
    CST336  Internet Programming
    Fall 2014
    Instructor: Dr. Su Bude
    Student: Clarence Mitchell
************************************************************************
-->
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
    <div id="banner">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
              width="100%"
              height="350"
              class="bannerImg"
              id="FlashID"
              title="Pictures of State Parks">
            <param name="movie" value="flash/parksPics1024x350-9.swf">
            <param name="quality" value="high">
            <param name="scale" VALUE="exactfit">
            <param name="wmode" value="opaque">
            <param name="swfversion" value="9.0.45.0">
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher
                 to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="Scripts/expressInstall.swf">
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
             <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="flash/parksPics1024x350-9.swf" width="100%" height="350">
            <!--<![endif]-->
                <param name="quality" value="high">
                <param name="wmode" value="opaque">
                <param name="scale" VALUE="exactfit">
                <param name="swfversion" value="9.0.45.0">
                <param name="expressinstall" value="Scripts/expressInstall.swf">
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                    <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                    <p><a href="http://www.adobe.com/go/getflashplayer">
                            <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"
                                 alt="Get Adobe Flash player"
                                 width="112"
                                 height="33" />
                        </a>
                     </p>
                </div>
              <!--[if !IE]>-->
            </object>
        	<!--<![endif]-->
        </object>
    </div>
  	<div id="newshead">
  		<img src="<?php echo $userPictureFile; ?>"
             alt="User Picture"
             class="left" />
		<span id="userInfo">
            <h2 class="title">Welcome <?php echo $firstName . "&nbsp;" . $lastName; ?> <br><br> to the DPR Timesheet Application!

                <img src=<?php echo $imagePrefix . "news.jpg" ?>
                     alt="News and Information Logo"
                     name="newsLogo"
                     width="573"
                     height="142"
                     id="newsLogo" />
            </h2>
        </span>

  	</div>
  	<div id="news">
      <h2>Latest News and Information</h2>
 	  <hr class="hrline">
      <p> Please see <span class="alerttext">About</span> for information about this application</p>
      <p> If you are need more information, please see
      	<span class="alerttext">Contact</span> to submitting your information for contact.
      </p>

  	</div>
</div>
<!-- end main content -->
<script type="text/javascript">
swfobject.registerObject("FlashID");
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
</html>
