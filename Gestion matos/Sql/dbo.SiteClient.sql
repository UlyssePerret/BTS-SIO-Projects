CREATE TABLE [dbo].[SiteClient] (
    [id]       INT NOT NULL,
    [idClient] INT NULL,
    [idSite]   INT NULL, 
    CONSTRAINT [PK_SiteClient] PRIMARY KEY ([id])
);

