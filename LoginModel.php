<?php

require_once "AbstractModel.php";
require_once "IModel.php";
class LoginModel extends AbstractModel implements IModel {

    //---- VALIDATE USER INPUT DATE ----//
    public function LoginModel ($form){
        parent :: AbstractModel($form);
    }

    // Validate user input data //
    public function Validate () {

        // validation user input info....
         $bValid = true;
         $msg = "";
        if(!isset($this->form["username"]) || strlen($this->form["username"] ) == 0) {
            $bValid = false;
            $msg .= "Please enter a value for the username";

        }
        if(!isset($this->form["password"]) || strlen($this->form["password"] ) == 0) {
            if (strlen($msg) > 0){
                $msg .="<br>";
            }
            $msg .= "Please enter a value for the password";
            $bValid = false;
        }
        if (!$bValid) {
            $this->SetFormData(NAVIGATE, "dashboard.php");
            $this->SetFormData(NAVIGATE, "login.php");

        }

        $this->setFormData("errormsg", $msg);
        return $bValid;

    }


    //---- PROCESS BUSINESS LOGIC ----//
    public function Process() {

    $username = $this->GetFormData(USERNAME);
    $password = $this->GetFormData(PASSWORD);
    $user = $this->GetUser($username, $password);

        // ---- Check if user is logged in ---- //
        if (isset($user)){
            $this->SetFormData(MEMBERUSER, $user);
            $this->SetFormData(NAVIGATE, "dashboard.php");
        } else {
            $this->SetFormData(NAVIGATE, "login.php");
        }

    }

    public function GetUser ($formusername, $formpassword){
        return $this->GetUserLoginFromDBRefactor($this->getDBHost(), $this->getDBUserName(), $this->getDBPassword(),
                                          $this->getDBName(), $formusername, $formpassword);
    }

    
    // function to return the json object and validate that the user is
// in the database or not.
// if no user is found then will return nothing.
// $username is the database login
// $password is the database password
// $dbname is dbname
// $formusername is the username from that we want to validate against the database
// $formpassword is the password that we want to validate against the database
// this function uses password_verify($formpassword, $dbpasswordHash) to verify
// that the encrypted password is the same as the formpassword that the user
// is passing into this function.
    private function GetUserLoginFromDBRefactor ($dbhost, $username, $password, $dbname, $formusername, $formpassword)
    {

        $user = null;
        /* Makes a connection to the database */
        $link = mysqli_connect($dbhost, $username, $password, $dbname);

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }


        /* example of a secure parameterized query */
        $query = "select username,passwordhash,Name FROM userroles WHERE username = ?";


        $stmt = $link->prepare($query);
        /* binds the $formusername to the parameterized query in a secure way */
        $stmt->bind_param('s', $formusername);

        if ($stmt) {

            /* execute statement */
            mysqli_stmt_execute($stmt);
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $dbusername, $dbpasswordHash, $dbrolename);

            /* store results in named array */
            $user = null;
            $roles = array();

            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                // printf ("%s (%s)\n", $dbusername, $dbpasswordHash,$dbrolename);
                if (password_verify($formpassword, $dbpasswordHash))
                {
                    if (!isset($user))
                    {
                        $user = array();
                    }
                    $jsonrow = array();
                    $jsonrow["rolename"] = $dbrolename;
                    array_push($roles,$jsonrow);
                    $user["username"] = $dbusername;
                }
            }

            if (isset($user))
            {
                $user["roles"] = $roles;
            }

            /* close statement */
            mysqli_stmt_close($stmt);

            return $user;
        }
    }
    function IsUserRole ($user, $role)
    {
        if (!isset($user))
        {
            return false;
        }
        $key = array_search($role, array_column($user["roles"], 'rolename'));
        if (is_numeric($key) && $key >= 0)
        {
            return true;
        } else {
            return false;
        }
    }

}