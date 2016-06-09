<?php
	session_start();
	
	$includesPrefix = "../includes";	
	include_once $includesPrefix . '/constants.php';
	include_once $includesPrefix . '/debugFunctions.php';
   
    $gameID 	= $_POST[ 'gameID' ];
    $gamePrc 	= $_POST[ 'gamePrc' ];
	$gameBtnTxt	= $_POST[ 'gameBtnText' ];
	$gameCart	= $_SESSION["gameCart"];
	$gameRtnTxt	= "";
	$cartCount	= 0;
	//$gameCart	= $_POST["gameCart"];
	


    $contact_message = "Game ID: " . $gameID . ". Game Price : " . $gamePrc;
    //$result = mail( "your email address", "Contact Email", $contact_message );
	
	//debug_to_console($contact_message);
	
	if (isset($gameCart)) {
		if(array_key_exists($gameID, $gameCart)) {
			unset($gameCart[$gameID]);	 
			$gameRtnTxt = rentText;	
			}
		else{
			$gameRtnTxt = errorText;
			}
	}
	
	$_SESSION["gameCart"] = $gameCart;
	
	if (isset($gameCart) && !empty($gameCart)) {
		$cartCount = count($gameCart) ;
	 	}
	else {
		$cartCount = 0;
	 }
    print_r( json_encode( array("btntxt" => $gameRtnTxt, "cartnum" => $cartCount ) ) );
?>