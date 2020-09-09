<?php

session_start();
include('dbconnect.php');


$uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $ssubject=$row['subject'];
					 $clr=$row['classroom'];
					 $name=$row['name'];
                    


	$q = mysqli_query($conn, "SELECT sender FROM ping WHERE receiver ='$name'");
	$row = mysqli_fetch_array($q);
    $sender=$row['sender'];
    

    if($sender!='')
	{
        $message = "You received a ping from:  $sender";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}
     elseif($sender=='')
     {
		$message = "You have no messages from other faculties";
		echo "<script type='text/javascript'>alert('$message');</script>";
     }

    ?>
    
   