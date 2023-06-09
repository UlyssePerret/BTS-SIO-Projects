USE [GestionMatos]
GO
/****** Object:  Table [dbo].[Client]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Client](
	[idClient] [int] NOT NULL,
	[nom] [varchar](max) NULL,
	[prénom] [varchar](max) NULL,
 CONSTRAINT [PK_Client] PRIMARY KEY CLUSTERED 
(
	[idClient] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Intervention]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Intervention](
	[id] [int] NOT NULL,
	[date_p] [date] NULL,
	[date_r] [date] NULL,
	[commentaire] [varchar](50) NULL,
	[materiel] [int] NULL,
 CONSTRAINT [PK_Intervention] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Matériel]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Matériel](
	[id] [int] NOT NULL,
	[numSérie] [varchar](max) NULL,
	[idClient] [int] NULL,
	[MTBF] [int] NULL,
	[date_intervention] [datetime] NULL,
	[nom] [varchar](max) NULL,
	[description] [varchar](max) NULL,
	[idType] [int] NULL,
	[idSite] [int] NULL,
 CONSTRAINT [PK_Matériel_1] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Site]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Site](
	[id] [int] NOT NULL,
	[nom] [varchar](max) NULL,
	[adresse] [varchar](max) NULL,
	[commentaire] [varchar](max) NULL,
 CONSTRAINT [PK_Site] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[SitesClients]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[SitesClients](
	[id] [int] NOT NULL,
	[idClient] [int] NULL,
	[idSite] [int] NOT NULL,
 CONSTRAINT [PK_SitesClients] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Type]    Script Date: 30/10/2015 11:18:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Type](
	[idType] [int] NOT NULL,
	[Type] [varchar](max) NULL,
	[MTBF] [int] NULL,
 CONSTRAINT [PK_Type] PRIMARY KEY CLUSTERED 
(
	[idType] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[Intervention]  WITH CHECK ADD  CONSTRAINT [FK_Intervention_Matériel] FOREIGN KEY([materiel])
REFERENCES [dbo].[Matériel] ([id])
GO
ALTER TABLE [dbo].[Intervention] CHECK CONSTRAINT [FK_Intervention_Matériel]
GO
ALTER TABLE [dbo].[Matériel]  WITH CHECK ADD  CONSTRAINT [FK_Matériel_Client] FOREIGN KEY([idClient])
REFERENCES [dbo].[Client] ([idClient])
GO
ALTER TABLE [dbo].[Matériel] CHECK CONSTRAINT [FK_Matériel_Client]
GO
ALTER TABLE [dbo].[Matériel]  WITH CHECK ADD  CONSTRAINT [FK_Matériel_Site] FOREIGN KEY([idSite])
REFERENCES [dbo].[Site] ([id])
GO
ALTER TABLE [dbo].[Matériel] CHECK CONSTRAINT [FK_Matériel_Site]
GO
ALTER TABLE [dbo].[Matériel]  WITH CHECK ADD  CONSTRAINT [FK_Matériel_Type] FOREIGN KEY([idType])
REFERENCES [dbo].[Type] ([idType])
GO
ALTER TABLE [dbo].[Matériel] CHECK CONSTRAINT [FK_Matériel_Type]
GO
ALTER TABLE [dbo].[SitesClients]  WITH CHECK ADD  CONSTRAINT [FK_SitesClients_Client] FOREIGN KEY([idClient])
REFERENCES [dbo].[Client] ([idClient])
GO
ALTER TABLE [dbo].[SitesClients] CHECK CONSTRAINT [FK_SitesClients_Client]
GO
ALTER TABLE [dbo].[SitesClients]  WITH CHECK ADD  CONSTRAINT [FK_SitesClients_Site] FOREIGN KEY([idSite])
REFERENCES [dbo].[Site] ([id])
GO
ALTER TABLE [dbo].[SitesClients] CHECK CONSTRAINT [FK_SitesClients_Site]
GO
