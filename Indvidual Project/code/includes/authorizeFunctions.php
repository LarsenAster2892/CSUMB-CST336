<?PHP
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
	// Initialize variables
	//
	$logoutAction 			= $_SERVER['PHP_SELF']."?doLogout=true";

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

?>


