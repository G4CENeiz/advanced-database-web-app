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

-- Retrieve the generated FineId
DECLARE @newFineId INT = SCOPE_IDENTITY();

-- Insert into Loan table using the retrieved FineId
INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, DueDate, ReturnDate)
VALUES (':bookid', ':patronid', @newFineId, NULL, NULL);

UPDATE [dbo].[Loan] SET 
                    LoanDate=':today',
                    DueDate=':duedate'
                    WHERE LoanId=':loanid';