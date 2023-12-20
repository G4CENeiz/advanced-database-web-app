<?php

class LoanModel {
    private $table = 'Loan';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }
}