<?php

class ReservationModel {
    private $table = 'Reservation';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function reserveBook($bookId) {
        $patronId = (int)$_SESSION['user']['PatronId'];
        $query = "INSERT INTO {$this->table} VALUES (:bookId, :patronId)";
        $this->database->query($query);
        $this->database->bind('bookId', $bookId);
        $this->database->bind('patronId', $patronId);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function getAllReservation() {
        $query = "SELECT r.ReservationId, r.BookId, r.PatronId, r.ReservationDate, b.Title, b.Author, b.ISBN, b.Genre, b.PublicationYear, b.QuantityAvailable, b.QuantityTotal, p.FirstName, p.LastName
        FROM [dbo].[Reservation] AS r
        JOIN [dbo].[Book] AS b
            ON r.BookId = b.BookID
        JOIN [dbo].[Patron] AS p
            ON r.PatronId = p.PatronId";
        $this->database->query($query);
        return $this->database->resultSet();
    }
}