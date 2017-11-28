<?php

class AbstractLogin {
    public function GetUser ($username, $password) {

        echo "AbstractLogin.GetUser"."<br>";
        return null;
    }
}

class Login extends AbstractLogin {

    public function GetUser ($username, $password)
    {

        echo "Login.GetUser" . "<br>";
        $user = parent:: GetUser($username, $password);

        $output = array();

        if ($user == null || !isset($user) || sizeof($user) == 0) {
            // Add admin to session.
            $_SESSION["user"] = "ADMINISTRATOR";

            $role = array();
            $role["rolename"] = "ADMINISTRATOR";
            $roles = array();
            array_push($roles, $role);
            $output["username"] = $username;
            $output["roles"] = $roles;
        } else {
            return $user;
        }
        return $output;
    }
}


$login = new login();
$user = $login->GetUser("username", "password");
echo "output of function call->".$user."*";
