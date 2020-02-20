<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="logo">
        </div>

        <div id="login" class="container-fluid">
            <form method="POST" action="signup.php">
                <h3>Sign up </h3>
                <label>First name:</label>
                <input type="text" name="first_name" required> <br>
                <label>Last name:</label>
                <input type="text" name="last_name" required> <br>
                <label>Username:</label>
                <input type="text" name="user_name" required> <br>
                <label>Password:</label>
                <input type="password" name="password" required> <br>
                <label>Confirm password:</label>
                <input type="password" name="confirm_password" required> <br>
                <input type="submit"></input><br><br>
                <button><a href="login.php">Login</a></button>

                <?php
                if (isset($_POST['submit'])) {
                    echo "Hello World";
                }
                ?>
            </form>
        </div>
    </div>
</body>

<?php
include('functions.php');

if (
    isset($_POST['first_name']) && isset($_POST['last_name'])
    && isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['confirm_password'])
) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];
    if ($password == $confirm_pass) {
        SignUp($first_name, $last_name, $user_name, $password, $confirm_pass);
    } else {
        echo "The passwords do not match";
    }
}

?>

</html>