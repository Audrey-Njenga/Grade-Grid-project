<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <title>Grade Grid</title>
</head>

<body>
    <div class="main">
        <div class="logo">
            <img src="assets/images/alu_logo_original.png" alt="logo">
        </div>

        <div id="login">
            <form method="POST" action="signup.php">
                <img src="assets/images/grid.png" alt="grade grid" id="grade"><img>
                <h2>Sign Up</h2>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email Address</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Password</span>
                    </div>
                    <input type="password" class="form-control">
                </div>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Confirm password</span>
                    </div>
                    <input type="password" class="form-control">
                </div>

                <button class="btn btn-primary btn-block" type="submit">Create Account</button><br><br>
                <a href="index.php" id="gologin">Go to login</a>

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
include('includes/functions.php');

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