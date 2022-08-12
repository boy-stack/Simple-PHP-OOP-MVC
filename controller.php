<?php

class controller
{
    public function model($model)
    {
        require_once '../model/benmodel.php' . $model . '.php';
        return new $model;
    }
}
