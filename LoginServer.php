<?php
session_start();
require_once "Constants.php";
require_once "LoginModel.php";
require_once "Controller.php";
require_once "Dashboard.php";

$form = array();

foreach($_POST as $key =>$value) {
    $form[$key]= prepareInput($value);
}

echo json_encode($form);


$model =  new LoginModel($form);
$controller = new Controller();
$form = $controller->ProcessData($model);

$_SESSION[DATABEAN] = $model->GetForm();

$nextpage = $model->GetFormData(NAVIGATE);
header ("Location: ".$nextpage);

/**
 * Strips characters from input.
 *
 */
function prepareInput($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>