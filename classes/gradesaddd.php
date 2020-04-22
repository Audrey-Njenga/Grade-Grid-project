<?php
include "../classes/database.php";

if(isset($_POST['enter'])){
    header("Location: /pages/uploadgrades.php");
}

function getData($cohort){
    $names = [];
    $query = "SELECT * FROM students WHERE cohortID=$cohort";
    $result = $conn->query($query);
    while ($obj = mysqli_fetch_object($result)){
        $firstName = $obj->firstName;
        $lastName = $obj->lastName;
        $fullName = $firstName." ".$lastName;
        $names[] =$fullName;
    }
    mysqli_close($conn);
    return $names;
}

function getNames(){
    $str = "";
    $cohort = $_POST['cohort'];
    $names = getData($cohort);
    foreach($names as $name){
        echo $str.='<option value="'.$name.'">'.$name.'</option>';
    }
}
