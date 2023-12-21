<?php

class StaffModel {
    private $table = 'Staff';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function login($input) {
        $query = "SELECT * FROM $this->table WHERE [Username]=:Username";
        $this->database->query($query);
        $this->database->bind('Username', $input['username']);
        $data = $this->database->single();
        if (gettype($data) != 'array') {
            return false;
        }
        if ($data['Password'] == $input['password']) {
            $_SESSION['user'] = $data;
            return true;
        }
        return false;
    }
}
