<?php
/*
 * -------------------------------------------------------
 *
 * Include for processing tables in Database
 *
 * -------------------------------------------------------
*/

 function getGames() {
       global $dbConn, $stat, $sort; //it uses the variables declared previously
    //NOTE: field names MUST match the ones in database, they are case sensitive!
    $sql = "SELECT gameId,g.categoryId,title,description,maker,rentAmount,system,releaseDate,image,name
            FROM solidshelf_games g
            JOIN solidshelf_category c
            ON g.categoryId = c.categoryId
            ORDER BY " . $sort . " ASC";

    $stat = $dbConn -> prepare($sql);
    $stat -> execute();
    return $stat->fetchAll();
	 }

 function getCartGames(&$inCart) {
       global $dbConn, $stat, $sort; //it uses the variables declared previously
    //NOTE: field names MUST match the ones in database, they are case sensitive!
	$keys = array_keys($inCart);

	$sql = "SELECT gameId,g.categoryId, title, description, maker, rentAmount, system, releaseDate, image, name
            FROM solidshelf_games g
            JOIN solidshelf_category c
            ON g.categoryId = c.categoryId
            WHERE gameId  IN(".implode(',',$keys ).") ORDER BY gameId ASC";

    $stat = $dbConn -> prepare($sql);
    $stat -> execute();
    return $stat->fetchAll();
	 }

 

?>

