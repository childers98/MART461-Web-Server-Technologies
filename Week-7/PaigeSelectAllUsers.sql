USE [mart461fall2021]
GO
/****** Object:  StoredProcedure [mart461fall2021].[PaigeSelectAllUsers]    Script Date: 10/25/2021 7:20:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


CREATE PROCEDURE [mart461fall2021].[PaigeSelectAllUsers] 
	
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT FirstName + ' ' + LastName as FullName, HiddenKey, UserEmail userid FROM Paige_Login
END
