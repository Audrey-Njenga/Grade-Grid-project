<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>Upload</title>
</head>

<body>
    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div>
    <br><br>

    </div>
    <div class="upload">
        <form id="cohortSelection" method="POST" action="uploadpage.php">
            <input type="text" placeholder="Enter cohort" class="form-control" id="upload" name="cohort"><br>
            <button type="submit" class="btn btn-primary ">Search</button>
        </form><br>
        <hr>
        <!-- <form id="addGrades" method="$_POST" action="uploadpage.php">
            <p>Student Name</p>
            <p id="student"></p>
            <div class="input-group">
                <span class="input-group-addon">Enter grade </span>
                <input id="msg" type="text" class="form-control" name="grade">
            </div><br>
            <div class="input-group">
                <span class="input-group-addon">Comment </span>
                Add text area-->
                <!-- <input id="msg" type="text" class="form-control" name="comment">
            </div class="uploadform"><br>
            <button type="submit" class="btn btn-primary ">Next</button><br><br>
        </form><br<hr--> 
         <!-- enters grade title  and submits-->
        <form id="notify" method="$_POST" action="uploadpage.php">
            <input type="text" placeholder="Enter title for the grades e.g. Quiz 2" class="form-control" name="title"><br>
            <button on click="" type="submit" class="btn btn-primary ">Complete</button><br><br>
        </form>
        
        
    </div>
</body>
<?php
include('/classes/addgrades.php');
$cohort = $_POST['cohort'];
$user = new addGrades();
$user->returnStudents($cohort);

$grade = $_POST['grade'];
$comment = $_POST['comment'];


?>

</html>