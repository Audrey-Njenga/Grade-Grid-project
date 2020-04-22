<!DOCTYPE html>
<html lang="en">
<?php 
include_once "../classes/login.php";
include "../classes/database.php";
session_start();
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
    <title>My page</title>
</head>
<style>
    h2{
        text-align: center;
        color: black;
        padding: 10px;
    }
</style>
<body>
    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
        <h2><?php 
        $query = "SELECT * FROM facilitators WHERE userID='".$_SESSION['userID']."';" or die($conn->error);
        $result = $conn->query($query);
        $row = $result->fetch_array();
        echo "Welcome ".$row['firstName'];
        ?>  </h2>

    </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-4">
                <button onclick="window.location.href = '/pages/insertgrades.php';" class="btn btn-primary"><i class="material-icons">add</i></button>
                <p>Upload new grades</p>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-primary"><i class="material-icons">create</i></button>
                <p>Edit grades</p>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-primary"><i class="material-icons">comment</i></button>
                <p>View edit requests</p>
            </div>
        </div>
    </div>

</body>