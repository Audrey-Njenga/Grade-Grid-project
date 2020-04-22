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
    <title>Upload</title>
</head>
<style>
    span.input-group-addon {
        padding: 5px;
    }

    form#add {
        margin: 0;
    }
</style>


<body>
    <?php
    require_once 'process.php';
    require '../classes/database.php';
    ?>

    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div>
    <?php
    if (isset($_SESSION['message'])) :
    ?>
        <div class="alert alert-<?= $_SESSION['msg-type'] ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php
    endif ?>

    <?php
    $result = $conn->query("SELECT * FROM Grades") or die($conn->error);
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Grade </th>
                    <th>Comment </th>
                    <th col-span="2">Action</th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) :
            ?>
                <tr>
                    <td> <?php echo $row['Grade']; ?></td>
                    <td> <?php echo $row['Comments']; ?></td>
                    <td>
                        <a href="insertgrades.php?edit=<?php echo $row['ID']; ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile;
            ?>
        </table>
    </div>
    <div class="row justify-content-center">

        <form action="process.php" method="POST" id="add">
            <div class="input-group">
            <input id="msg" type="hidden" class="form-control" name="id" value=<?php
                 echo $id;?>>
                <span class="input-group-addon">Grade </span>
                <input id="msg" type="text" class="form-control" name="grade" placeholder="Enter grade" value=<?php
                 echo $grade;?>>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon">Comment </span>
                <input id="msg" type="text" class="form-control" name="comment" placeholder="Enter comment" value=<?php
                echo $comment;?>>
            </div class="uploadform"><br>
            <?php if ($update == true):?>
                <button type="submit" class="btn btn-info" name="update">Update</button><br>
            `           <?php else:?>
            <button type="submit" class="btn btn-primary" name="save">Save</button><br>
            <?php endif; ?>
        </form>
        <hr>
        </form>
    </div>