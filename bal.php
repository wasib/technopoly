 <?php
 include 'connect.php';
 session_start();
if(!isset($_SESSION["uid"]))
    {
    header("Location: login.php");
	} 
 $uid=$_SESSION['uid'];
 $s = "SELECT uname,balance from login where uid =".$uid;
       $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
		$uname=$row["uname"];
        $bal=$row["balance"];	
    }
 }
 echo "uid='$uid' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp username='$uname' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp balance='$bal'<br><br>";
 ?>