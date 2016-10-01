<?php
 include 'connect.php'; 

 
 //function Register()
// { 
 $uid = $_POST['userid'];$uname = $_POST['user']; $pass = $_POST['pass']; $pass1=$_POST['pass1'];
if(!empty($uname) && !empty($pass)) 
{    
	if($pass===$pass1)
	{   
        $q = "SELECT * FROM login where uid = '$uid' ";
        $result = mysqli_query($conn, $q);
	    if (mysqli_num_rows($result) > 0)
		{
			echo 2;
	    }
	    else
			{
				$q1 = "SELECT * FROM login where uname = '$uname' ";
                $result1 = mysqli_query($conn, $q1);
				if (mysqli_num_rows($result1) > 0)
		        {
					echo 4;
				}
				else
				{
			    $q2 = "insert into login (uid,uname,password,slot) values ('$uid','$uname','$pass',1)";
		        $result1 = mysqli_query($conn, $q2);
		      if($result1)
			    echo 1;
				}
			}
	}
	else{
		//echo "passwords do not match";
	  //echo '<script type="text/javascript">location.href = "signup.php";alert("passwords do not match");</script>';
	  echo 3;
	}		
}
else{
	//echo "please fill all the fields";
	//echo '<script type="text/javascript">location.href = "signup.php";alert("please fill all the fields");</script>';
	//echo   '<script language="javascript">alert("fill all fields")</script>';
	
	}
//}
// if(isset($_POST['submit'])) 
//{ 
//Register(); 
//}  
?>

