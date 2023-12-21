<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../backend/views/' . $view . '.php';
    }

    public function model($model) {
        require_once '../backend/models/' . $model . '.php';
        return new $model;
    }

    public function flasherRoute($subject, $message, $action, $type, $route) {
        Flasher::setFlash($subject, $message, $action, $type);
        header('Location: ' . BASEURL . "/$route");
        exit;
    }
}