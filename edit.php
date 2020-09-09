<?php
session_start();
  
include('dbconnect.php');


        if (isset($_POST['fullname']) && isset($_POST['subject']) && isset($_POST['email']) ) {
            $name = $_POST['fullname'];
            $roll = $_POST['subject'];
            $email = $_POST['email'];
        
            header("Location:home.php");
            
 
        } else {
            $message = "dead.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            die();
        }
        $sid=$_SESSION['sid'];

        $q = mysqli_query($conn, "UPDATE teacher_info set uname='$name' where tid='$sid'");
        $q = mysqli_query($conn, "UPDATE teacher_info set email='$email' where tid='$sid'");
        $q = mysqli_query($conn, "UPDATE teacher_info set subject='$roll' where tid='$sid'");

        $sql = "SELECT * FROM teacher_info WHERE tid='$sid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $sname=$row['name'];



$period = array('period1', 'period2', 'period3', 'period4', 'period5','period6','period7','period8');
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
$i=0;
while($i<9)
{
    $p1=$period[$i];
    $qq = mysqli_query($conn, 
    "UPDATE " . $sname . " SET " . $p1 . " =''  where day in(select day from " . $sname . ")");
    $i++;
}



$class = array('csea','cseb','csec');
for($i =0; $i <3 ; $i++)
{
    $c=$class[$i];
    $chk= mysqli_query($conn, 
    "SELECT " . $c . " FROM flag where SUBJECT= '$roll' and " . $c . " = 0");
    if(mysqli_num_rows($chk)==1){
    $flag=1;
    $chk= mysqli_query($conn, 
    "UPDATE flag SET " . $c . " =1 WHERE SUBJECT= '$roll'");
    break;
    }
    else{
        $flag=0;
    }
}
if($flag==1){
$i=0;
$period = array('period1', 'period2', 'period3', 'period4', 'period5','period6','period7','period8');
$per=array('PERIOD1','PERIOD2','PERIOD3','PERIOD4','PERIOD5','PERIOD6','PERIOD7','PERIOD8');
while($i<9)
{
    $p1=$period[$i];
    $p2=$per[$i];
    $qq = mysqli_query($conn, 
    "UPDATE " . $sname . " SET " . $p1 . " ='$roll'  where day in(select DAY from " . $c . " WHERE " . $p2 . "='$roll')");
    $i++;
}
}
else{
    $message = "timetable not created please change your subject in update profile page!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
        



?>