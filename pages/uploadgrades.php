<!DOCTYPE html>
<html lang="en">
<?php
include_once "../classes/gradesaddd.php";
include_once "../classes/database.php";
session_start();

?>
<style>
    select.custom-select {
        width: 40%;
    }

    input.form-control {
        margin-left: 0%
    }

    h6 {
        color: black;
    }
    div.col-md-3{
        text-align: left;
        padding-left: 100px;
    }
    div.col-md-9{
        margin:0;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>Upload grades</title>
</head>

<body>
    <?php
    if (isset($_POST['enter'])) {
        header("Location: /pages/uploadgrades.php");
        session_start();
        $_SESSION['cohort'] = $_POST['cohort'];
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['courseName'] = $_POST['courseName'];
    }

    ?>

    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div>
    <div class="row">
        <div class="col-md-3">
            <h6>Cohort:<span style="color:darkblue"> <?php echo $_SESSION['cohort']; ?></span>
            </h6><br>
            <h6>Course:<span style="color:darkblue"> <?php echo $_SESSION['courseName']; ?></span>
            </h6><br>
            <h6>Title:<span style="color:darkblue"> <?php echo $_SESSION['title']; ?></span>
            </h6><br>
        </div>
        <div class="col-md-9">
            <select class="custom-select" form="upload" name="studentName">
                <option selected>Select Student</option>
                <?php
                $cohort = $_POST['cohort'];
                $query = "SELECT * FROM students WHERE cohortID='" . $_SESSION['cohort'] . "'" or die($conn->error);
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['lastName'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option><br>';
                }
                ?>
            </select><br>
            <form action="uploadgrades.php" method="POST" id="upload" class="justify-content-center">

                <br>
                <input class="form-control" type="text" name="grade" required placeholder="Enter Grade (numbers only)"><br>
                <input class="form-control" type="text" name="comment" required placeholder="Enter Comment (optional)"> <br>
                <button type="submit" class="btn btn-primary" name="save">Save</button><br>

            </form>
        </div>

    </div>


    <?php

    if (isset($_POST['save'])) {
        $grade = $_POST['grade'];
        $comment = $_POST['comment'];
        $title = $_SESSION['title'];
        $courseName = $_SESSION['courseName'];
        $name = $_POST['studentName'];
        $result = $conn->query("SELECT * FROM students WHERE lastName='" . $name . "'")->fetch_assoc();
        $studentID = $result['studentID'];
        $row = $conn->query("SELECT * FROM courses WHERE courseName='" . $courseName . "'")->fetch_assoc();
        $courseID = $row['courseID'];
        if (!$stmt = $conn->prepare("INSERT into grades(studentID, courseID, title, grade, comment) values(?, ?, ?, ?, ?);")) {
            echo "Prepare failed " . $conn->error;
        }
        if (!$stmt->bind_param("sssss", $studentID, $courseID, $title, $grade, $comment)) {
            echo "Bind failed " . $conn->error;
        }
        if (!$stmt->execute()) {
            echo "Execute fail " . $conn->error;
        }
    }
    ?>

</body>