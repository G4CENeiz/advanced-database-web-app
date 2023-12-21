<?php

class FineModel {
    private $table = 'Fine';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function addNewFine() {
        $query = "INSERT INTO {$this->table} (DueDate) VALUES (NULL)";
        $this->database->query($query);
        $this->database->execute();
        return $this->database->rowCount();
    }
}