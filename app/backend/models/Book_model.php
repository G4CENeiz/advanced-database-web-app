<?php

class Book_model {
    private $table = 'Book';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBooks() {
        $this->db->query('SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function delete($bookID) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE BookID=:bookID');
        $this->db->bind('bookID', $bookID);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addBook($data) {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (:isbn, :title, :author, :genre, :publicationYear, :quantity1, :quantity2)';
        $this->db->query($query);
        
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('publicationYear', $data['publicationYear']);
        $this->db->bind('quantity1', $data['quantity']);
        $this->db->bind('quantity2', $data['quantity']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getBookById($bookID) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE BookID=:bookID');
        $this->db->bind('bookID', $bookID);
        return $this->db->single();
    }

    public function editBook($data) {
        // var_dump($data);
        $query = "UPDATE {$this->table} SET 
                    ISBN = :isbn, 
                    Title = :title,
                    Author = :author,
                    Genre = :genre,
                    PublicationYear = :publicationYear,
                    QuantityAvailable = :quantity1,
                    QuantityTotal = :quantity2
                    WHERE BookID = :id";
        $this->db->query($query);
        
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('publicationYear', $data['publicationYear']);
        $this->db->bind('quantity1', $data['quantity']);
        $this->db->bind('quantity2', $data['quantity']);
        $this->db->bind('id', $data['id']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }
}