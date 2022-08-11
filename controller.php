<?php

class controller
{
    public function model($model)
    {
        require_once '../model/customersModel.php' . $model . '.php';
        return new $model;
    }
}
