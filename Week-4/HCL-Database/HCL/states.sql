USE [HCL]
GO

/****** Object:  Table [dbo].[states]    Script Date: 9/23/2021 3:58:09 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[states](
	[stateid] [int] IDENTITY(1,1) NOT NULL,
	[statename] [varchar](50) NULL,
	[stateabbreviation] [varchar](4) NULL
) ON [PRIMARY]
GO

