<?php

class LoginModel {
    private $table = "[dbo].[User]";
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function login($input) {
        $query = "  SELECT * FROM $this->table WHERE [Username]=:Username";
        $this->database->query($query);
        $this->database->bind('Username', $input['username']);
        $data = $this->database->single();
        if ($data['Password'] == $input['password']) {
            return true;
        }
        return false;
    }
}
