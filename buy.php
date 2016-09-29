<?php
 include 'connect.php'; 

 $qid = $_POST['qid']; $uid = $_POST['uid']; $bal = $_POST['bal'];
 
  $q = "select costprice from value where level=(select level from question where qid=".$qid.")";
       $result = mysqli_query($conn, $q);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $costprice=$row["costprice"];	
    }
 }
 
$s = "select * from owner where qid=".$qid;
       $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
     echo 3;
 }
 
 else
 {
	
		 if($bal<$costprice)
		 {
			 echo 2;
		 }
		 else
		 {
			 $q1 = "insert into owner(qid,ownerid) values(".$qid.",".$uid.")";
			 $q2 = "update login set balance=balance-".$costprice." where uid=".$uid;
		     $result1 = mysqli_query($conn, $q1);
		     $result2 = mysqli_query($conn, $q2);
	         if($result1&&$result2)	
                echo 1;				 
		 }
 }
 
 
 ?>