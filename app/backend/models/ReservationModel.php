<?php

class ReservationModel {
    private $table = 'Reservation';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }
}