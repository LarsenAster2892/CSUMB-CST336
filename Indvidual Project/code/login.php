<?php
// *** Validate request to login to this site.
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
	include_once $includesPrefix . '/constants.php';
	//
	//  ~~~ Clear variables for processing
	//

	$errMessage    	 = "";
	$errFormFields	 = "";
	$loginAttempts 	 = 0;
	$loginUsername	 = "";
	$password		 = "";
	$loginFormAction = $_SERVER['PHP_SELF'];
	$MM_redirectLoginSuccess 	= "index.php";
	$MM_redirectLoginFailed 	= "denied.php";
	$_SESSION['MM_loginSuccess'] 	= false;

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//
		//  If the page was reposted then validate the changes
		//
		//
		if(empty($_POST['username'])) {
		   $errFormFields .= "A UserNme is required! <br>";
		   //$cssfirstName = "errorInput";
		}
		else {
			$loginUsername = $_POST['username'];
		}


		if(empty($_POST['password'])) {
		   $errFormFields .= "A Password is required! <br>";
		   //$cssfirstName = "errorInput";
		}
		else {
			$password = $_POST['password'];
		}


		$loginAttempts = (!empty($_SESSION['loginAttempts']) ? $_SESSION['loginAttempts'] : 0);

		if(empty($errMessage) && isset($_POST['username'])) {

			$MM_loginSuccess 			= false;

			if (checkDBUser($loginUsername, $password)) {
				//declare two session variables and assign them
				$_SESSION['MM_Username'] 		= $loginUsername;
				$_SESSION['MM_loginSuccess'] 	= true;
				$_SESSION['PrevUrl'] 			= $_SERVER['PHP_SELF'];
				$_SESSION['loginAttempts']		= 0;
				$userData = array();
				$_SESSION['MM_UserData'] 		= $userData;
				header("Location: " . $MM_redirectLoginSuccess );
				}
			else {
				$errMessage = checkLoginAttempts($loginAttempts, $MM_redirectLoginFailed, maxLoginAttempts);
				}
			}
		else {
			$_SESSION['errMessage']		= $errMessage;
			}
		}
	else
	{
		//
		//  Else this is first time through the page so initialize data
		//

		$loginUsername 	= "";
		$password 		= "";
		$loginAttempts  = 0;
		$_SESSION['loginAttempts']	= 0;
	}

	$_SESSION['errMessage']		= $errMessage;

function checkLoginAttempts($loginAttempts, $redirectLocation, $maxLoginAttempts)
{
	//phpAlert("loginAttempts:". $loginAttempts);
	if ($loginAttempts++ >= $maxLoginAttempts){
		$errMessage				    = "Too many attmepts at logging in!";
		$_SESSION['errMessage']		= $errMessage;
		$_SESSION['loginAttempts']	= 0;
		header("Location: " . $redirectLocation);
	}
	else {
		$attemptsLeft 				= $maxLoginAttempts - $loginAttempts + 1;
		$attempWord					= ($attemptsLeft > 1 ? " attempts " : " attempt ");
		$errMessage				    = "Invalid username or password, you have " . $attemptsLeft . $attempWord ." left";
		$_SESSION['errMessage']		= $errMessage;
		$_SESSION['loginAttempts']	= $loginAttempts;
	}
	return $errMessage;
}

function checkDBUser($loginUsername, $password){
	global $connectPrefix, $includesPrefix;

	$loginFoundUser = false;

	require_once $connectPrefix . "db_connect.php";
	$conn = dbConnect($error);

	try{
		$sql = "SELECT username, password FROM proj_users WHERE username = :username AND password = :password";
		$stmt = $conn->prepare($sql);  			//prepares a statement for execution and returns a statement

		// Define  query parameter values
		$query_params = array(
			':username' => $loginUsername,
			':password' => sha1($password)
			);

		$stmt->execute($query_params);
		$errorInfo = $stmt->errorInfo();

		}// end try
	catch(PDOException $ex)	{
		die("Failed to run query: " . $ex->getMessage());

		} // end catch

	$LoginRS = $stmt->fetch(); 				//store the obtained data into an array variable

	$loginFoundUser = ($stmt->rowCount()? true : false);
	//$loginFoundUser = !empty($LoginRS);

	return $loginFoundUser;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!--
    *
    *  Standard page title and CSS file definition.
    *    Note:  This page has a different css than the calling page
    *
     -->
    <title>CST336 - Individual Project (Timesheet)</title>
    <link href="CSS/profileLayout.css" rel="stylesheet" type="text/css">
    <link href="CSS/loginstyles.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">
  <div class="header">
  	<a href="#"><img src="images/dprlogo.png"
    				 alt="DPR Logo"
                     name="DPR Logo"
                     width="135"
                     height="135"
                     class="left"
                     id="Insert_logo"
                     style="background-color: #8090AB; " />
    </a>
    <h1> Welcome to DPR Timesheet!</h1>


  </div> <!-- end .header -->
  <div class="content">
    <h2>Enter Login Information</h2>

		<form ACTION="<?php echo $loginFormAction; ?>"
              METHOD="POST"
              name="login_form"
              class="loginformfmt"
              id="login_form">

            <table width="30%" border="0" id="tableFormat" >
              <tr align="left">
                <td width="200" >
          			<label class="login_form" id="usrtextfmt">Username:</label>
                </td>
                <td width="200">
              		<input name="username"
                           type="text"
                           autofocus
                           required
                           class="entryBoxfmt"
                           value="<?php echo htmlspecialchars($loginUsername);?>"
                           form="login_form">
                </td>
              </tr>
              <tr>
                <td>
             		<label class="entryBoxfmt" id="pwdtextfmt">Password:</label>

                </td>
                <td width="200">
                	<input name="password"
                           type="password"
                           required class="entryBoxfmt"
                           value="<?php echo htmlspecialchars($password);?>"
                           form="login_form">
                </td>
              </tr>
              <tr>
                <td align="center">
                 	<input type="submit"
                           class="bttnfmt"
                           form="login_form"
                           value="Login">
                </td>
                <td align="center">
                	<input type="reset"
                           class="bttnfmt"
                           form="login_form"
                           value="Cancel">
                </td>
              </tr>
            </table>
		</form>
        <p class="errMsgTxt"><?php echo $errMessage; ?></p>

    <!-- end .content -->
  </div>
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
</div><!-- end .container -->
</body>
</html>