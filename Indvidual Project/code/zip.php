<?php
/*
 *******************************************************************
 * CLass		: CST336 SP-A-2015
 * Instructior	: Dr. Su Bude
 * Student		: Clarence Mitchell
 * Assignment	: Lab 7 (zip.PHP)
 * Description	: zip.php - used to lookup city for zipcode
 *******************************************************************
 */
//
//  Standard Database connnection include
//
require "../../includes/dbConnection.php";


         $sql = "SELECT * FROM zip_code " .
                " WHERE zip = " . $_GET['zip_code'];
         $stmt = $dbConn->query($sql);
         $results = $stmt->fetchAll();
         
         echo "{";
         foreach ($results as $record){
             echo "\"city\":" . "\"" . $record['city'] . "\",";
             echo "\"state\":" . "\"" . $record['state'] . "\"," ;
             //echo "\"county\":" . "\"" . $record['county'] . "\"," ;
             //echo "\"area\":" . "\"" . $record['areaCode'] . "\"," ;
             echo "\"latitude\":" . "\"" . $record['latitude'] . "\"," ;
             echo "\"longitude\":" . "\"" . $record['longitude'] . "\"" ;

              ;
         }
         echo "}";

?>

