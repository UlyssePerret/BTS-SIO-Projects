CREATE TABLE [dbo].[Intervention] (
    [id]              INT          NOT NULL,
    [date_p]          DATE         NULL,
    [date_r]          DATE         NULL,
    [commentaire]     VARCHAR (50) NULL,
    [materielrevisee] VARCHAR (50) NULL, 
    CONSTRAINT [PK_Intervention] PRIMARY KEY ([id])
);

