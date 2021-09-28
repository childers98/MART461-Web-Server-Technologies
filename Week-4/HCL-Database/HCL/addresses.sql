USE [HCL]
GO

/****** Object:  Table [dbo].[addresses]    Script Date: 9/23/2021 3:57:34 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[addresses](
	[addressid] [int] IDENTITY(1,1) NOT NULL,
	[address] [varchar](50) NULL,
	[address2] [varchar](50) NULL,
	[city] [varchar](50) NULL,
	[stateid] [int] NULL,
	[zipcode] [varchar](25) NULL,
	[addresstypeid] [int] NULL,
	[locationname] [varchar](50) NULL,
	[userid] [int] NULL
) ON [PRIMARY]
GO

