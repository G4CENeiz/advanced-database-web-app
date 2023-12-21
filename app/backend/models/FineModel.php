<?php

class FineModel {
    private $table = 'Fine';
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function assessFine() {
        $query = "SELECT l.LoanId, f.FineId, l.LoanDate, l.DueDate, DATEDIFF(DAY, l.DueDate, GETDATE()) * 500.00 AS Fines
        FROM [dbo].[Loan] AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate <= GETDATE()";
        $this->database->query($query);
        $overdueLoans = $this->database->resultSet();
        foreach ($overdueLoans as $loan) {
            $query = "UPDATE [dbo].[Fine] SET Amount = :amount WHERE FineId = :fineId";
            $this->database->query($query);
            $this->database->bind('amount', $loan['Fines']);
            $this->database->bind('fineId', $loan['FineId']);
            $this->database->execute();
        }
    }

    public function payFine($fineid) {
        $query = "UPDATE {$this->table} SET PaymentStatus='PAID' WHERE FineId=:fineid";
        $this->database->query($query);
        $this->database->bind('fineid', $fineid);
        $this->database->execute();
        return $this->database->rowCount();
    }
}