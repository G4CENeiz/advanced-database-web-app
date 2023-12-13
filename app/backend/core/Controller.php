<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../backend/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../backend/models/' . $model . '.php';
        return new $model;
    }
}