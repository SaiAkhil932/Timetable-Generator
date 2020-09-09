
<div id="TT" style="background-color: #FFFFFF">
        <table border="2" style="align: center" id="timetable">
            <caption><strong><br><br>
                   
                </strong></caption>
            <tr>
                <th id="day" style="text-align:center">day</th>
                <th id="p1" style="text-align:center">period1</th>
                <th id="p2" style="text-align:center">period2</th>
                <th id="p3" style="text-align:center">period3</th>
                <th id="p4" style="text-align:center">period4</th>
                <th id="p5" style="text-align:center">period5</th>
                <th id="p6" style="text-align:center">period6</th>
                <th id="p7" style="text-align:center">period7</th>
                <th id="p8" style="text-align:center">period8</th>
            </tr>
            <tr>
                <?php

session_start();
include('dbconnect.php');  
$sid=$_SESSION['sid'];

        $sql = "SELECT * FROM teacher_info WHERE tid='$sid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $name=$row['name'];


                $qq = mysqli_query($conn,
                "SELECT * FROM " . $name ."");
            $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY');
            $i = -1;
            $str = "<br>";
                
                while ($row = mysqli_fetch_assoc($qq)) {
                  $i++;

                  echo "
           <tr><td style=\"text-align:center\">$days[$i]</td>
           <td style=\"text-align:center\">{$row['period1']}</td>
          <td style=\"text-align:center\">{$row['period2']}</td>
          <td style=\"text-align:center\">{$row['period3']}</td>
           <td style=\"text-align:center\">{$row['period4']}</td>
            <td style=\"text-align:center\">{$row['period5']}</td>
            <td style=\"text-align:center\">{$row['period6']}</td>
            <td style=\"text-align:center\">{$row['period7']}</td>
            <td style=\"text-align:center\">{$row['period8']}</td>
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
            