<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="assets/images/alu_logo_original.png" alt="logo">
        </div>

        <div id="login">
            <form method="POST" action="index.php">
                <div class="formhead">
                    <h1 class="page-header" id="header"> GRADE GRID</h1>
                    <h4>LOGIN</h4>
                </div><br>
                <input class="form-control" type="text" name="user_name" required placeholder="username"> <br>
                <input class="form-control" type="password" name="password" required placeholder="password"> <br><br>
                <a href="">Forgot password?</a><br><br>
                <button class="btn btn-primary btn-block" type="submit">LOGIN</button><br>
                <input class="form-check-input" type="checkbox"> Remember me <br><br>
                <a href="signup.php">Don't have an account? Sign up</a>
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
} else {
}
?>