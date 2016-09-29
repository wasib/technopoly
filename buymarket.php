<?php
 include 'connect.php'; 

 $qid = $_POST['qid']; $uid = $_POST['uid']; $bal = $_POST['bal'];
 
$s = "select status,ownerid,saleprice from owner inner join market on market.qid=owner.qid where owner.qid=".$qid;
       $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
        $status=$row["status"];
		$ownerid=$row["ownerid"];
		$saleprice=$row["saleprice"];
    }
 }
 
 if($status==3)
 {
	 if($uid==$ownerid)
	 {
		 echo 3;
	 }
	 else
	 {
		 if($bal<$saleprice)
		 {
			 echo 2;
		 }
		 else
		 {
			 $q1 = "update login set balance=balance+".$saleprice." where uid=".$ownerid;
			 $q2 = "update login set balance=balance-".$saleprice." where uid=".$uid;
		     $q3 = "update owner set status=4,ownerid=".$uid." where qid=".$qid;
			 $q4 = "delete from market where qid=".$qid;
		     $result1 = mysqli_query($conn, $q1);
		     $result2 = mysqli_query($conn, $q2);
			 $result3 = mysqli_query($conn, $q3);
			 $result4 = mysqli_query($conn, $q4);
	         if($result1&&$result2&&$result3&&$result4)	
                echo 1;				 
		 }
	 }
 }
 else 
	 echo 4;
 ?>