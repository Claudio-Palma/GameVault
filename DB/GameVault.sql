SET GLOBAL local_infile = true;
create schema GameVault;
DROP USER IF EXISTS 'admin'@'localhost';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL ON GameVault.* TO 'admin'@'localhost';

USE GameVault;

CREATE TABLE Utente(
    IdUtente INT PRIMARY KEY NOT NULL,
    NickName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE Ordine(
    IdOrdine INT PRIMARY KEY NOT NULL,
    dataOrdine DATE NOT NULL,
    costoTotale FLOAT NOT NULL,
    IdUtente INT NOT NULL,
    FOREIGN KEY (IdUtente) REFERENCES Utente(IdUtente)
);

CREATE TABLE Carrello
(
		Utente INT NOT NULL,
        Game INT NOT NULL,
		FOREIGN KEY (Utente) REFERENCES Utente(IdUtente),
        FOREIGN KEY (Game) REFERENCES Game(IdGame)
);

CREATE TABLE Game(
    IdGame INT PRIMARY KEY NOT NULL,
    nome VARCHAR(255) NOT NULL,
    descrizione VARCHAR(516) NOT NULL,
    prezzo FLOAT NOT NULL,
    sconto INT NOT NULL,
    disponibilita INT NOT NULL,
    foto VARCHAR(1000) NOT NULL,
    recensione VARCHAR(10000)
);
