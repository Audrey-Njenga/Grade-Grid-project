<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="assets/images/alu_logo_original.png" alt="logo">
        </div>
        
        <div id="login" >            
            <form method="POST" action="login.php">
                <h1 id ="header"> Grade Grid </h1>
                <h4>Login</h4>
                <label>Username:</label>
                <input type="text" name="user_name" required> <br>
                <label>Password:</label>
                <input type="password" name="password" required> <br><br>
                <input type="submit"></input><br><br>
                <button><a href="signup.php">Sign up</a></button>
                <button><a href="">Forgot my password</a></button>
            </form>
        </div>
    </div>
</body>

<?php
include('functions.php');

if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    login($user_name, $password);
} else{
    
}
?>