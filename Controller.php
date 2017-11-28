<?php
require_once "IModel.php";
require_once "Constants.php";

 class Controller {

     public function Controller () {


    }

    public function ProcessData ($model) {

        if ($model->Validate()) {

            $model->Process();
        }
        return $model->GetForm();
    }


 }



?>