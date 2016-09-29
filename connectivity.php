<?php
  include 'connect.php'; 
/*
 $ID = $_POST['user']; $Password = $_POST['pass']; 
*/
 //function SignIn()
 //{ 
 session_start();  //starting the session for user profile page 
     $a=$_POST['user'];
	 $b=$_POST['pass'];
 if(!empty($a)&& !empty($b) ) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
{
 $query = "SELECT * FROM login where uname = '$a' AND password = '$b'";
 $result = mysqli_query($conn, $query);
 if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['uid']=$row["uid"];	
    }
//echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
  //header("Location: profile.php");
   echo 1;
 } 
else
 {
 //echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
//echo '<script type="text/javascript">location.href = "login.php";alert("SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...");</script>';
 echo 2;
 }
 }
 else
 {
	 //echo "empty username";
	// echo '<script type="text/javascript">location.href = "login.php";alert("please fill all the fields");</script>';
      echo 3;
	 }
 //}

 //if(isset($_POST['submit'])) 
//{ 
//SignIn(); 
//}  
?>

