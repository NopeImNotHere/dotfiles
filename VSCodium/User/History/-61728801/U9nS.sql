-- DROP DATABASE sportvereinsolingenfreisport;

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

INSERT INTO Trainer (FK_Trainer, Nachname, Vorname)
VALUES
    (1, 'Smith', 'John'),
    (2, 'Johnson', 'Alice'),
    (3, 'Doe', 'Bob'),
    (4, 'Miller', 'Emma'),
    (5, 'Brown', 'Michael');

-- Insert data into Team table
INSERT INTO Team (FK_Team, Teamname, Altersgruppe)
VALUES
    (1, 'Team A', 'Youth'),
    (2, 'Team B', 'Adult'),
    (3, 'Team C', 'Youth'),
    (4, 'Team D', 'Senior'),
    (5, 'Team E', 'Adult');

-- Insert data into TrainerTeam table
INSERT INTO TrainerTeam (FK_Trainer, FK_Team, Traingsbeginn, Wochentag, Traingsende)
VALUES
    (1, 1, '2024-02-15', 'Monday', '2024-03-15'),
    (2, 2, '2024-02-16', 'Tuesday', '2024-03-16'),
    (3, 3, '2024-02-17', 'Wednesday', '2024-03-17'),
    (4, 4, '2024-02-18', 'Thursday', '2024-03-18'),
    (5, 5, '2024-02-19', 'Friday', '2024-03-19');

-- Insert data into Spieler table
INSERT INTO Spieler (PK_Spieler, Nachname, Vorname, Geburtsdatum, FK_Team)
VALUES
    (1, 'Anderson', 'Olivia', '2000-01-10', 1),
    (2, 'Williams', 'Ethan', '1995-05-20', 2),
    (3, 'Davis', 'Sophia', '2002-08-15', 3),
    (4, 'Clark', 'Logan', '1998-03-05', 4),
    (5, 'Taylor', 'Ava', '1990-11-25', 5);

