<?php

class FineModel {
    private $table = 'Fine';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }
}