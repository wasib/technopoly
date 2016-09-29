<?php
    session_start();
	if(!isset($_SESSION["uid"]))
    {
    header("Location: login.php");
	}
?>

<!DOCTYPE HTML> 
<html>
 <head>
 <title>
 logout
 </title> 
 </head>
 <body id="body-color">
 <?php
   { 
	 session_destroy();
	 $_SESSION=array();
	 header("Location: login.php");
   }  
 ?>
 
 
 </body>
 </html> 
