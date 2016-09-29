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
    <title>Sign-Up</title>

       <script  src="js/jquery.js"></script>
       <script  src="js/signup.js"></script>

  </head>

  <body>


		<h1>Sign-Up</h1>
		
		<form method="POST" class="form"  action="#">
		    <input type="number" id="userid" name="userid" placeholder="Uid">
			<input type="text" id="user" name="user" placeholder="Username">
			<input type="password" id="pass" name="pass" placeholder="Password">
			<input type="password" id="pass1" name="pass1" placeholder="Confirm Password">
			<button type="submit" name="submit" id="signup-button">Sign-Up</button><br><span id="uname"></span>
		</form>
		
		
		
        <button type="submit" id="login">Login here</button>
       
		 
 
  </body>
</html>
