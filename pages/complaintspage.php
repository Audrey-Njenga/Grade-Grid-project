<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>Edit Requests</title>
</head>
<?php include_once "/classes/database.php";
session_start();
?>

<body>
    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div><br>
    <div class="container justify-content-center">
        <h4>Grade Edit Requests</h4><br>
        <form method="POST" action="complaintspage.php">
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
            <button type="submit" class="btn btn-primary" name="searchComplaint">Submit</button>
            <h4>fgrs</h4>
        </form>
        <?php
        if (isset($_POST['searchComplaint'])) {
            $courseID = $conn->query("SELECT courseID from courses WHERE courseName ='" . $_POST['courseName'] . "';") or die($conn->error);
            $que = "SELECT * FROM complaints WHERE courseID='" . $courseID . "';" or die($conn->error);
        }


        ?>

        <div class="content-justify-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Comment </th>
                        <th>Grade </th>
                        <th>Student</th>
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

                    <?php endwhile; ?>
                <?php endif; ?>
            </table>
        </div>

    </div>

</body>