<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once "../classes/login.php";
include "../classes/database.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>Edit page</title>
</head>
<style>
    /* Add styling */
    select.custom-select {
        width: 50%;
    }

    input#msg.form-control {
        width: 60%;
        color: red;
    }
</style>

<body>

    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div><br>
    
    <div class="justify-content-center">
        <h4> Edit Grades </h4><br>
        <form method="POST" action="editgrades.php">
            <select required class="custom-select" name="title">
                <option selected>Select Grades</option>
                <?php $user = $_SESSION['userID'];
                $qu = "SELECT * FROM facilitators WHERE userID='" . $user . "'"  or die($conn->error);;
                $return = $conn->query($qu)->fetch_assoc();
                $courseID = $return['courseID'];
                $query = "SELECT title FROM grades WHERE courseID='" . $courseID . "';" or die($conn->error);
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option><br>';
                }

                ?>
            </select><br><br>
            <button type="submit" class="btn btn-primary" name="searchGrades">Submit</button>
        </form>

    </div>

    <?php
    if (isset($_POST['searchGrades'])) {
        $title = $_POST['title'];
        $sql = "SELECT * FROM grades WHERE title='" . $title . "'";
        $grades = $conn->query($sql);
    }
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Student </th>
                    <th>Title</th>
                    <th>Grade </th>
                    <th>Comment</th>
                    <th col-span="2">Action</th>
                </tr>
            </thead>
            <?php
            while ($row = $grades->fetch_assoc()) :
            ?>
                <tr>
                    <td> <?php $name = $conn->query("SELECT * from students WHERE studentID='" . $row['studentID'] . "'")->fetch_assoc();
                            echo $name['firstName'] . " " . $name['lastName']; ?></td>
                    <td> <?php echo $row['title']; ?></td>
                    <td> <?php echo $row['grade']; ?></td>
                    <td> <?php echo $row['comment']; ?></td>
                    <td>
                        <a href="editgrades.php?edit=<?php echo $row['gradeID']; ?>" class="btn btn-info">Edit</a>
                        <a href="../classes/process.php?delete=<?php echo $row['gradeID']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile;
            ?>
        </table>
    </div>


    <div class="row justify-content-center">

        <form action="/classes/process.php" method="POST" id="add">
            <div class="input-group">
                <input id="msg" type="hidden" class="form-control" name="id"  value=<?php $id ?>>
                <input id="msg" type="text" class="form-control" name="grade" placeholder="Grade" value=<?php echo $grade ?>>
            </div><br>
            <div class="input-group">
                <input id="msg" type="text" class="form-control" name="comment" placeholder="Comment" value=<?php echo $comment ?>>
            </div class="uploadform"><br>
            <button type="submit" class="btn btn-info" name="update">Update</button><br>
        </form>

    </div>

</body>