USE [HCL]
GO

/****** Object:  Table [dbo].[addresstypes]    Script Date: 9/23/2021 3:57:48 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[addresstypes](
	[addresstypeid] [int] IDENTITY(1,1) NOT NULL,
	[addresstype] [varchar](50) NULL
) ON [PRIMARY]
GO

