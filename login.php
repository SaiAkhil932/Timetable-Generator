<?php 
  session_start();
  include 'dbconnect.php';
  if (isset($_POST['username']) && isset($_POST['pass'])) {
      $id = $_POST['username'];
      $password = $_POST['pass'];
  } else {
      die();
  }
  $q = mysqli_query($conn, "SELECT * FROM teacher_info WHERE uname = '$id' and password = '$password' ");
  if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_array($q);
      $_SESSION['sid']=$row['tid']; 
       header("Location:home.php");

    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

 ?>