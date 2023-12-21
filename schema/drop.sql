-- drop all foreign keys
DROP INDEX IF EXISTS [dbo].[FK_Loan_Book];
DROP INDEX IF EXISTS [dbo].[FK_Loan_Patron];
DROP INDEX IF EXISTS [dbo].[FK_Loan_Fine];
DROP INDEX IF EXISTS [dbo].[FK_Reservation_Book];
DROP INDEX IF EXISTS [dbo].[FK_Reservation_Patron];

-- drop all tables
DROP TABLE IF EXISTS [dbo].[Book];
DROP TABLE IF EXISTS [dbo].[Patron];
DROP TABLE IF EXISTS [dbo].[Loan];
DROP TABLE IF EXISTS [dbo].[Fine];
DROP TABLE IF EXISTS [dbo].[Reservation];
DROP TABLE IF EXISTS [dbo].[Staff];