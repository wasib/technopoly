<?php
 include 'connect.php'; 
 include 'bal.php';

 $lev = $_GET['level'];
 echo "<input type='hidden' id='uid' value='".$uid."'>";
 echo "<input type='hidden' id='bal' value='".$bal."'>";
 echo "<input type='hidden' id='lev' value='".$lev."'>";
?>
 <html>
 <script  src="js/jquery.js"></script>
 <script  src="js/store.js"></script>
 
 <body>
 <a href="home.php">back</a><br>
 <form action="store.php">Level select:
<select id="level" name="level">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
<input type="submit" value="search">
 </form>
 
 <script>
  var lev = $("#lev").val();
	$("#level").val(lev);
 </script>
 
 
 <?php
          echo "Level ".$lev."<br>";
 $qstn = "SELECT a.qid FROM question a LEFT JOIN owner b ON a.qid = b.qid  WHERE b.qid IS NULL and a.level=".$lev; 
 $result = mysqli_query($conn, $qstn);
 ?>
 
 <select id="qid" size="20">
 <?php
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row["qid"]."'>".$row["qid"]."</option>" ;
    }
 }
 ?>
 </select>
 <button id="buy" type="submit" value="buy">buy</button><br>
 
 
 </body>
 </html>
 