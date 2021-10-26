USE [mart461fall2021]
GO
/****** Object:  StoredProcedure [mart461fall2021].[PaigeDeleteUser]    Script Date: 10/25/2021 7:23:15 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


CREATE PROCEDURE [mart461fall2021].[PaigeDeleteUser]
	-- Parameters for the stored procedure
	@userid as int

AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	DELETE FROM Paige_Login WHERE userid = @userid
END
