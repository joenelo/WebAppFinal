<?php
require_once "LoginModel.php";
require_once "Constants.php";
// FIRST TEST CASE TO LOAD INI PROPERTY FILES FOR DB ACCESS
$form = array();
$model =  new LoginModel($form);
echo "LoginModel->getDBHost:" .$model->getDBHost()."<br>";
echo "LoginModel->getDBName:" .$model->getDBName()."<br>";
echo "LoginModel->getDBUserName:" .$model->getDBUserName()."<br>";
echo "LoginModel->getDBPassword:" .$model->getDBPassword()."<br>";


echo "Test Case 2 <br>";
echo "LoginModel->getUser() username:password<br>";
echo json_encode($model->getUser("username", "password"));
echo "<br>******************************************";
echo "LoginModel->getUser() username:password2<br>";
echo json_encode($model->getUser("username", "password2"));
echo "<br>******************************************";
echo "LoginModel->getUser() username2:password<br>";
echo json_encode($model->getUser("username2", "password"));
echo "<br>******************************************";

echo "Test Case 3 - Performance Test<br>";

$starttime = microtime(true);
for ($i=0; $i<1000; $i++){

    //echo "<BR><BR>LoginModel->getUser() username$i:password<BR>";
    $username = "username$i";
    $password = "password";
   //echo json_encode($model->getUser($username, $password));
}
$endtime = microtime(true);
$timediff = $endtime = $starttime;

echo $timediff;

echo "<br><br><br>";

echo "Test User roles";

$user = $model->getUser("username", "password");

$bIsAdmin = $model->IsUserRole($user, "ADMINISTRATOR");
echo "Is the User ADMINISTRATOR:".$bIsAdmin."<br>";

$bIsUser = $model->IsUserRole($user, "USER");
echo "Is the User USER:".$bIsUser."<br>";

$bIsGuest = $model->IsUserRole($user, "GUEST");
echo "Is the User GUEST:".$bIsGuest."<br>";

echo "<br>IP ADDRESS INFORMATION ABOUT VISITORS<br>";
echo "REMOTE_ADDR->".$_SERVER["REMOTE_ADDR"];
echo "<br>";
echo "X_FORWARDED_FOR->".$_SERVER["HTTP_X_FORWARDED"]."<BR>";
echo "HTTP_CLIENT_IP->".$_SERVER["HTTP_CLIENT_IP"]."<BR>";

echo "Testing hit counter functionality <br>";
$stats = array();
echo "<br>";
echo "<br>";

//get ip address from server and store it in a variable
$ip = $_SERVER["REMOTE_ADDR"];
$ip = "64.251.78.29" ;
// decode json and store it in details
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

array_push($stats, $details);
$file = fopen("stats.json", "w");
fwrite($file, json_encode($stats));
fclose($file);

$json = json_decode(file_get_contents("stats.json"));
echo json_encode($json);


echo $details->city;

?>
