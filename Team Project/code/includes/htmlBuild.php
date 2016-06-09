<?php
/*
 * -------------------------------------------------------
 *
 * Include for processing html on pages
 *
 * -------------------------------------------------------
*/	 
	 
function getButtonText($ioGameCart, $inGameID) {
	//$ioGameCart	= $_POST["gameCart"];
	$rtnBtnText = "";
	
	if (!isset($ioGameCart)) {
		$rtnBtnText	= rentText . "1";
		}
	else {
		if(array_key_exists($inGameID, $ioGameCart)) {
			$rtnBtnText	= addedText;
			}
		else{
			$rtnBtnText	= rentText;
			}
	}
	
	return $rtnBtnText;
}
			
function getCartCount(&$ioGameCart){

	if (isset($ioGameCart) && !empty($ioGameCart)) {
		$cartCount = count($ioGameCart) ;
		}
	else {
		$cartCount = 0;
	 }
	 
	return $cartCount;	
}
?>