<?php

require "../classes/database.php";

if (isset($_POST['login'])){
    $password = $_POST['password'];
    $username = $_POST['user_name'];
    $hashed_password = md5($password);
    $query = "SELECT * FROM users WHERE userName='".$username."';" or die($conn->error);
    $result = $conn->query($query);
    $row = $result->fetch_array();
    if ($result->num_rows == 0) {
        echo "Incorrect Username";
    } else {
        if ($hashed_password == $row['password']){
            if ($row['userAccessID'] == 2){
                session_start();
                $_SESSION['userID'] = $row['userID'];
                header("Location: /pages/facilitatorlanding.php");
            }
            else{
                session_start();
                $_SESSION['userID'] = $row['userID'];
                header("Location: /pages/studentlanding.php");
            }
            
        }else{
            echo "Incorrect password";
        }
        
    }

    
    
}



?>