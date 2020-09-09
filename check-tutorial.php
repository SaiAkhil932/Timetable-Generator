
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
                     

	$qq = mysqli_query($conn, "SELECT * FROM tutorial WHERE date ='$curdate' and name='$name'");
      $row = mysqli_fetch_array($qq);
      $tutno=$row['tutorialno'];
    

 
      if($tutno!='')
      {
          $message = "Your have a quiz/tutorial called :  $tutno  scheduled for today.";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
       elseif($tutno=='')
       {    
            $message = "No tutorials are scheduled for today";
            echo "<script type='text/javascript'>alert('$message');</script>";
       }
    ?>