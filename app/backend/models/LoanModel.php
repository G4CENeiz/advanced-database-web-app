<?php

class LoanModel {
    private $table = 'Loan';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function addNewLoan($bookID) {
        $patronid = (int)$_SESSION['user']['PatronId'];
        // var_dump($_SESSION['user']['PatronId']);
        $query = "INSERT INTO Fine (DueDate) VALUES (NULL)";
        $this->database->query($query);
        $this->database->execute();
        $fineid = $this->database->lastInsertId();
        // var_dump($fineid);
        $fineid = (int)$fineid;
        $query = "INSERT INTO {$this->table} (BookId, PatronId, FineId, DueDate, ReturnDate) VALUES (:bookid, :patronid, :fineid, NULL, NULL)";
        $this->database->query($query);
        $this->database->bind('bookid', $bookID);
        $this->database->bind('patronid', $patronid);
        $this->database->bind('fineid', $fineid);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function approveLoan($loanID, $dueDate) {
        $query = "UPDATE {$this->table} SET DueDate = :duedate WHERE LoanId = :loanid";
        $this->database->query($query);
        $this->database->bind('duedate', $loanID);
        $this->database->bind('loanid', $dueDate);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function getPendingLoan() {
        $query = "SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'Loan Due Date', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'Fine Due Date' 
        FROM [dbo].[Loan] AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        JOIN [dbo].[Patron] AS p
            ON l.PatronId = p.PatronId
        JOIN [dbo].[Book] AS b
            ON l.BookId = b.BookId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate = NULL";
        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function getActiveLoan() {
        $query = "SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'Loan Due Date', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'Fine Due Date' 
        FROM [dbo].[Loan] AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        JOIN [dbo].[Patron] AS p
            ON l.PatronId = p.PatronId
        JOIN [dbo].[Book] AS b
            ON l.BookId = b.BookId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate > GETDATE()";
        $this->database->query($query);
        return $this->database->resultSet();
    }
    
    public function getOverDueLoan() {
        $query = "SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'Loan Due Date', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'Fine Due Date' 
        FROM [dbo].[Loan] AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        JOIN [dbo].[Patron] AS p
            ON l.PatronId = p.PatronId
        JOIN [dbo].[Book] AS b
            ON l.BookId = b.BookId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate <= GETDATE()";
        $this->database->query($query);
        return $this->database->resultSet();
    }
    
    public function getReturnedLoan() {
        $query = "  SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.ReturnDate, f.Amount, f.PaymentStatus 
                    FROM [dbo].[Loan] AS l
                    JOIN [dbo].[Fine] AS f 
                        ON l.FineId = f.FineId
                    JOIN [dbo].[Patron] AS p
                        ON l.PatronId = p.PatronId
                    JOIN [dbo].[Book] AS b
                        ON l.BookId = b.BookId
                    WHERE f.PaymentStatus = 'PAID'";
        $this->database->query($query);
        return $this->database->resultSet();
    }
}