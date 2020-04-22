<?php

require "../classes/database.php";

session_start();

$grade = "";
$comment = "";
$update = false;
$id = 0;

if (isset($_POST['save'])) {

    $grade = $_POST['grade'];
    $comment = $_POST['comment'];
    $conn->query("INSERT into Grades (Grade, Comments, Title, CourseID, StudentID) values('$grade', '$comment', 'Quiz 10', 112, 1 )") or die($conn->error);
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    header("location: insertgrades.php");
}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $conn->query("DELETE FROM Grades WHERE ID=$id") or die($conn->error);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    header("location: insertgrades.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM Grades WHERE ID=$id") or die($conn->error);
    if (count($result)==1){
        $row = $result->fetch_array();
        $grade = $row['Grade'];
        $comment = $row['Comments'];

    }

}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $grade = $_POST['grade'];
    $comment = $_POST['comment'];
    $conn->query("UPDATE Grades SET Grade='$grade', Comments='$comment' WHERE ID=$id;") or die($conn->error);
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    header("location: insertgrades.php");
}