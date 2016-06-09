<?php
// set for session processing
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
   	<title>CST336 - Individual Project (Timesheet)</title>

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
    <h2 class="deniedtxt">Access Denied</h2>
    <h3 class="deniedtxt"><?php echo $_SESSION['errMessage']; ?></h3>
    <p class="centerText">return to <a href="login.php">Login</a>
    </p>
  </div><!-- end .content -->
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
