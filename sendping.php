<?php
session_start();
include('dbconnect.php');  
    $nid = $_POST['CR'];



        $sql = "SELECT * FROM teacher_info WHERE name='$nid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $rname=$row['name'];


        $uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
                     $sname=$row['name'];
                     





                     $sql = "INSERT into  ping  VALUES ('$sname','$rname')";
                     mysqli_query($conn, $sql);

        header("Location:home.php");
    


?>