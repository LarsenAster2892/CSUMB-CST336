<?php

 session_start();

	 $status = "";
	 $loggedIn = 0;
	 
	 if(!isset($_SESSION['username'])){
	 	$status = "<a href='./login.php' title='Login/Register'><span style='color:red;'>Login/Register</span>";
	 	$loggedIn = false;
	 } else {
	
	 	$status = "<a href='./update.php' title='Update Profile' style='color:white;'>Cart for:, " . $_SESSION['username'] . 
	 				"!</a><a href='./logout.php' title='Logout'><span style='color:red;'>Logout</span>";
		$loggedIn = true;
	 }
	 
	if(isset($_SESSION['gameCart']) ){
		$gameCart	= $_SESSION["gameCart"];
	}
	else {
		$gameCart	= array();
		$_SESSION["gameCart"] = $gameCart;
	}
	

//	 $gameCart	= $_SESSION["gameCart"];
//	 $_SESSION["gameCart"] = $gameCart;
	
	
	// import all database connection settings
 	// $includesPrefix 	=  "../../labs";
  	// $jqueryPrefix 	=  "/avendanoluciano/cst336/js/";
	// $imagePrefix		=  "/avendanoluciano/cst336/images/"; 
	// $cssPrefix       =  "/avendanoluciano/cst336/css/";
	$includesPrefix = "./includes";
    $jqueryPrefix 	= "./jquery/";
	$imagePrefix 	= "./images/";
	$cssPrefix		= "./css/";
  	require $includesPrefix . '/db_conn.php';
	

  	// The following include contains the PDO definition and load functions
  	include_once $includesPrefix . '/dbfunctions.php';
	include_once $includesPrefix . '/constants.php';
	include_once $includesPrefix . '/debugFunctions.php';


	 if(!isset($_SESSION['username'])){
	 $status = "<a href='./login.php' title='Login/Register'><span style='color:red;'>Login/Register</span>";
	 
	 } else {
	
	 $status = "<a href='./update.php' title='Update Profile' style='color:white;'>Welcome back, " . $_SESSION['username'] . 
	 			"!</a><a href='./logout.php' title='Logout'><span style='color:red;'>Logout</span>";
	
	 }



	$emptyCart = true;

	$sort     = (isset($_POST['sort']) ? $_POST['sort'] : null);
	if (isset($_SESSION['gameCart']))
	{
		$gameCart = $_SESSION['gameCart'];
	}
	else
	{
		$gameCart = $array();
	}
	
	if (count($gameCart)> 0){
		$emptyCart = false;
	}
	 //
	 // Functions for database processing
	 // 
	  include_once  $includesPrefix . '/dbfunctions.php';
	
	  //
	  //  Functions for processing page html
	  //
	  include_once $includesPrefix . '/htmlBuild.php';	
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Solid Shelf - Video Game Rentals</title>

    <!--
		PHP processing of css file and jquery libraries
     -->
      <?php
		echo '<link href="' .$cssPrefix . 'solid_shelf_cart.css" rel="stylesheet" type="text/css">';
		echo '<link rel="stylesheet" href="' . $jqueryPrefix . '/jquery-ui-1.11.2.custom/jquery-ui.theme.css">';
		echo '<script src="http://code.jquery.com/jquery-1.10.2.js"></script>';
		echo '<script src="' . $jqueryPrefix .'/jquery-ui-1.11.2.custom/jquery-ui.js"></script>';
	  ?>

    <script>var __adobewebfontsappname__="dreamweaver";</script>
    <script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
    

<script>
$.fx.speeds._default = 800;
$(function() {
<?php
  if (!$emptyCart){
	if (isset($_POST['sort']) || $sort = "gameId"){
	   $games = getCartGames($gameCart);
	   foreach ($games as $game){
	  	 echo  "$( \".description".$game['gameId']."\" ).dialog({autoOpen: false,show: \"blind\",hide: \"explode\"});";
	  	 echo  "$( \".opener".$game['gameId']."\" ).click(function() {\$( \".description".$game['gameId']."\" ).dialog( \"open\" ); return false;});";
		 }
	} else{
		$sort="gameId";
		}
  }
?>
});
</script>
</head>

<body>
<div id="mainWrapper">
  <header> 
    <!-- This is the header content. It contains Logo and links -->
        <div id="headerLinks">
        	<?php echo $status ?></a>
        	<a href="#" title="Cart">Cart</a>
        	<span id="cartCount" ><?php echo getCartCount($gameCart) ?></span>
        	<a href="./index.php" title="Home">Home</a>
      </div>

  </header>
  <section id="offer"> 
  	<!-- The offer section displays a banner text for promotions -->
  	<table style="text-align: left; line-height: 10%;">
  		<tr>
  			<td>
  				<?php echo '<img src="' . $imagePrefix . 'LOGO.png" style="width:100px; height:110px;">' ?>
  			</td>
  			<td>
  				 <h1>SolidShelf Game Rentals</h1>
                 We are guaranteed to beat any online competitor!
  			</td>
   			
			<?php
		    	if (!$emptyCart){
					if ($loggedIn){
						echo '<a href="#" title="Rent Games"><img src="' . $imagePrefix . 
						      'rentnow.png" id="rentBtn" class="rentNowBtn" style="width:188px; height:110px;"></a>';
					} else {
						echo '<a href="login.php" title="Login Now"><img src="' . $imagePrefix . 
						      'login.png" id="loginBtn" class="rentNowBtn" style="width:188px; height:110px;"></a>';
					}
				} 
			?>
         
	  </tr>
  	</table>
	<script>
	$( "#rentBtn" ).click(function() {
	  alert( "Rent function is unavailable right now." );
	});
	
	</script>
  </section>
  <div id="content">
    <nav class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      Search:
      <input type="text"  id="search" value="search">
      
      <div id="menubar">
        <div class="menu">
          <h1>OtterDesignInc.</h1>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><a href="/kuleckcaitlin/CST336/homepage.html" title="Caitlin Kuleck">Caitlin</a></li>
            <li><a href="/mitchellclarenceg/public_html/CST336/index.html" title="Clarence Mitchell">Clarence</a></li>
            <li><a href="/avendanoluciano/cst336/index.html" title="Luciano Avendano">Luciano</a></li>
            <li><a href="#" title="Gracie Alderete">Gracie</a></li>
            <li class="notimp"><a href="http://www.csumb.edu/"  title="CSUMB">CSUMB</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="mainContent">
      <table>
      	<tr>
      		<td>
      			<form method="post" >
      			</form>
      		</td>
      		<td>
            	<div >
            	<?php
					if ($emptyCart){
                		echo "<img src='images/emptycart.png' class='cartMessage'>";
					} else {
      					echo "<span style='color: white;'>Click on the image for more info.</span>";
					}
				?>
                </div>
      		</td>
      	</tr>
      </table>	

      <div class="productRow">
      	<!-- Each product row contains info of 3 elements -->
        <!-- Each individual product description -->
          <?php
		   if (!$emptyCart){
            if (isset($_POST['sort']) || $sort = "gameId"){
            	$gameRow = getCartGames($gameCart);
				 $rtnString = "";
				 
				 foreach ($gameRow as $game){
					 $gameID = $game['gameId'];
					// $btnRentText = getButtonText($gameCart, $gameID);
					 $btnRentText = "Remove from Cart";
					 $rtnString = "";
					 $rtnString .= "<div class='productInfo'>";
					 $rtnString .=   "<div class='description" . $gameID . "' title='" .$game['title'] ."'>";
					 $rtnString .=     "<b>Description: </b>" . $game['description'] . "<br />";
					 $rtnString .=     "<b>Category: </b>" . $game['name'] . "<br />";		 
					 $rtnString .=     "<b>Developer: </b>" . $game['maker'] . "<br />";
					 $rtnString .=     "<b>System: </b>" . $game['system'] . "<br />";
					 $rtnString .=     "<b>Release Date: </b>" . $game['releaseDate'] . "<br />";
					 $rtnString .=   "</div>";
					 $rtnString .=   "<div>";
					 $rtnString .=     "<input type='image' class='opener" . $gameID; 
					 $rtnString .=     "' style='height:100px;width:100px' ";
					 $rtnString .=     "src='" . $imagePrefix  ."solid_images/". $game['image'] . "' />";
					 $rtnString .=   "</div>";
					 $rtnString .=   "<p class='price'> $" . $game['rentAmount'] ."</p> ";
					 $rtnString .=   "<p class='productContent'>" . $gameID . " " . $game['title'] . "</p> ";
					 $rtnString .=   "<p class='productContent'> Category: " . $game['name'] . "</p> ";
					 $rtnString .=   "<p class='productContent'> System: " . $game['system'] . "</p> ";
					 $rtnString .=   "<input type='button' name='rent' value='" .  $btnRentText;
					 $rtnString .=     "' class='buyButton' onclick='btnClickFunction(this,". $gameID .",". $game['rentAmount'] . ")'>";
					 $rtnString .= "</div>"; 
					 echo $rtnString;
				 	} // end - foreach
								
				 } 
			else {
				// Else set the default sort by game id
				$sort = "gameId";
			} // else
		   } // end - if !emptycart

	?>	
    	  
<!-- =========================================== -->
<!--  Ajax function to process Add Button        -->   
<!-- =========================================== -->
      
<script>
function btnClickFunction(elmnt, gId, gPrc) {
 //   elmnt - page element reference
 //   gId   - Game ID from element
 //   gPrc  - Game Price from element
 //
 //  for more information about Ajax 
 //  Please see http://api.jquery.com/jquery.ajax/
 //
 //  Brief summary:  sends an asynchronous requests to the server to execute program like PHP (ie background processing)
 //   type     - either get or post...
 //   data     - is data passed to server function
 //   url      - location of calle 
 //   success  - A function to be called if the request succeeds
 //    result  - The data returned from the server - has to parsed using JSON.parse
 //                JSON.parse(data) convert a JSON text into a JavaScript object 
 //   error    - A function to be called if the request fails
 //   complete - A function to be called after success and error callbacks are executed. 
   
    $.ajax({
 	  type:'POST', 
	  data:{gameID: gId, gamePrc: gPrc, gameBtnText: $(elmnt).val()},    
	  url:'includes/removeCart.php',
	  success: function(result){
		  console.log(result);
		  var rtndata = JSON.parse(result);
		  $(elmnt).val(rtndata.btntxt);
		  var strCnt = " " + rtndata.cartnum;
		  $("#cartCount").text(strCnt);
		  window.location.reload(true);
	  },
      complete: function (response) {
		  $("#cartCount").show();
      },
      error: function(jqXHR, textStatus, errorThrown) {
		  console.log(textStatus, errorThrown);
          $(elmnt).val("Error!");
      }
  });

}
</script>                  
			  
      </div>



    </div>
  </div>
  <footer> 
    <!-- This is the footer with default 3 divs -->
    <div> <p>Guard: “I used to be an adventurer like you … then I took an arrow in the knee.”</p></div>
    <div> <p>Dom: “Did you hear that? What the hell’s that sound?”<br />
             Marcus: “It’s just the wind.”<br />
             Dom: “Yeah, right. When was the last time the wind said ‘hostiles’ to you?”</p> </div>
    <div> <p style="color:red;" >Otter-Design-Inc. Solid Shelf Games 2015</p></div>
    <form>
    <input type="hidden" name="posted" value="yes" />
    </form>
  </footer>
</div>
</body>
</html>
