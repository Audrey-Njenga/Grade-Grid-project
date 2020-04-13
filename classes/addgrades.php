<?php
class addGrades extends database
{

    function returnStudents($cohort)
    {
        $query = "SELECT firstName, lastName FROM users WHERE cohortID=?;";
        $statment = $this->connect()->prepare($query);
        $statment->execute([$cohort]);
        $names = $statment->fetchAll();
        foreach ($names as $name) {
            echo $name;
            // echo '<div class="col-md-4">
            // <p id="studentname"></p><div class="input-group">
            // <span class="input-group-addon">Enter grade </span>
            // <input id="msg" type="text" class="form-control" name="grade">
            // </div><br>
            // <div class="input-group">
            // <span class="input-group-addon">Comment </span>
            // <!--Add text area-->
            // <input id="msg" type="text" class="form-control" name="comment">
            // </div class="uploadform"><br>';
        }
    }
}
