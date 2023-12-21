-- Insert Books
INSERT INTO [Book] (ISBN, Title, Author, Genre, PublicationYear, QuantityAvailable, QuantityTotal)
VALUES  ('9781234567890', 'The Quantum Enigma', 'Olivia Sterling', 'Science Fiction', '2019', '48', '48'),
        ('9782345678901', 'Echoes of Eternity', 'Xavier Eclipse', 'Fantasy', '2017', '36', '36'),
        ('9783456789012', 'Cipher of Shadows', 'Seraphina Nightshade', 'Mystery', '2018', '36', '36');

-- Insert Staff Credentials
INSERT INTO [Staff] ([Username], [Password], [FirstName], [LastName], [Email], [PhoneNumber])
VALUES ('admin', 'admin123', 'Admin', 'Admin', 'admin@local.com', '082243216789');

DECLARE @usedBookId INT;
DECLARE @usedUserId INT;
DECLARE @newFineId INT;

-- Insert Patron Credentials
INSERT INTO [Patron] ([Username], [Password], [FirstName], [LastName], [Email], [PhoneNumber])
VALUES ('patron', 'password', 'Fname fname', 'Lname', 'fname@mail.com', '082212345678');

SET @usedUserId = SCOPE_IDENTITY();

-- Insert Loan with loaned book
INSERT INTO [Book] (ISBN, Title, Author, Genre, PublicationYear, QuantityAvailable, QuantityTotal)
VALUES  ('9784567890123', 'Serenade in Scarlet', 'Damien Crimson', 'Romance', '2016', '29', '30');

SET @usedBookId = SCOPE_IDENTITY();

-- Pending
INSERT INTO [dbo].[Fine] (DueDate)
VALUES (NULL);

SET @newFineId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, DueDate, ReturnDate)
VALUES (@usedBookId, @usedUserId, @newFineId, NULL, NULL);

-- Active
INSERT INTO [Book] (ISBN, Title, Author, Genre, PublicationYear, QuantityAvailable, QuantityTotal)
VALUES  ('9785678901234', 'Whispers of the Cosmos', 'Luna Stardust', 'Poetry', '2021', '35', '36');

SET @usedBookId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Fine] (DueDate)
VALUES (NULL);

SET @newFineId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, DueDate, ReturnDate)
VALUES (@usedBookId, @usedUserId, @newFineId, DATEADD(DAY, 7, GETDATE()), NULL);

-- Overdue
INSERT INTO [Book] (ISBN, Title, Author, Genre, PublicationYear, QuantityAvailable, QuantityTotal)
VALUES  ('9786789012345', 'Chronicles of Nebula', 'Atlas Celestial', 'Adventure', '2020', '29', '30');

SET @usedBookId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Fine] (DueDate)
VALUES (NULL);

SET @newFineId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, LoanDate, DueDate, ReturnDate)
VALUES (@usedBookId, @usedUserId, @newFineId, DATEADD(DAY, -7, GETDATE()), DATEADD(DAY, -2, GETDATE()), NULL);

INSERT INTO [dbo].[Reservation]
VALUES (@usedBookId, @usedUserId, GETDATE());

-- Returned
INSERT INTO [Book] (ISBN, Title, Author, Genre, PublicationYear, QuantityAvailable, QuantityTotal)
VALUES  ('9787890123456', 'Gastronomic Tales', 'Culina Gourmet', 'Culinary', '2015', '24', '24');

SET @usedBookId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Fine] (Amount, PaymentStatus, DueDate)
VALUES (0, 'PAID', DATEADD(DAY, -3, GETDATE()));

SET @newFineId = SCOPE_IDENTITY();

INSERT INTO [dbo].[Loan] (BookId, PatronId, FineId, LoanDate, DueDate, ReturnDate)
VALUES (@usedBookId, @usedUserId, @newFineId, DATEADD(DAY, -10, GETDATE()), DATEADD(DAY, -5, GETDATE()), DATEADD(DAY, -3, GETDATE()));

INSERT INTO [dbo].[Reservation]
VALUES (@usedBookId, @usedUserId, DATEADD(DAY, 7, GETDATE()));