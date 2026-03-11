-- Step: 01

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02

CREATE TABLE Smartphones
(
     Id                   SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk                VARCHAR(50)                 NOT NULL
    ,Model               VARCHAR(50)                 NOT NULL
    ,Prijs               DECIMAL(6,2)                NOT NULL
    ,Geheugen            DECIMAL(4,0)                NOT NULL
    ,Besturingssysteem   VARCHAR(25)                 NOT NULL
    ,Schermgrootte       DECIMAL(3,2)                NOT NULL
    ,Releasedatum        DATE                        NOT NULL
    ,MegaPixels          DECIMAL(3,0)                NOT NULL
    ,IsActief            BIT                         NOT NULL    DEFAULT 1
    ,Opmerking           VARCHAR(255)                NULL        DEFAULT NULL
    ,DatumAangemaakt     DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd      DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT          PK_Smartphones_Id    PRIMARY KEY        (Id)
) ENGINE=InnoDB;

-- Step: 03

INSERT INTO Smartphones
(
    Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
    ('Apple',   'iPhone 16 Pro',   1256.56, 64,  'iOS 18',     6.7, '2025-01-19', 50),
    ('Samsung', 'Galaxy S25 Ultra',1539,    128, 'Android 15', 6.1, '2025-02-01', 200),
    ('Google',  'Pixel 9 Pro',     890,     1024,'Android 15', 6.3, '2024-12-20', 100);

-- Step: 04

CREATE TABLE Sneakers
(
     Id                  SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk                VARCHAR(50)                NOT NULL
    ,Model               VARCHAR(50)                NOT NULL
    ,Type                VARCHAR(25)                NOT NULL
    ,Prijs               DECIMAL(6,2)               NOT NULL
    ,Materiaal           VARCHAR(25)                NOT NULL
    ,Gewicht             DECIMAL(5,2)               NOT NULL
    ,Releasedatum        DATE                       NOT NULL
    ,IsActief            BIT                        NOT NULL    DEFAULT 1
    ,Opmerking           VARCHAR(255)               NULL        DEFAULT NULL
    ,DatumAangemaakt     DATETIME(6)                NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd      DATETIME(6)                NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT          PK_Sneakers_Id      PRIMARY KEY        (Id)
) ENGINE=InnoDB;


-- Step: 05

INSERT INTO Sneakers
(
     Merk
    ,Model
    ,Type
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
    ('Nike', 'Air Jordan 1', 'Hardloop', 150.00, 'Leer', 500, '2024-10-01'),
    ('Adidas', 'Yeezy Boost 350', 'Basketbal', 250.00, 'Synthetisch', 450, '2024-11-15'),
    ('New Balance', '990v5', 'Casual', 180.00, 'Mesh', 480, '2024-12-10'),
    ('Trico', 'New Age', 'Casual', 99.99, 'Synthetisch', 350, '2025-01-25'),
    ('Overlord', 'Tristar 6', 'Hardloop', 125.50, 'Leer', 475, '2024-12-31');

-- Step: 06

CREATE TABLE Horloges
(
     Id                 SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Prijs              DECIMAL(6,0)                NOT NULL
    ,Materiaal          VARCHAR(25)                 NOT NULL    
    ,Gewicht            DECIMAL(5,2)                NOT NULL                    NOT NULL
    ,Releasedatum       DATE
    ,Waterdichtheid     VARCHAR(25)     
    ,Type               VARCHAR(25)
    ,UniekKenmerk       VARCHAR(50)                 NOT NULL
    ,IsActief           BIT                         NOT NULL    DEFAULT 1
    ,Opmerking          VARCHAR(255)                    NULL    DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT         PK_Horloges_Id    PRIMARY KEY           (Id)
) ENGINE=InnoDB;

-- Step: 07

INSERT INTO Horloges
(
         Merk
        ,Model
        ,Prijs
        ,Materiaal
        ,Gewicht
        ,Releasedatum
        ,Waterdichtheid
        ,Type
        ,UniekKenmerk
)
VALUES
    ('Rolex', 'Submariner', 8500, 'Staal', 150, '2024-09-01', '300m', 'Duikhorloge', 'ROLEX-SUB-001'),
    ('Omega', 'Seamaster', 5500, 'Staal', 140, '2024-10-15', '300m', 'Duikhorloge', 'OMEGA-SEA-002'),
    ('Tag Heuer', 'Carrera', 4500, 'Staal', 130, '2024-11-20', '100m', 'Racinghorloge', 'TAG-CAR-003'),
    ('Patek Philippe', 'Nautilus', 12000, 'Staal', 160, '2024-12-05', '120m', 'Luxe horloge', 'PP-NAU-004'),
    ('Seiko', 'Prospex Diver', 800, 'RVS', 110, '2025-01-10', '200m', 'Duikhorloge', 'SEIKO-PRO-005');