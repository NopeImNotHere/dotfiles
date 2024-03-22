DROP DATABASE sportvereinsolingenfreisport

-- Create Database
CREATE DATABASE sportvereinsolingenfreisport;

-- Use the Database
USE sportvereinsolingenfreisport;

-- Trainer Entity
CREATE TABLE Trainer (
    FK_Trainer INT PRIMARY KEY,
    Nachname VARCHAR(50),
    Vorname VARCHAR(50)
);

-- Team Entity
CREATE TABLE Team (
    FK_Team INT PRIMARY KEY,
    Teamname VARCHAR(50),
    Altersgruppe VARCHAR(20)
);

-- M-N Relationship between Trainer and Team
CREATE TABLE TrainerTeam (
    FK_Trainer INT,
    FK_Team INT,
    Traingsbeginn DATE,
    Wochentag VARCHAR(20),
    Traingsende DATE,
    PRIMARY KEY (FK_Trainer, FK_Team, Traingsbeginn),
    FOREIGN KEY (FK_Trainer) REFERENCES Trainer(FK_Trainer),
    FOREIGN KEY (FK_Team) REFERENCES Team(FK_Team)
);

-- Spieler Entity
CREATE TABLE Spieler (
    PK_Spieler INT PRIMARY KEY,
    Nachname VARCHAR(50),
    Vorname VARCHAR(50),
    Geburtsdatum DATE,
    FK_Team INT,
    FOREIGN KEY (FK_Team) REFERENCES Team(FK_Team)
);

-- Drop Database (if needed)
-- ;
