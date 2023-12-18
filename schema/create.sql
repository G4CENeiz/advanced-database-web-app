CREATE TABLE
    [dbo].[Book]
(
    [BookID]            INT             NOT NULL IDENTITY(1,1) PRIMARY KEY,
    [ISBN]              VARCHAR(13)     NOT NULL,
    [Title]             VARCHAR(255)    NOT NULL,
    [Author]            VARCHAR(150)    NOT NULL,
    [Genre]             VARCHAR(50)     NOT NULL,
    [PublicationYear]   DATE            NOT NULL,
    [QuantityAvailable] INT             NOT NULL,
    [QuantityTotal]     INT             NOT NULL
);

CREATE TABLE
    [dbo].[Loan]
(
    [LoanId]        INT     NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [BookId]        INT     NOT NULL,
    [PatronId]      INT     NOT NULL,
    [LoanDate]      DATE    NOT NULL DEFAULT GETDATE(),
    [DueDate]       DATE    NOT NULL,
    [ReturnDate]    DATE    NULL
);

CREATE TABLE
    [dbo].[Fine]
(
    [FineId]        INT             NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [PatronId]      INT             NOT NULL,
    [Amount]        DECIMAL(10,2)   NOT NULL,
    [PaymentStatus] VARCHAR(10)     NOT NULL,
    [DueDate]       DATE            NOT NULL
);

CREATE TABLE
    [dbo].[Reservation]
(
    [ReservationId]     INT     NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [BookId]            INT     NOT NULL,
    [PatronId]          INT     NOT NULL,
    [ReservationDate]   DATE    NOT NULL
);

CREATE TABLE
    [dbo].[Patron]
(
    [PatronId]      INT             NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [FirstName]     VARCHAR(100)    NOT NULL,
    [LastName]      VARCHAR(100)    NOT NULL,
    [Email]         VARCHAR(100)    NOT NULL,
    [PhoneNumber]   VARCHAR(100)    NOT NULL
);

CREATE TABLE
    [dbo].[Staff]
(
    [StaffId]           INT             NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [FirstName]         VARCHAR(100)    NOT NULL,
    [LastName]          VARCHAR(100)    NOT NULL,
    [Email]             VARCHAR(100)    NOT NULL,
    [PhoneNumber]       VARCHAR(100)    NOT NULL
);

CREATE TABLE
    [dbo].[User]
(
    [UserId]            INT             NOT NULL IDENTITY (1, 1) PRIMARY KEY,
    [Username]          VARCHAR(100)    NOT NULL,
    [Password]          VARCHAR(100)    NOT NULL,
    [StaffId]           INT NULL,
    [PatronId]          INT NULL
);


ALTER TABLE
    [dbo].[Loan] ADD CONSTRAINT [FK_Loan_Book]
    FOREIGN KEY ([BookId]) REFERENCES [dbo].[Book] ([BookId]);

ALTER TABLE
    [dbo].[Loan] ADD CONSTRAINT [FK_Loan_Patron]
    FOREIGN KEY ([PatronId]) REFERENCES [dbo].[Patron] ([PatronId]);

ALTER TABLE
    [dbo].[Fine] ADD CONSTRAINT [FK_Fine_Patron]
    FOREIGN KEY ([PatronId]) REFERENCES [dbo].[Patron] ([PatronId]);

ALTER TABLE
    [dbo].[Reservation] ADD CONSTRAINT [FK_Reservation_Book]
    FOREIGN KEY ([BookId]) REFERENCES [dbo].[Book] ([BookId]);

ALTER TABLE
    [dbo].[Reservation] ADD CONSTRAINT [FK_Reservation_Patron]
    FOREIGN KEY ([PatronId]) REFERENCES [dbo].[Patron] ([PatronId]);

ALTER TABLE
    [dbo].[User] ADD CONSTRAINT [FK_User_Staff]
    FOREIGN KEY ([StaffId]) REFERENCES [dbo].[Staff] ([StaffId]);

ALTER TABLE
    [dbo].[User] ADD CONSTRAINT [FK_User_Patron]
    FOREIGN KEY ([PatronId]) REFERENCES [dbo].[Patron] ([PatronId]);