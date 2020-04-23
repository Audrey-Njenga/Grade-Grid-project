<?php
include_once "database.php";
include_once "login.php";
function printGrade($courseName)
{
    global $conn;
    $queryOne = "SELECT * FROM courses WHERE courseName='" . $courseName . "';" or die($conn->error);
    $queryTwo = "SELECT * FROM students WHERE userID='" . $_SESSION['userID'] . "';" or die($conn->error);
    $courseID = $conn->query($queryOne)->fetch_object()->courseID;
    $studentID = $conn->query($queryTwo)->fetch_object()->studentID;

    if (!$stmt = $conn->prepare("SELECT * FROM grades WHERE studentID=? AND courseID=?")) {
        echo "Prepare failed " . $conn->error;
    }
    if (!$stmt->bind_param("ii", $studentID, $courseID)) {
        echo "Bind failed " . $conn->error;
    }
    if (!$stmt->execute()) {
        echo "Execute fail " . $conn->error;
    }

    $result = $stmt->get_result();
    return $result;
}