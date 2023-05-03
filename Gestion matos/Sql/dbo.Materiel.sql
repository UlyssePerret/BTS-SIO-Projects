CREATE TABLE [dbo].[Materiel] (
    [numserie]          INT          NOT NULL,
    [idClient]          INT          NULL,
    [mtbf]              DATETIME     NULL,
    [date_intervention] DATE         NULL,
    [nom]               VARCHAR (50) NULL,
    [description]       VARCHAR (50) NULL,
    [idtype]            INT          NULL,
    [site]              VARCHAR (50) NULL, 
    CONSTRAINT [PK_Materiel] PRIMARY KEY ([numserie])
);

