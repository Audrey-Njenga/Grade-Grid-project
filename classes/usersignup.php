<?php

class signUp
{   
    private $password;
    private $user_name;

    public function __construct($password, $user_name)
    {
        $this->password = $password;
        $this->user_name = $user_name;
    }

    private function SignUp($first_name, $last_name, $user_name, $password)
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
}
