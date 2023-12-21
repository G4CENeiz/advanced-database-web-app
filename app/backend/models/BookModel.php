<?php

class BookModel {
    private $table = 'Book';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function getAllBooks() {
        $query = "  SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal FROM $this->table";
        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function delete($bookID) {
        $query = "DELETE FROM $this->table WHERE BookID=:bookID";
        $this->database->query($query);
        $this->database->bind('bookID', $bookID);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function addBook($data) {
        $query = "  INSERT INTO $this->table VALUES (
                        :isbn, 
                        :title, 
                        :author, 
                        :genre, 
                        :publicationYear, 
                        :quantity1, 
                        :quantity2
                    )";
        $this->database->query($query);
        $this->database->bind('isbn', $data['isbn']);
        $this->database->bind('title', $data['title']);
        $this->database->bind('author', $data['author']);
        $this->database->bind('genre', $data['genre']);
        $this->database->bind('publicationYear', $data['publicationYear']);
        $this->database->bind('quantity1', $data['quantity']);
        $this->database->bind('quantity2', $data['quantity']);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function getBookById($bookID) {
        $query = "  SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal 
                    FROM $this->table WHERE BookID=:bookID";
        $this->database->query($query);
        $this->database->bind('bookID', $bookID);
        return $this->database->single();
    }

    public function editBook($data) {
        $query = "  UPDATE {$this->table} SET 
                    ISBN = :isbn, 
                    Title = :title,
                    Author = :author,
                    Genre = :genre,
                    PublicationYear = :publicationYear,
                    QuantityAvailable = :quantity1,
                    QuantityTotal = :quantity2
                    WHERE BookID = :id";
        $this->database->query($query);
        $this->database->bind('isbn', $data['isbn']);
        $this->database->bind('title', $data['title']);
        $this->database->bind('author', $data['author']);
        $this->database->bind('genre', $data['genre']);
        $this->database->bind('publicationYear', $data['publicationYear']);
        $this->database->bind('quantity1', $data['quantity']);
        $this->database->bind('quantity2', $data['quantity']);
        $this->database->bind('id', $data['id']);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function searchBook() {
        $keyword = $_POST['keyword'];
        $column = $_POST['column'];
        $query = "  SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal 
                    FROM $this->table 
                    WHERE $column LIKE :keyword";
        $this->database->query($query);
        $this->database->bind('keyword', "%$keyword%");
        return $this->database->resultSet();
    }

    public function borrowBook($bookID) {
        $query = "SELECT QuantityAvailable FROM {$this->table} WHERE BookID = :bookid";
        $this->database->query($query);
        $this->database->bind('bookid', $bookID);
        $initialQuantity = $this->database->single();
        $quantity = $initialQuantity['QuantityAvailable'] - 1;
        $query = "UPDATE {$this->table} SET QuantityAvailable = :quantity WHERE BookID = :bookid";
        $this->database->query($query);
        $this->database->bind('quantity', $quantity);
        $this->database->bind('bookid', $bookID);
        $this->database->execute();
        return $this->database->rowCount();
    }
}