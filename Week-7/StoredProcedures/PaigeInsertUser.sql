USE [mart461fall2021]
GO
/****** Object:  StoredProcedure [mart461fall2021].[PaigeInsertNewUser]    Script Date: 10/25/2021 7:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [mart461fall2021].[PaigeInsertNewUser] /*Use ALTER to alter a premade procedure*/
	@firstname as varchar(50),
	@lastname as varchar(50),
	@hiddenkey as varchar(50),
	@useremail as varchar(50)
AS
BEGIN
	SET NOCOUNT ON;

    INSERT INTO Paige_Login(FirstName, LastName, HiddenKey, UserEmail) 
    VALUES (@firstname, @lastname, @hiddenkey, @useremail)
END
