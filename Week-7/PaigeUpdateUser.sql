USE [mart461fall2021]
GO
/****** Object:  StoredProcedure [mart461fall2021].[PaigeUpdateUser]    Script Date: 10/25/2021 7:23:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [mart461fall2021].[PaigeUpdateUser]
	@firstName as varchar(50), @lastName as varchar(50), @hiddenkey as varchar(50), @useremail as varchar(50),
	@userid as int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    UPDATE Paige_Login 
	SET FirstName = @FirstName
   ,LastName = @LastName
   ,HiddenKey = @HiddenKey
   ,UserEmail = @UserEmail
   WHERE userid = @userid
END


GO
