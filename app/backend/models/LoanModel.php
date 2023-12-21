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

    public function approveLoan($loanID, $period) {
        $period = (int)$period;
        $query = "UPDATE {$this->table} SET 
        LoanDate = GETDATE(),
        DueDate = DATEADD(DAY, :term, GETDATE()) 
        WHERE LoanId = :loanid";
        $this->database->query($query);
        $this->database->bind('term', $period);
        $this->database->bind('loanid', $loanID);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function denyLoan($loanid) {
        $query = "SELECT BookId FROM {$this->table} WHERE LoanId=:loanid";
        $this->database->query($query);
        $this->database->bind('loanid', $loanid);
        $bookId = (int)$this->database->single()['BookId'];
        $query = "DELETE FROM {$this->table} WHERE LoanId=:loanid";
        $this->database->query($query);
        $this->database->bind('loanid', $loanid);
        $this->database->execute();
        return $bookId;
    }

    public function setReturnDate() {
        $query = "UPDATE {$this->table} SET ReturnDate=GETDATE()";
        $this->database->query($query);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function getFineIdByLoanId($loanid) {
        $query = "SELECT FineId FROM {$this->table} WHERE LoanId=:loanid";
        $this->database->query($query);
        $this->database->bind('loanid', $loanid);
        return (int)$this->database->single()['FineId'];
    }

    public function getBookIdByLoanId($loanid) {
        $query = "SELECT BookId FROM {$this->table} WHERE LoanId=:loanid";
        $this->database->query($query);
        $this->database->bind('loanid', $loanid);
        return (int)$this->database->single()['BookId'];
    }

    public function getPendingLoan() {
        $query = "SELECT l.LoanId, p.PatronId, b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'LoanDueDate', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'FineDueDate' 
        FROM {$this->table} AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        JOIN [dbo].[Patron] AS p
            ON l.PatronId = p.PatronId
        JOIN [dbo].[Book] AS b
            ON l.BookId = b.BookId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate IS NULL";
        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function getActiveLoan() {
        $query = "SELECT l.LoanId, p.PatronId, b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'LoanDueDate', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'FineDueDate' 
        FROM {$this->table} AS l
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
        $query = "SELECT l.LoanId, p.PatronId, b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'LoanDueDate', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'FineDueDate' 
        FROM {$this->table} AS l
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
        $query = "  SELECT l.LoanId, p.PatronId, b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.ReturnDate, f.Amount, f.PaymentStatus 
                    FROM {$this->table} AS l
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