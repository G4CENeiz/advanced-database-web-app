<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../backend/views/' . $view . '.php';
    }
}