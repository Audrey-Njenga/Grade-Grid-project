<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include_once "../classes/login.php";
include_once "../classes/database.php";
include_once "../classes/gradesaddd.php";
$stmt = $conn->query("SELECT * FROM students WHERE userID='" . $_SESSION['userID'] . "'") or die($conn->error);
$_SESSION['name'] = $stmt->fetch_object()->firstName;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>My page</title>
</head>
<style>
    select.custom-select {
        width: 40%;
        margin-right: 40%;
    }

    form {
        text-align: center;
    }

    h4 {
        text-align: left;
        margin-left: 5%;
    }
</style>

<body>
    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div>
    <h4>Welcome <?php echo $_SESSION['name']; ?></h4><br><br>
    <div class="justify-content-center">
        <form method="POST" action="studentlanding.php">
            <select required class="custom-select" name="courseName">
                <option selected>Select Course</option>
                <?php
                $query = "SELECT * from courses";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['courseName'] . '">' . $row['courseName'] . '</option><br>';
                }
                ?>
            </select><br><br>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
    </div>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Title </th>
                    <th>Grade </th>
                    <th>Comment </th>
                </tr>
            </thead>
            <?php
            if (isset($_POST['search'])) :
                $courseName = $_POST['courseName'];
                $result = printGrade($courseName);
            
                while ($row = $result->fetch_object()) : ?>
              <tr>
                    <td> <?php echo $row->title; ?></td>
                    <td> <?php echo $row->grade; ?></td>
                    <td> <?php echo $row->comment; ?></td>
                    
            </tr>

                <?php endwhile;?>
                <?php endif;?>
        </table>
    </div>

</body>

</html>