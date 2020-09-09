
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
                    
                     
                    
    $curdate=date("Y-m-d")  ;            
                     

	$q = mysqli_query($conn, "SELECT * FROM notes WHERE date ='$curdate'");
	$row = mysqli_fetch_array($q);
    $info=$row['info'];
    

    if($info!='')
	{
        $message = "Your notes for today are :  $info";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}
     elseif($info=='')
     {
			$message = "You have no notes for today";
            echo "<script type='text/javascript'>alert('$message');</script>";
     }
    ?>
    