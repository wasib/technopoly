<?php
 include 'connect.php';
 include 'bal.php'; 
  
?>
 <html>
 <body>

 <a href="home.php">back</a><br>
   qid-----level<br>----------------------------<br>
 <?php
 $qstn = "select owner.qid,question.level from owner inner join question on question.qid=owner.qid where (ownerid ='$uid' and status=0) or (ownerid='$uid' and status=4) order by level,time"; 
 $result = mysqli_query($conn, $qstn);
 ?>

 <?php
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		?>
		 <form action="displayq.php" method="post">
		<?php
        echo "<input type='hidden' name='qid' value='".$row["qid"]."'>".$row["qid"]."-----".$row["level"] ;
		?>
		 <input type="submit" value="solve">
	
          </form>
		<?php
    }
 }
 else
	 echo "Nothing here. Please purchase some questions";
 ?>



 </body>
 </html>
 
