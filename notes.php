<?php 
  session_start();
  include 'dbconnect.php';

  if (isset($_POST['date']) && isset($_POST['notes'])) {
    $date = $_POST['date'];
    $notes = $_POST['notes'];
} else {
    die();
}

  $uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $name=$row['name'];
  echo $date;
  echo $notes;


 
  $q = mysqli_query($conn, "INSERT INTO notes VALUES ('$name','$date','$notes')");


  header("Location:home.php");
 
 ?>