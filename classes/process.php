<?php

require "database.php";

session_start();

$grade = "";
$comment = "";
$id = 0;


if (isset($_POST['update'])){
    $id = $_POST['id'];
    $grade = $_POST['grade'];
    $comment = $_POST['comment'];
    $conn->query("UPDATE Grades SET Grade='$grade', Comments='$comment' WHERE ID=$id;") or die($conn->error);
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    header("location: editgrades.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM grades WHERE gradeID=$id") or die($conn->error);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    header("location: ../pages/editgrades.php");
}

if (isset($_GET['edit'])) {    
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM grades WHERE gradeID='" . $id . "';") or die($conn->error);
    if (count($result) == 1) {
        $row = $result->fetch_assoc();
        $grade = $row['grade'];
        $comment = $row['comment'];

    }
}

