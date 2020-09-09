<?php 
  session_start();
  include 'dbconnect.php';

  if (isset($_POST['roll']) && isset($_POST['tutno']) && isset($_POST['marks'])) {
    $roll = $_POST['roll'];
    $tutno = $_POST['tutno'];
    $marks = $_POST['marks'];
} else {
    die();
}

  $uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $name=$row['name'];


 
  $q = mysqli_query($conn, "INSERT INTO statistics VALUES ('$name','$roll','$tutno','$marks')");


  header("Location:statistics.html");
 
 ?>