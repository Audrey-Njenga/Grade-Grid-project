<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="assets/images/alu_logo_original.png" alt="logo">
        </div>

        <div id="login">
            <form method="POST" action="signup.php">
                <h1 id="header"> GRADE GRID </h1>
                <h4>SIGN UP </h4>
                <input class="form-control" type="text" name="first_name" required placeholder="first name"> <br>
                <input class="form-control" type="text" name="last_name" required placeholder="last name"> <br>
                <input class="form-control" type="text" name="email" required placeholder="email"> <br>
                <input class="form-control" type="password" name="password" required placeholder="password"> <br>
                <input class="form-control" id="confirm" type="password" name="confirm_password" required placeholder="confirm password"> <br>
                <button class="btn btn-primary btn-block" type="submit">Submit</button><br><br>
                <a href="index.php">Login</a>

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

// calls sign up function if all fields are set and the passwords match
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