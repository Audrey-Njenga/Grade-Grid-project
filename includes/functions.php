<?php
require 'db.php';
function whoAmI($first_name, $last_name, $user_name, $password, $confirm_password)
{
    $hashed_password = md5($password);
    echo $first_name . "<br>";
    echo $last_name . "<br>";
    echo $user_name . "<br>";
    echo $password . "<br>";
    echo $confirm_password . "<br>";
    echo $hashed_password . "<br>";

    echo "The user is called " . $first_name . " " . $last_name . " . Their user name is " . $user_name .
        " and their password is " . $password . " . ";
}

function SignUp($first_name, $last_name, $user_name, $password)
{
    $hashed_password = md5($password);
    $query = "INSERT INTO users (firstName, lastName, username, userPassword)" . "VALUES('$first_name', '$last_name', '$user_name', '$hashed_password')";
    $result = mysqli_query($GLOBALS['dbconn'], $query);
    if ($result) {
        echo "Successfully inserted";
    } else {
        echo "Unsuccessful" . mysqli_error($GLOBALS['dbconn']);
    }
}


function login($user_name, $password)
{

    $hashed_password = md5($password);
    $query = "SELECT firstName,lastName FROM users WHERE userName='" . $user_name . "' AND $password ='" . $hashed_password . "';";
    $result = mysqli_query($dbconn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    print_r($row);
}
