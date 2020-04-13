<?php
class login extends database
{


    public function authenticate($username, $password)
    {
        $hashed_password = md5($password);
        $query = "SELECT password FROM users WHERE userName='" . $username . ";";
        $result = $this->connect()->query($query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($result->num_rows == 0) {
            echo "No records founds";
        } else {
            while ($data = $result->fetch(MYSQLI_BOTH)) {
                if ($data['password'] == $password) {
                    $user_Id = $data['idUsers'];
                    header("Location: /pages/studentlanding.html");
                }
            }
        }
    }
}
