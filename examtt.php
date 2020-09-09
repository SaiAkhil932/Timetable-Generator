<?php
session_start();
include('dbconnect.php');  
$sid=$_SESSION['sid'];

        $sql = "SELECT * FROM teacher_info WHERE tid='$sid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $name=$row['name'];


?>
<div id="TT" style="background-color: #FFFFFF">
        <table border="2" style="align: center" id="timetable">
            <caption><strong><br><br>
                   
                </strong></caption>
            <tr>
                <th id="day" style="text-align:center">date</th>
                <th id="p1" style="text-align:center">subject</th>
               
            </tr>
            <tr>
                <?php

                $qq = mysqli_query($conn,
                "SELECT * FROM examtt");
            $str = "<br>";
                
                while ($row = mysqli_fetch_assoc($qq)) {

                  echo "
           <tr><td style=\"text-align:center\">{$row['date']}</td>
           <td style=\"text-align:center\">{$row['subject']}</td>
         
          </tr>\n";
              }

              
               
                ?>
                <style>
            button {
                position: absolute;
                left: 730px;
                top: 225px;
                }
</style>               
    </div>
            