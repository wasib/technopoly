<?php
 include 'connect.php'; 

 $qid = $_POST['qid']; $ans = $_POST['ans'];
 
$s = "SELECT status from owner where qid =".$qid;
       $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
        $status=$row["status"];
		
    }
 }
 
 if($status==0 || $status==4)
 {
 if(!empty($qid) && !empty($ans)) 
{   
	   $q = "SELECT correctAnsId,prize FROM question inner join value on value.level=question.level where qid =".$qid;
       $result = mysqli_query($conn, $q);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $crctans=$row["correctAnsId"];
		$prize=$row["prize"];
    }
 }

    if($ans==$crctans)
	{
		$q1 = "update login set balance=balance+".$prize." where uid=(select ownerid from owner where qid=".$qid.")";
		$q2 = "update owner set status=1 where qid=".$qid;
		$result = mysqli_query($conn, $q1);
		$result1 = mysqli_query($conn, $q2);
		   if ($result&&$result1)
		    {
             echo 1;
            }
	}
	else 
	{
		$q2 = "update owner set status=2 where qid=".$qid;
		$result1 = mysqli_query($conn, $q2);
		if ($result1)
		    {
             echo 2;
            }
	}      
	
		
}
 }
else 
	echo 3
?>

