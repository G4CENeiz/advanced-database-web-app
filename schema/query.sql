-- BookModel
SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal FROM [dbo].[Book];

DELETE FROM [dbo].[Book] WHERE BookID=1;

INSERT INTO [dbo].[Book] VALUES (
                        ':isbn', 
                        ':title', 
                        ':author', 
                        ':genre', 
                        ':publicationYear', 
                        ':quantity1', 
                        ':quantity2'
                    );

SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal 
FROM [dbo].[Book] WHERE BookID=':bookID';

UPDATE [dbo].[Book] SET 
                    ISBN = ':isbn', 
                    Title = ':title',
                    Author = ':author',
                    Genre = ':genre',
                    PublicationYear = ':publicationYear',
                    QuantityAvailable = ':quantity1',
                    QuantityTotal = ':quantity2'
                    WHERE BookID = ':id';

SELECT BookID, ISBN, Title, Author, Genre, YEAR(PublicationYear) as PublicationYear, QuantityAvailable, QuantityTotal 
                    FROM [dbo].[Book] 
                    WHERE $column LIKE ':keyword'

-- Patron Model
SELECT * FROM [dbo].[Patron] WHERE [Username]=':Username';

SELECT * FROM [dbo].[Patron];

INSERT INTO [dbo].[Patron] VALUES (
                        ':username', 
                        ':pass', 
                        ':fname', 
                        ':lname', 
                        ':mail', 
                        ':phone'
                    )

-- Staff Model
SELECT * FROM [dbo].[Staff] WHERE [Username]=':Username';

-- Loan Model
-- Insert into Fine table
INSERT INTO [dbo].[Fine] (DueDate)
VALUES (NULL);

SELECT SCOPE_IDENTITY() AS FineId;

-- Retrieve the generated FineId
DECLARE @newFineId INT = SCOPE_IDENTITY();

-- Insert into Loan table using the retrieved FineId
INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, DueDate, ReturnDate)
VALUES (':bookid', ':patronid', @newFineId, NULL, NULL);

UPDATE [dbo].[Loan] SET 
                    LoanDate=':today',
                    DueDate=':duedate'
                    WHERE LoanId=':loanid';

SELECT * FROM [dbo].[Book] WHERE BookID = 3002;

UPDATE [dbo].[Book] SET QuantityAvailable = 19 WHERE BookID = 3002;

DELETE FROM [dbo].[Fine];

SELECT * FROM [dbo].[Loan];

SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.DueDate AS 'Loan Due Date', l.ReturnDate, f.Amount, f.PaymentStatus, f.DueDate AS 'Fine Due Date' 
FROM [dbo].[Loan] AS l
JOIN [dbo].[Fine] AS f 
    ON l.FineId = f.FineId
JOIN [dbo].[Patron] AS p
    ON l.PatronId = p.PatronId
JOIN [dbo].[Book] AS b
    ON l.BookId = b.BookId
WHERE f.PaymentStatus = 'PAID';


SELECT b.Title, b.Author, b.ISBN, p.FirstName, p.LastName, l.LoanDate, l.ReturnDate, f.Amount, f.PaymentStatus 
        FROM [dbo].[Loan] AS l
        JOIN [dbo].[Fine] AS f 
            ON l.FineId = f.FineId
        JOIN [dbo].[Patron] AS p
            ON l.PatronId = p.PatronId
        JOIN [dbo].[Book] AS b
            ON l.BookId = b.BookId
        WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate <= GETDATE();

SELECT r.ReservationId, r.BookId, r.PatronId, r.ReservationDate, b.Title, b.Author, b.ISBN, b.Genre, b.PublicationYear, b.QuantityAvailable, b.QuantityTotal, p.FirstName, p.LastName
FROM [dbo].[Reservation] AS r
JOIN [dbo].[Book] AS b
    ON r.BookId = b.BookID
JOIN [dbo].[Patron] AS p
    ON r.PatronId = p.PatronId;

SELECT l.LoanId, f.FineId, l.LoanDate, l.DueDate, DATEDIFF(DAY, l.DueDate, GETDATE()) * 500.00 AS Fines
FROM [dbo].[Loan] AS l
JOIN [dbo].[Fine] AS f 
    ON l.FineId = f.FineId
WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate <= GETDATE();

UPDATE [dbo].[Fine] SET Amount = :amount WHERE FineId = :fineId

SELECT * FROM (
    SELECT l.LoanId, p.PatronId, f.FineId, l.LoanDate, l.DueDate
    FROM {$this->table} AS l
    JOIN [dbo].[Fine] AS f 
        ON l.FineId = f.FineId
    WHERE f.PaymentStatus = 'UNPAID' AND l.DueDate <= GETDATE()
)