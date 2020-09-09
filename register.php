<?php
include 'dbconnect.php';
if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['phone']) && isset($_POST['email']) ) {
    $sname = $_POST['fullname'];
    $snumber = $_POST['username'];
    $sroll = $_POST['phone'];
    $semail = $_POST['email'];
    $spassword = $_POST['pass'];
    $ssubject=$_POST['subject'];
    $cabin=$_POST['cabin'];

   
} else {
    $message = "dead.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
$q = mysqli_query($conn, "INSERT INTO teacher_info ( name,uname,email,password,phone,subject,cabin) VALUES ('$sname','$snumber','$semail','$spassword','$sroll','$ssubject','$cabin')");

$sql = "CREATE TABLE " . $sname . " (
dayid VARCHAR(10) PRIMARY KEY,
day VARCHAR(10), 
period1 VARCHAR(30),
period2 VARCHAR(30),
period3 VARCHAR(30),
period4 VARCHAR(30),
period5 VARCHAR(30),
period6 VARCHAR(30),
period7 VARCHAR(30),
period8 VARCHAR(30)
    )";
mysqli_query($conn, $sql);
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
for ($i = 0; $i <5 ; $i++) {
    $day = $days[$i];
    $sql = "INSERT into " . $sname . " VALUES('$i','$day','','','','','','','','')";
    mysqli_query($conn, $sql);
}
$class = array('csea','cseb','csec');
for($i =0; $i <3 ; $i++)
{
    $c=$class[$i];
    $chk= mysqli_query($conn, 
    "SELECT " . $c . " FROM flag where SUBJECT= '$ssubject' and " . $c . " = 0");
    if(mysqli_num_rows($chk)==1){
    $flag=1;
    $chk= mysqli_query($conn, 
    "UPDATE flag SET " . $c . " =1 WHERE SUBJECT= '$ssubject'");
    $clr= mysqli_query($conn,
    "UPDATE teacher_info SET classroom = '$c' WHERE name= '$sname'");
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
    "UPDATE " . $sname . " SET " . $p1 . " ='$ssubject'  where day in(select DAY from " . $c . " WHERE " . $p2 . "='$ssubject')");
    $i++;
}
}
else{
    $message = "timetable not created please change your subject in update profile page!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}






if ($q) {
    $message = "teacher added.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:login.html");
} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    

}

?>