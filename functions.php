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

function SignUp($first_name, $last_name, $user_name, $password){
    $hashed_password = md5($password);
    $query = "INSERT INTO users (firstName, lastName, username, userPassword)"."VALUES('$first_name', '$last_name', '$user_name', '$hashed_password')";
    $result = mysqli_query($GLOBALS['dbconn'], $query);
    if($result){
        echo "Successfully inserted";
    }else{
        echo "Unsuccessful".mysqli_error($GLOBALS['dbconn']);
    }
}

function login($user_name, $password){
    $savedPassword = "SELECT `userPassword` FROM users where `userName` = '$user_name'";
    $logresult = mysqli_query($GLOBALS['dbconn'], $savedPassword);  
    
    if ($logresult) {
        while ($row = mysqli_fetch_array($logresult)) {
            $savedPassword = $row["userPassword"];
        }
        if ($savedPassword == md5($password)) {
            header("Location: landing.html");
            exit();
        } else {
            echo "<p id ='error'>invalid password</p>";
        }
    }else{
        echo "Unsuccessful".mysqli_error($GLOBALS['dbconn']);
    }   

}