<?php
    session_start();
	if(isset($_SESSION["uid"]))
    {
    header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
  
        <script  src="js/jquery.js"></script>
       <script  src="js/login.js"></script>
    
  </head>

  <body>


	  
		<h1>Login3</h1>
		
		<form method="POST" class="form"  action="#">
			<input type="text" name="user" id="user" placeholder="Username">
			<input type="password" name="pass" id="pass" placeholder="Password">
			<button type="submit" name="submit" id="login-button">Login</button><br><span id="uname"></span>
		</form>
		
		
        <button type="submit" id="register" >Register</button>
        

    
    
    
    
  </body>
</html>
