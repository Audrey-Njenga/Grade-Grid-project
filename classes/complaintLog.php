<?php
session_start();
require_once "database.php";
include_once "login.php";

echo $_SESSION['userID'];

if (isset($_POST['log'])){
    $complaint = $_POST['complaint'];
    $gradeTitle = $_POST['gradeTitle'];
    $stmt = "SELECT * FROM students WHERE userID='".$_SESSION['userID']."'";
    $row = $conn->query($stmt)->fetch_object();
    $studentID = $row->studentID;
    $studentName = $row->firstName;     
    $sql =  "SELECT courseID FROM courses WHERE courseName='".$_POST['courseName']."'";
    $courseID = $conn->query($sql);
    if (!$stmt = $conn->prepare("INSERT into complaints(studentID, courseID, gradeTitle, complaint, studentName) values(?, ?, ?, ?, ?);")) {
        echo "Prepare failed " . $conn->error;
    }
    if (!$stmt->bind_param("iisss", $studentID, $courseID, $gradeTitle, $complaint, $studentName)) {
        echo "Bind failed " . $conn->error;
    }
    if (!$stmt->execute()) {
        echo "Execute fail " . $conn->error;
    }else{
        header("Location: /pages/studentlanding.php");
        echo "Success";
    }

    
}