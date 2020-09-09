<?php 
  session_start();
  include 'dbconnect.php';

  if (isset($_POST['date']) && isset($_POST['tutno'])) {
    $date = $_POST['date'];
    $tutno = $_POST['tutno'];
} else {
    die();
}

  $uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $name=$row['name'];


 
  $q = mysqli_query($conn, "INSERT INTO tutorial VALUES ('$name','$date','$tutno')");


  header("Location:home.php");
 
 ?>