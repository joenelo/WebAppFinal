<?php
session_start();
if (!isset ($_SESSION["thingData"])) {
    $_SESSION["thingData"] = array();
}
// If the thing is in the array, don't add it.
//if(in_array($_POST["thingData"], $_SESSION["thingData"])) {
//    echo json_encode($_SESSION["thingData"]);
//}
// If the thing isn't in the array, add it.
//else {
    array_push($_SESSION["thingData"], $_POST["thingData"]);
    echo json_encode($_SESSION["thingData"]);
//}
?>