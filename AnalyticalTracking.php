<?php
session_start();
DEFINE ("MOUSEKEY", "mousekey");

$json = array();
$json["action"] = $_GET["action"];
$json["clientX"] = $_GET["clientX"];
$json["clientY"] = $_GET["clientY"];


$AnalyticalStorage = new AnalyticalStorage();
$sessionArray = $AnalyticalStorage->getArrayData();
array_push($sessionArray, $json);
if (isset($_GET["ACTION"])) {
    $AnalyticalStorage->setArrayData($sessionArray);
}
// TEST CASE CODE TO OUTPUT GROWING ARRAY

echo json_encode($AnalyticalStorage->getArrayData());

//===== class designed to track user activity on a webpage.  =====//
//===== include mousemove events and click events.           =====//
//===== include location information                         =====//
class AnalyticalStorage {


    // rests the data
    public function clearData () {
        $_SESSION[MOUSEKEY] = array();
    }

    //  function to get array data from session object.
    //  checks if the storage is there first.
    public function getArrayData () {

        // Initialization check
        if(!isset($_SESSION[MOUSEKEY])) {

            $_SESSION[MOUSEKEY]= array();

        }
        return $_SESSION[MOUSEKEY];
    }

    //==== sets array to our session storage for mouse click information ===//
    public function setArrayData($arrData) {
        $_SESSION[MOUSEKEY] = $arrData;

    }

}

