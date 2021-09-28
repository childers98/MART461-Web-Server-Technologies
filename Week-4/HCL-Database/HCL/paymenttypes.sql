USE [HCL]
GO

/****** Object:  Table [dbo].[paymenttypes]    Script Date: 9/23/2021 3:57:58 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[paymenttypes](
	[paymentid] [int] IDENTITY(1,1) NOT NULL,
	[paymenttype] [varchar](50) NULL
) ON [PRIMARY]
GO

