<?php
 include 'connect.php'; 
 include 'bal.php'; 

?>
 <html>
 
 <script  src="js/jquery.js"></script>
 <script  src="js/displayq.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

 <body>
 <a href="myaccount.php">back</a>&nbsp
 <a href="home.php">home</a><br>
 <?php
 if($qid=$_POST['qid'])
 {
 
 
 $qstn = "SELECT question.qid,question,question.level,costprice,status FROM question inner join value on value.level=question.level inner join owner on owner.qid=question.qid where question.qid =".$qid;
 $result = mysqli_query($conn, $qstn);
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<input type='hidden' id='level' value='".$row["level"]."'>";
		echo "<input type='hidden' id='cp' value='".$row["costprice"]."'>";
		echo "<input type='hidden' id='qid' value='".$row["qid"]."'>";
		$level=$row["level"];
		$cp=$row["costprice"];
		$status=$row["status"];
		if($status==4)
		{
			echo "<style>#sell{display:none}</style>";
		}
		
        echo "id: " . $row["qid"]. " - question: " . $row["question"] ."<br>";
    }
 }

 $ans = "SELECT * FROM answers where qid =".$qid;
 $result = mysqli_query($conn, $ans);
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<input type='radio' name='ans' value='".$row["ansid"]."'>".$row["answer"]."<br>" ;
    }
 }
 
//mysqli_close($conn);
 }
else
	 header("Location: home.php");
?>
<button id="submitans" type="submit" >submit</button><br><br>

<input id="sell" type="button" value="sell" >

<div id="dialog" title="Dialog Form">

<input id="price" name="price" type="number" min="1" max="<?php echo $cp -1 ?>">
<button id="sellf" type="submit" value="sell">sell</button><br>

</div>
 <?php
    $q="select * from value where level=".$level;
	$r=mysqli_query($conn,$q);
	 if (mysqli_num_rows($r) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($r)) {
        echo "On Solving Correctly You Get=".$row["prize"] ;
    }
 }
 ?>
 </body>
 </html>
