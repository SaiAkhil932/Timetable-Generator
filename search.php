<div class="form-group">
    <label for="class_room_no">Class Room No</label>
        <select name="CR" class="list-group-item">
            <option selected disabled>Select ClassRoom</option>
            <?php
            $q = mysqli_query($conn,
                "SELECT * FROM classrooms ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['croom_no']}\">{$row['croom_no']}</option>\"";
            }
            ?>

        </select>
        
    </div  class="form-group" >