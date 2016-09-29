<?php
 include 'connect.php'; 
 
 $qid = $_POST['qid']; $price = $_POST['price'];

 $s = "SELECT status from owner where qid =".$qid;
       $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
        $status=$row["status"];
		
    }
 }
 
if($status==0)
{
	if(!empty($qid) && !empty($price)) 
	{    
	  
        $q1 = "insert into market values (".$qid.",".$price.")";
		$q2 = "update owner set status=3 where qid=".$qid;
		$result = mysqli_query($conn, $q1);
		$result1 = mysqli_query($conn, $q2);
		   if ($result&&$result1)
		    {
             echo 1;
            }
			else { 
			 echo 2;
			}
	    
	
		
	}

}
else 
	echo 3;
?>

