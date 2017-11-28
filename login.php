<?php
session_start();
session_destroy();
require_once "Constants.php";

$form = array();
if (isset($_SESSION[DATABEAN])) {
    $form = $_SESSION[DATABEAN];
}

$errormsg = "";
if (isset($form["errormsg"])) {
    $errormsg = $form["errormsg"];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
		
<div class="msg"><?php echo $errormsg;?></div>
<form class="loginform" id="loginform" action="LoginServer.php" method="POST" >
    <div class="vid-container">
        <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop src="video/Beach.mp4" type="video/mp4">
        </video>
        <div class="inner-container">
            <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop src="video/Beach.mp4" type="video/mp4">
            </video>
            <div class="box">
                <h1>Login</h1>
                <input id="UBox" type="text" placeholder="Username" name="username"/>
                <input id="PBox" type="text" placeholder="Password" name="password"/>
                <button id="action" name="action" type="submit">Login</button>
                <p>Not a member? <span id="signup">Sign Up</span></p>
            </div>
        </div>
    </div>
</form>


</body>
</html>

