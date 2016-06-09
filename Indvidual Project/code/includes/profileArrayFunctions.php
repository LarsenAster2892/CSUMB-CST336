<?PHP
 /* ====================================================
  * =
  * = 		Functions used in program
  * =
  * ===================================================
 */
 
 
  	 /*
	 *------------------------------------------------------------------------
	 * Funciton: setAWWArray
	 * Description: set vaules in Alternate workweek array
	 * Parameters: &$ioAWWArray 	(byref)  -  Assocative Array to be updated
	 *             $inAltWorkWeek   (byval)  -  Value selected by user
	 *-----------------------------------------------------------------------
	 */

 
	 function setAWWArray(&$ioAWWArray, $inAltWorkWeek)
	 {
		switch ($inAltWorkWeek)
		 {
			case "4-10-40":
				$ioAWWArray[1] = "checked";
				break;
			case "9-8-80":
				$ioAWWArray[2] = "checked";
				break;
			case "None":
				$ioAWWArray[0] = "checked";
				break;
			default:
				$ioAWWArray[0] = "checked";
		}
	 }

 
   	 /*
	 *------------------------------------------------------------------------
	 * Funciton: setPSTArray
	 * Description: set vaules in PhoneTypeSelect array
	 * Parameters: &$ioPTSArray 	(byref)  -  Assocative Array to be updated
	 *             $inphoneType		(byval)  -  Value selected by user
	 *-----------------------------------------------------------------------
	 */

	 function setPSTArray(&$ioPTSArray, $inphoneType)
	 {
		switch ($inphoneType)
		 {
			case "Office":
				$ioPTSArray[1] = "selected";
				break;
			case "Cell":
				$ioPTSArray[2] = "selected";
				break;
			case "Home":
				$ioPTSArray[3] = "selected";
				break;
			default:
				$ioPTSArray[0] = "selected";
		}
	 }
 

?>


