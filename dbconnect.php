<?php 
  error_reporting(E_ALL ^ E_NOTICE);  
  $host='localhost';
  $username='root';
  $pass='';
  $db='teacher';

  $conn=mysqli_connect($host,$username,$pass,$db);

  if(!$conn) {
    die();
  }
 ?>