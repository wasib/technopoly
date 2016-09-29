<?php
 include 'connect.php'; 
  include 'bal.php'; 

?>
 <html>
  <script  src="js/jquery.js"></script>
 <script  src="js/market.js"></script>


 <body>
<a href="home.php">back</a><br>
 
 <?php
 echo "<input type='hidden' id='uid' value='".$uid."'>";
 echo "<input type='hidden' id='bal' value='".$bal."'>";
 $qstn = "select question.qid,owner.ownerid,login.uname,market.saleprice,question.level from owner inner join question on question.qid=owner.qid inner join login on login.uid=owner.ownerid inner join market on question.qid=market.qid where owner.status=3 order by time"; 
 $result = mysqli_query($conn, $qstn);
 ?>
 qid-----uid-----ownername----level-----saleprice<br>
 <select id="qid" size="20">
 <?php
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row["qid"]."'>".$row["qid"]."-----".$row["ownerid"]."-----".$row["uname"]."-----".$row["level"]."-----".$row["saleprice"]."</option>" ;
    }
 }
 ?>
 </select>
<button id="buy" type="submit" value="buy">buy</button><br>
 
 
 </body>
 </html>
 