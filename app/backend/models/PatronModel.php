<?php

class PatronModel {
    private $table = 'Patron';
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

    public function getAllPatrons() {
        $query = "  SELECT * FROM $this->table";
        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function addPatron($data) {
        $query = "  INSERT INTO $this->table VALUES (
                        :username, 
                        :pass, 
                        :fname, 
                        :lname, 
                        :mail, 
                        :phone
                    )";
        $this->database->query($query);
        $this->database->bind('username', $data['username']);
        $this->database->bind('pass', $data['password']);
        $this->database->bind('fname', $data['fname']);
        $this->database->bind('lname', $data['lname']);
        $this->database->bind('mail', $data['email']);
        $this->database->bind('phone', $data['phonenumber']);
        $this->database->execute();
        return $this->database->rowCount();
    }
}
